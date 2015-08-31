<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Socialite;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Jobs\ProcessTwitterAvatar::class;

class AuthController extends Controller
{
    use DispatchesJobs;

    /**
     * Redirect the user to the Twitter authentication page.
     *
     * @return Response
     */
    public function redirectToProvider(Request $request)
    {
        return Socialite::driver('twitter')->redirect();
    }

    /**
     * Obtain the user information from Twitter.
     *
     * @return Response
     */
    public function handleProviderCallback(Request $request)
    {
        $auth = Socialite::driver('twitter')->user();

        $user = User::where('twitter_id', $auth->id)->first();

        if (!$user) {
            $user = new User;
            $user->twitter_id = $auth->id;
            $user->twitter_nickname = $auth->nickname;
            $user->twitter_avatar = $auth->avatar;
            $user->twitter_avatar_original = $auth->avatar_original;
        }

        $user->authenticated_at = Carbon::now();
        $user->save();

        $this->dispatchFrom(ProcessTwitterAvatar::class, $request, [
            'user' => $user,
        ]);

        Auth::login($user);

        return redirect()->intended('/');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();

        return redirect('/');
    }
}
