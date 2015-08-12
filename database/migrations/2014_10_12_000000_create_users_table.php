<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('twitter_id')->unsigned()->unique();
            $table->string('twitter_nickname');
            $table->string('twitter_avatar');
            $table->string('twitter_avatar_original');
            $table->string('avatar_url')->nullable();
            $table->boolean('is_admin')->default(false);
            $table->datetime('authenticated_at')->nullable();
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
        Schema::drop('users');
    }
}
