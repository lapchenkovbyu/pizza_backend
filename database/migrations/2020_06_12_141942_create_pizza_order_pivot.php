<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePizzaOrderPivot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pizza_order_pivot', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pizza_id')->references('id')->on('pizzas');
            $table->foreignId('size_id')->references('id')->on('sizes');
            $table->foreignId('order_id')->references('id')->on('orders');
            $table->integer('quantity')->default(1);
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
        Schema::dropIfExists('pizza_order_pivot');
    }
}
