<?php

use Illuminate\Support\Facades\Schema;
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
            $table->string('name');
            $table->string('avatar');
            $table->string('email')->unique();
            $table->string('password');
            $table->smallInteger('is_active')->default(0);
            $table->integer('questions_count')->default(0);
            $table->integer('answers_count')->default(0);
            $table->integer('comments_count')->default(0);
            $table->integer('favorites_count')->default(0);
            $table->integer('likes_count')->default(0);
            $table->integer('followers_count')->default(0);
            $table->integer('followings_count')->default(0);
            $table->json('settings')->nullable();
            $table->string('api_token',64)->unique();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
