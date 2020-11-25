<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTechnical extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('technical', function (Blueprint $table) {
            $table->id();
            $table->string("speed")->nullable();
            $table->string("incline")->nullable();
            $table->string("running_floor_size")->nullable();
            $table->string("weight")->nullable();
            $table->string("size_pro")->nullable();
            $table->string("weight_withstand")->nullable();
            $table->unsignedBigInteger("product_id");
            $table->timestamps();
            $table->foreign("product_id")->references("id")->on("products");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('technical');
    }
}
