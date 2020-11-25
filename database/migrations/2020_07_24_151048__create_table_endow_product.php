<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableEndowProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('endow_product', function (Blueprint $table) {
            $table->unsignedBigInteger("product_id");
            $table->unsignedBigInteger("endow_id");
            $table->timestamps();
            $table->foreign("product_id")->references("id")->on("products");
            $table->foreign("endow_id")->references("id")->on("endows");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('endow_product');
    }
}
