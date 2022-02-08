<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
       
        
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('media_id')->nullable();
            $table->unsignedBigInteger('address_id')->nullable();

            $table->string('fullName', 100)->nullable();
            $table->string('email')->unique()->nullable(false);
            $table->string('phone', 100)->default(0);
            $table->string('password', 100)->nullable(false);
            
            $table->timestamps();

            $table->foreign('media_id', 'users_media_id_media_id')
                ->references('id')
                ->on('media')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('address_id', 'product_categories_address_id_addresses_id')
                ->references('id')
                ->on('addresses')
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
        Schema::dropIfExists('users');
    }
}
