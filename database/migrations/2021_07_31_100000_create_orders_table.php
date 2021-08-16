<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->unsignedBiginteger('postcard_id')->nullable();
            $table->foreign('postcard_id')->references('id')->on('postcards');
            $table->string('phone');
            $table->string('email');
            $table->string('type');
            $table->string('name');
            $table->string('to_name')->nullable();
            $table->string('pincode')->nullable();
            $table->text('address')->nullable();
            $table->longText('message')->nullable();
            $table->unsignedBiginteger('order_by')->nullable();
            $table->foreign('order_by')->references('id')->on('users');
            $table->string('status');
            $table->text('note')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('orders');
    }
}
