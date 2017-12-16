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
            $table->string('email', 80)->unique();
            $table->enum('method', ['email', 'facebook', 'google'])->default('email');
            $table->string('phone', 20)->nullable();
            $table->string('password');
            $table->enum('gender', ['male', 'female'])->default('female');
            $table->string('image')->nullable();
            $table->string('token_id', 100)->unique()->nullable();
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
