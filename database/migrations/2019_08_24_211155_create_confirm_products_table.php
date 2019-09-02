<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfirmProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('confirm_products', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->unsignedBigInteger('buyer_customer_id');
            $table->unsignedBigInteger('product_id');
            $table->bigInteger('quantity');
            $table->string('date');
            $table->string('year');
            $table->string('month');
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('buyer_customer_id')->references('id')->on('buyer_customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('confirm_products');
    }
}
