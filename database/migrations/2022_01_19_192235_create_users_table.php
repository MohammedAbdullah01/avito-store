<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->boolean('email_verified')->default(0);
            $table->string('firstName');
            $table->string('lastName');
            $table->string('slug')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('gander', ['Male', 'Female'])->nullable();
            $table->string('phone')->nullable();
            $table->string('city')->nullable();
            $table->string('avatar')->default('default_user.png');
            $table->string('location')->nullable();
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
