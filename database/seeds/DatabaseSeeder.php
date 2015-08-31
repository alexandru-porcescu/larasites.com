<?php

use App\User;
use App\Site;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // clear existing records

        User::truncate();
        Site::truncate();

        // add new records

        Model::unguard();

        $faker = Faker\Factory::create();

        $users = [
            User::create([
                'twitter_id'            => '42204825',
                'twitter_nickname'      => 'waynethebrain',
                'twitter_avatar'        => $faker->imageUrl(64, 64),
                'cloudinary_url'        => $faker->imageUrl(30, 30),
                'cloudinary_secure_url' => $faker->imageUrl(30, 30),
                'is_admin'              => 1,
                'authenticated_at'      => Carbon::now(),
            ]),
            User::create([
                'twitter_id'            => '4475091',
                'twitter_nickname'      => 'shawnroos',
                'twitter_avatar'        => $faker->imageUrl(64, 64),
                'cloudinary_url'        => $faker->imageUrl(30, 30),
                'cloudinary_secure_url' => $faker->imageUrl(30, 30),
                'is_admin'              => 1,
                'authenticated_at'      => Carbon::now(),
            ]),
            User::create([
                'twitter_id'            => '79140061',
                'twitter_nickname'      => 'assertchris',
                'twitter_avatar'        => $faker->imageUrl(64, 64),
                'cloudinary_url'        => $faker->imageUrl(30, 30),
                'cloudinary_secure_url' => $faker->imageUrl(30, 30),
                'is_admin'              => 1,
                'authenticated_at'      => Carbon::now(),
            ]),
            User::create([
                'twitter_id'            => '45637904',
                'twitter_nickname'      => 'mikkelz_za',
                'twitter_avatar'        => $faker->imageUrl(64, 64),
                'cloudinary_url'        => $faker->imageUrl(30, 30),
                'cloudinary_secure_url' => $faker->imageUrl(30, 30),
                'is_admin'              => 1,
                'authenticated_at'      => Carbon::now(),
            ]),
            User::create([
                'twitter_id'            => '104805799',
                'twitter_nickname'      => 'waller_texas',
                'twitter_avatar'        => $faker->imageUrl(64, 64),
                'cloudinary_url'        => $faker->imageUrl(30, 30),
                'cloudinary_secure_url' => $faker->imageUrl(30, 30),
                'is_admin'              => 1,
                'authenticated_at'      => Carbon::now(),
            ]),
        ];

        $sites = [];

        for ($i = 0; $i < 20; $i++) {
            $site = Site::create([
                'user_id'     => $faker->randomElement($users)->id,
                'url'         => $faker->url,
                'title'       => $faker->sentence,
                'description' => join("\n\n", $faker->paragraphs),
                'vote_count'  => $faker->numberBetween(0, 100),
                'approved_at' => Carbon::now(),
                'approved_by' => $faker->randomElement($users)->id,
            ]);

            if ($faker->randomDigit % 5 === 0) {
                $site->featured_by = $faker->randomElement($users)->id;
                $site->featured_at = Carbon::now();
                $site->save();
            }

            $sites[] = $site;
        }

        Model::reguard();
    }
}
