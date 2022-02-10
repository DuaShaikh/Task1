<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('discount_id')->nullable();
            $table->smallInteger('quantity');
            $table->decimal('productPrice', 10, 4)->nullable(false);
            $table->enum('size', ['S','M','L'])->default('S');

            $table->timestamps();
            $table->foreign('product_id', 'order__items_product_id_products_id')
                ->references('id')
                ->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('discount_id', 'order__items_discount_id_discounts_id')
                ->references('id')
                ->on('discounts')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('order_id', 'order__items_order_id_orders_id')
                ->references('id')
                ->on('orders')
                ->onUpdate('cascade')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
