<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeferralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deferrals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->enum('interval', ['d', 'm','y'])->default('d');
            $table->integer('count')->default(0);
            $table->tinyInteger('compute')->default(0);
            $table->tinyInteger('override')->default(0);
            $table->tinyInteger('confidential')->default(0);
            $table->enum('lookback', ['TY', 'MP','ASAP'])->default('TY');
            $table->enum('deferralType', ['primary', 'secondary'])->default('primary');
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
        Schema::dropIfExists('deferrals');
    }
}
