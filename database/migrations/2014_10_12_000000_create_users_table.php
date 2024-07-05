<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->enum('role', ['Admin', 'User'])->default('User');
            $table->enum('status',['Pending','Approved','Suspend'])->default('Approved');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('number')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->integer('package_id')->nullable();
            $table->integer('contract')->nullable();
            $table->timestamp('expire_date')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('image')->nullable();
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
};