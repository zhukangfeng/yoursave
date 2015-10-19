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
            $table->increments('id', 12);
            $table->string('u_name');
            $table->string('f_name');
            $table->string('l_name');
            $table->string('login_mail')->unique();
            $table->string('email');
            $table->string('email');
            $table->string('email');
            $table->string('password');
            $table->string('post_code');
            $table->string('post_code');
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
        Schema::drop('users');
    }
}
