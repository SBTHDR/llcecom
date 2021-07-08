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
            $table->unsignedBigInteger('user_id');
            $table->string('customer_name');
            $table->string('customer_phone_number');
            $table->text('address');
            $table->string('city');
            $table->string('zip_code');
            $table->decimal('total_amount');
            $table->decimal('discount_amount')->default(0.00);
            $table->decimal('paid_amount');
            $table->string('payment_status')->default('pending');
            $table->text('payment_details')->nullable();
            $table->string('operational_status')->default('pending');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
