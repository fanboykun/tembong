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
        Schema::create('buyers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            $table->string('buyer_name')->required();
            $table->string('buyer_phone')->required();
            $table->integer('province_id')->required();
            $table->integer('city_id')->required();
            $table->integer('district_id')->nullable();
            $table->integer('village_id')->nullable();
            $table->string('buyer_address_description')->nullable();
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
        Schema::dropIfExists('buyers');
    }
};
