<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFeaturedAtColumnToSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sites', function ($table) {
            $table->dateTime('featured_at')->nullable();
        });

        foreach (DB::table('sites')->get() as $site) {
            if ($site->featured) {
                DB::table('sites')
                    ->where('id', $site->id)
                    ->update([
                        'featured_at' => $site->approved_at
                    ]);
            }
        }

        Schema::table('sites', function ($table) {
            $table->dropColumn('featured');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sites', function ($table) {
            $table->boolean('featured')->default(false);
        });

        foreach (DB::table('sites')->get() as $site) {
            if ($site->featured_at) {
                DB::table('sites')
                    ->where('id', $site->id)
                    ->update([
                        'featured' => true
                    ]);
            }
        }

        Schema::table('sites', function ($table) {
            $table->dropColumn('featured_at');
        });
    }
}
