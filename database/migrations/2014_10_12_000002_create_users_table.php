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
        $random = str_random(8);
        $email = "$random@quizmonstr.com";
        $password = bcrypt($random);

        Schema::create('users', function (Blueprint $table) use ($email, $password) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('email')->unique()->default($email);
            $table->string('mobile', 10)->unique()->nullable();
            $table->string('password')->default($password);
            $table->string('gender')->default('Male');
            $table->string('dob', 10)->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('avatar')->default('avatar.png');
            $table->boolean('profile_updated')->default(false);
            $table->timestamp('email_verified_at')->nullable();
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
