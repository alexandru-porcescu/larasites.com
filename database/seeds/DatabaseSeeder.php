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
            factory(App\User::class, 'admin')->create([
                'twitter_id' => '42204825',
                'twitter_nickname' => 'waynethebrain'
            ]),
            factory(App\User::class, 'admin')->create([
                'twitter_id' => '4475091',
                'twitter_nickname' => 'shawnroos'
            ]),
            factory(App\User::class, 'admin')->create([
                'twitter_id' => '79140061',
                'twitter_nickname' => 'assertchris'
            ]),
            factory(App\User::class, 'admin')->create([
                'twitter_id' => '45637904',
                'twitter_nickname' => 'mikkelz_za'
            ]),
            factory(App\User::class, 'admin')->create([
                'twitter_id' => '104805799',
                'twitter_nickname' => 'waller_texas'
            ]),
            factory(App\User::class, 'default')->create([
                'twitter_id' => '2445311347',
                'twitter_nickname' => 'WarraManley'
            ])
        ];

        $sites = [];

        for ($i = 0; $i < 20; $i++) {
            $site = Site::create([
                'user_id'               => $faker->randomElement($users)->id,
                'url'                   => $faker->url,
                'title'                 => $faker->sentence,
                'image_url'             => $faker->imageUrl,
                'cloudinary_url'        => $faker->imageUrl,
                'cloudinary_secure_url' => $faker->imageUrl,
                'cloudinary_public_id'  => $faker->randomNumber(6),
                'description'           => join("\n\n", $faker->paragraphs),
                'vote_count'            => $faker->numberBetween(0, 100),
                'approved_at'           => Carbon::now(),
                'approved_by'           => $faker->randomElement($users)->id,
                'created_by'            => $faker->randomElement($users)->id,
                'created_at'            => Carbon::now(),
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
