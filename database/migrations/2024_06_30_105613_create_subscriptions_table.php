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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('package_id');
            $table->string('reference_code');
            $table->string('conversation_id');
            $table->enum('status',['Active','Cancel']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *w
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
};
