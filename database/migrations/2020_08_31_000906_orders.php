<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Orders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function(Blueprint $table) {
            $table->unsignedInteger('client_id');
            $table->unsignedInteger('pastry_id');
            $table->unsignedInteger('quantity');
            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('pastry_id')->references('id')->on('pastries');
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
