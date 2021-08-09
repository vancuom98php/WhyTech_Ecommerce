<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->increments('order_details_id');
            $table->string('order_code', 50);
            $table->unsignedInteger('product_id')->index('order_details_product_id_foreign');
            $table->unsignedInteger('order_id')->index('order_details_order_id_foreign');
            $table->unsignedInteger('product_sales_quantity');
            $table->string('product_coupon', 50);
            $table->string('product_feeship', 50);
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
        Schema::dropIfExists('order_details');
    }
}
