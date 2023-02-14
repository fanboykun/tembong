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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('reseller_id');
            $table->integer('total_item');
            $table->integer('best_seller_item')->nullable();
            $table->integer('top_seller_item')->nullable();
            $table->double('total_price')->required();
            $table->double('shipping_cost')->required();
            $table->boolean('is_completed')->default(TRUE);
            $table->string('buyer_name')->required();
            $table->string('buyer_address')->required();
            $table->string('buyer_phone')->required();
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
        Schema::dropIfExists('orders');
    }
};
