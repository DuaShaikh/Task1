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
            $table->foreignId('order_id')->constrained('orders');
            $table->decimal('ProductPrice', 10, 4)->nullable(false);
            $table->smallInteger('quantity');
            $table->foreignId('discount_id')->constrained('discounts');
            $table->foreignId('product_id')->constrained('products');
            $table->timestamps();
            $table->foreign('product_id', 'order_items_product_id_products_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('discount_id', 'order_items_discount_id_discounts_id')->references('id')->on('discounts')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('order_id', 'order_items_order_id_orders_id')->references('id')->on('orders')->onUpdate('cascade')->onDelete('cascade');

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
