<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("pro_name");
            $table->string("slug")->unique();
            $table->float("price");
            $table->float("sale_price")->nullable();
            $table->string("avatar");
            $table->string("ma_sp")->unique();
            $table->tinyInteger("new")->default('1');
            $table->unsignedBigInteger("cate_id");
            $table->text("description")->nullable();
            $table->unsignedBigInteger("brand_id");
            $table->timestamps();

            $table->foreign("cate_id")->references("id")->on("categories");
            $table->foreign("brand_id")->references("id")->on("brands");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
