<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('pName')->nullable(false);
            $table->decimal('productPrice', 10, 4)->nullable(false);
            $table->foreignId('manufacturer_id')->constrained('manufacturers')->nullable();
            $table->foreignId('media_id')->constrained('media')->nullable();
            $table->foreignId('discount_id')->constrained('discounts')->nullable();
            $table->smallInteger('unitsInStock')->nullable();
            $table->smallInteger('unitsOnOrder')->nullable();
            $table->timestamps();
            $table->foreign('manufacturer_id', 'products_manufacturer_id_manufacturers_id')->references('id')->on('manufacturers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('discount_id', 'products_discount_id_discounts_id')->references('id')->on('discounts')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
