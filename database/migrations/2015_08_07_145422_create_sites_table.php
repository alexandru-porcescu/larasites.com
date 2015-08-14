<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('url');
            $table->string('title');
            $table->string('description');
            $table->string('image_url');
            $table->integer('vote_count')->unsigned()->default(0);
            $table->integer('red')->unsigned()->default(0);
            $table->integer('green')->unsigned()->default(0);
            $table->integer('blue')->unsigned()->default(0);
            $table->string('cloudinary_url')->nullable();
            $table->string('cloudinary_secure_url')->nullable();
            $table->string('cloudinary_public_id')->nullable();
            $table->datetime('approved_at')->nullable();
            $table->integer('approved_by')->nullable();
            $table->integer('created_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sites');
    }
}
