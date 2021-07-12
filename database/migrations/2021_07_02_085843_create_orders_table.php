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
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->bigIncrements('order_id');
            $table->unsignedInteger('customer_id')->index('orders_customer_id_foreign');
            $table->unsignedInteger('shipping_id')->index('orders_shipping_id_foreign');
            $table->unsignedInteger('order_status');
            $table->string('order_code', 50);
            $table->string('order_date', 100);
            $table->string('order_destroy', 200)->nullable();
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
