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
                'twitter_id'       => '42204825',
                'twitter_nickname' => 'waynethebrain',
                'twitter_avatar'   => 'http://pbs.twimg.com/profile_images/555323316588670977/anbEvnry_normal.jpeg',
                'is_admin'         => 1,
                'authenticated_at' => Carbon::now(),
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
            ])
        ];

        Model::reguard();
    }
}
