<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\ProcessTwitterAvatar;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate();

        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'twitter_id'              => ['required', 'numeric', 'unique:users,id'],
            'twitter_nickname'        => ['required'],
            'twitter_avatar'          => ['required', 'url'],
            'twitter_avatar_original' => ['required', 'url'],
        ]);

        $user = new User;

        $user->twitter_id = $request->input('twitter_id');
        $user->twitter_nickname = $request->input('twitter_nickname');
        $user->twitter_avatar = $request->input('twitter_avatar');
        $user->twitter_avatar_original = $request->input('twitter_avatar_original');
        $user->save();

        $this->dispatchFrom(ProcessTwitterAvatar::class, $request, [
            'user' => $user,
        ]);

        return redirect()->action('Admin\UserController@show', [$user->id]);
    }

    /**
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::with('submissions')->findOrFail($id);

        $submissions = $user->submissions()->orderBy('created_at', 'desc')->get();

        $votes = $user->votes()->orderBy('created_at', 'desc')->get();

        return view('admin.user.show', compact('user', 'submissions', 'votes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
