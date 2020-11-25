<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citys', function (Blueprint $table) {
            $table->id();
            $table->string("name_city");
            $table->unsignedBigInteger("area_id");
            $table->tinyInteger("status")->default(1);
            $table->string("slug")->unique();
            $table->timestamps();
            $table->foreign("area_id")->references("id")->on("area");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citys');
    }
}
