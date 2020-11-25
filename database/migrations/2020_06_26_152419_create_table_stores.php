<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableStores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string("name_store");
            $table->unsignedBigInteger("city_id");
            $table->string("address");
            $table->integer("phone");
            $table->string("slug")->unique();
            $table->string("ma_store");
            $table->tinyInteger("status")->default(1);
            $table->timestamps();

            $table->foreign("city_id")->references("id")->on("citys");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores');
    }
}
