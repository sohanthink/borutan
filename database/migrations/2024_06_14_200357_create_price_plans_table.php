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
        Schema::create('price_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->string('referenceCode');
            $table->string('createdDate');
            $table->string('name');
            $table->float('price');
            $table->string('currency')->nullable();
            $table->string('interval');
            $table->integer('interval_count')->default(0);
            $table->integer('trial_period_days')->default(0);
            $table->string('plan_payment_type');
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
        Schema::dropIfExists('price_plans');
    }
};
