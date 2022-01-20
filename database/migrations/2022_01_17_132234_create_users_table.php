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
            $table->string('fullName', 100)->nullable();
            $table->string('email')->unique()->nullable(false);
            $table->foreignId('address_id')->nullable()->constrained('addresses');
            $table->string('phone', 100)->default(0);
            $table->string('password', 100)->nullable(false);
            $table->foreignId('media_id')->nullable()->constrained('media');
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
