<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSlugColumnToSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sites', function ($table) {
            $table->string('slug')->nullable();
        });

        foreach (DB::table('sites')->get() as $row) {
            DB::table('sites')->where('id', $row->id)->update([
                'slug' => str_slug($row->title)
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sites', function ($table) {
            $table->dropColumn('slug');
        });
    }
}
