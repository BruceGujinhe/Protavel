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
            $table->string('wx_open_id')->nullable();
            $table->string('nickname');
            $table->string('avatar');
            $table->string('bio');
            $table->integer('gender');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('password');
            $table->integer('is_admin')->default(0);
            $table->rememberToken();

            $table->softDeletes();
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
