<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProductArrtibutes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_arrtibutes', function (Blueprint $table) {
//            $table->id();
            $table->unsignedBigInteger("product_id");
            $table->unsignedBigInteger("arrtibute_value_id");
            $table->timestamps();
            $table->foreign("product_id")->references("id")->on("products");
            $table->foreign("arrtibute_value_id")->references("id")->on("arrtibute_values");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_arrtibutes');
    }
}
