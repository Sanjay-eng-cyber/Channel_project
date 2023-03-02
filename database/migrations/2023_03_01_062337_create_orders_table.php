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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('api_order_id')->nullable();
            $table->string('delivery_api_id')->nullable();
            $table->string('delivery_type')->nullable();
            $table->string('delivery_status')->nullable();
            $table->decimal('sub_total');
            $table->float('discount_amount')->nullable();
            $table->decimal('total_amount');
            $table->enum('status', ['initial','completed','failed']);
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
