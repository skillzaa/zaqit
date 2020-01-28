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
            $table->bigIncrements('id');
            $table->string('name')->default("anonemous")->nullable();
            $table->string('email')->unique()->required();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',255)->required();
            $table->string('role')->default("student")->required();
            $table->string('enabled')->default("0")->required();
            $table->integer("testsAllowed")->default(0);
            $table->integer("totalTestsTaken")->default(0);
            $table->integer("area")->nullable();
            $table->rememberToken()->nullable();
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
