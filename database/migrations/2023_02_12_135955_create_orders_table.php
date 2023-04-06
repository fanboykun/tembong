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
            $table->foreignId('user_id')->nullOnDelete();
            $table->foreignId('reseller_id')->required()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('discount_type')->nullable();
            // $table->double('total_discount')->nullable();
            $table->double('shipping_cost')->required();
            // $table->double('total_price')->required();
            $table->enum('status', ['placed','shipped'])->nullable();
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
