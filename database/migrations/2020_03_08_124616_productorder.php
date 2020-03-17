<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Productorder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_order', function (Blueprint $table) {
            $table->bigIncrements('pro_id');
            $table->string('pro_name');
            $table->string('or_qty');
            $table->Biginteger('or_price');
            $table->string('or_img');
            $table->unsignedBiginteger('or_order');
            $table->foreign('or_order')
                ->references('or_id')
                ->on('order')
                ->onDelete('cascade');
           
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
        Schema::dropIfExists('product_order');
    }
}
