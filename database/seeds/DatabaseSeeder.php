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
                'twitter_id' => '42204825',
                'twitter_nickname' => 'waynethebrain',
                'twitter_avatar' => 'http://pbs.twimg.com/profile_images/555323316588670977/anbEvnry_normal.jpeg',
                'is_admin' => 1,
            ]),
            User::create([
                'twitter_id' => '4475091',
                'twitter_nickname' => 'shawnroos',
                'twitter_avatar' => 'http://pbs.twimg.com/profile_images/514132007513632768/IW6GPity_normal.jpeg',
            ])
        ];

        $hosts = [
            Host::create([
                'name' => 'www.wearenext.co.za',
            ]),
            Host::create([
                'name' => 'laravel.com',
            ])
        ];

        $submissions = [
            Submission::create([
                'user_id' => $users[0]->id,
                'host_id' => $hosts[0]->id,
                'url' => 'http://www.wearenext.co.za'
            ]),
            Submission::create([
                'user_id' => $users[1]->id,
                'host_id' => $hosts[0]->id,
                'url' => 'http://www.wearenext.co.za/people'
            ]),
            Submission::create([
                'user_id' => $users[0]->id,
                'host_id' => $hosts[1]->id,
                'url' => 'http://laravel.com/foo'
            ]),
            Submission::create([
                'user_id' => $users[1]->id,
                'host_id' => $hosts[1]->id,
                'url' => 'http://laravel.com/docs'
            ]),
        ];

        $sites = [
            Site::create([
                'url' => 'http://www.wearenext.co.za',
                'title' => 'Next',
                'description' => 'We help businesses build digital products people love to use.',
            ]),
            Site::create([
                'approved_at' => Carbon::now(),
                'url' => 'http://laravel.com',
                'title' => 'Laravel',
                'description' => 'The PHP Framework For Web Artisans',
            ]),
        ];

        $hosts[0]->site_id = $sites[0]->id;
        $hosts[0]->save();

        $hosts[1]->site_id = $sites[1]->id;
        $hosts[1]->save();

        Model::reguard();
    }
}
