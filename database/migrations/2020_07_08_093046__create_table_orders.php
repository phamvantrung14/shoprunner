<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_name')->nullable();
            $table->string('email');
            $table->integer('phone_number');
            $table->string('address')->nullable();
            $table->text('note')->nullable();
            $table->float('total_price');
            $table->tinyInteger('payment')->default('1')->index();//1 chuyen khoan 2. tien mat
            $table->tinyInteger('status')->default('1')->index();//1 dang cho -2 dang giao -3 hoan thanh -4 huy don
            $table->unsignedBigInteger('customer_id')->default(0);
            $table->unsignedBigInteger('city_id')->default(0);
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('city_id')->references('id')->on('citys');
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
