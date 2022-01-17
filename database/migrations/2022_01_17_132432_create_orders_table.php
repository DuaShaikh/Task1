<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('shipper_id')->constrained('shippers');
            $table->foreignId('media_id')->constrained('media');
            $table->foreignId('address_id')->constrained('addresses');
            $table->decimal('productPrice', 10, 4)->nullable(false);
            $table->timestamps();
            $table->foreign('shipper_id', 'orders_shipper_id_shippers_id')->references('id')->on('shippers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('media_id', 'orders_media_id_media_id')->references('id')->on('media')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('address_id', 'orders_address_id_addresses_id')->references('id')->on('addresses')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id', 'orders_user_id_users_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
           
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
}
