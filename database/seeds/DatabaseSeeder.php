<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Host;
use Carbon\Carbon;
use App\Site;
use App\Submission;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $users = [
            User::create([
                'twitter_id'            => '42204825',
                'twitter_nickname'      => 'waynethebrain',
                'twitter_avatar'        => 'http://pbs.twimg.com/profile_images/555323316588670977/anbEvnry_normal.jpeg',
                'cloudinary_public_id'  => 'tfeyodwijgyk3e16veao',
                'cloudinary_url'        => 'http://res.cloudinary.com/nextza/image/upload/v1439458260/tfeyodwijgyk3e16veao.jpg',
                'cloudinary_secure_url' => 'https://res.cloudinary.com/nextza/image/upload/v1439458260/tfeyodwijgyk3e16veao.jpg',
                'is_admin'              => 1,
                'authenticated_at'      => Carbon::now(),
            ]),
            User::create([
                'twitter_id'       => '4475091',
                'twitter_nickname' => 'shawnroos',
                'twitter_avatar'   => 'http://pbs.twimg.com/profile_images/514132007513632768/IW6GPity_normal.jpeg',
                'is_admin'         => 1,
                'authenticated_at' => Carbon::now(),
            ]),
            User::create([
                'twitter_id'       => '79140061',
                'twitter_nickname' => 'assertchris',
                'twitter_avatar'   => 'https://pbs.twimg.com/profile_images/530731479421030400/1DWRjtfX.jpeg',
                'is_admin'         => 1,
                'authenticated_at' => Carbon::now(),
            ]),
            User::create([
                'twitter_id'       => '45637904',
                'twitter_nickname' => 'mikkelz_za',
                'twitter_avatar'   => 'http://pbs.twimg.com/profile_images/607198267957518337/DtiIsuUd_normal.jpg',
                'is_admin'         => 1,
                'authenticated_at' => Carbon::now(),
            ]),
            User::create([
                'twitter_id'       => '104805799',
                'twitter_nickname' => 'waller_texas',
                'twitter_avatar'   => 'http://pbs.twimg.com/profile_images/605750997894483969/jLbWPT4L_normal.jpg',
                'is_admin'         => 1,
                'authenticated_at' => Carbon::now(),
            ]),
        ];

        Model::reguard();
    }
}
