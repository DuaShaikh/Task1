<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippers', function (Blueprint $table) {
            $table->id();
            $table->string('companyName', 100)->nullable(false);
            $table->string('phone#', 100)->nullable(false);
            $table->string('shipVia', 100)->nullable(false);
            $table->foreignId('address_id')->constrained('addresses');
            $table->timestamps();
            $table->foreign('address_id', 'shippers_address_id_addresses_id')->references('id')->on('addresses')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shippers');
    }
}
