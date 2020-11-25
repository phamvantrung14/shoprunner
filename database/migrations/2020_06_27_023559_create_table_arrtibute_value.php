<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableArrtibuteValue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arrtibute_values', function (Blueprint $table) {
            $table->id();
            $table->string("name_arrtb_value")->unique();
            $table->unsignedBigInteger("arrtb_id");
            $table->timestamps();
            $table->foreign("arrtb_id")->references("id")->on("arrtibutes");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arrtibute_values');
    }
}
