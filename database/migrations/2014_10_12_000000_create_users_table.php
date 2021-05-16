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
            $table->string('username', 40)->unique();
            $table->string('full_name', 60);
            $table->string('email')->unique();
            $table->string('address', 120)->nullable();
            $table->string('phone', 35)->nullable()->unique();
            $table->string('job', 150)->nullable();
            $table->string('image')->nullable()->default('default.png');
            $table->string('password');
            $table->string('code', 20)->unique()->nullable();
            $table->string('personal_id', 20)->unique();
            $table->string('age')->nullable();
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
