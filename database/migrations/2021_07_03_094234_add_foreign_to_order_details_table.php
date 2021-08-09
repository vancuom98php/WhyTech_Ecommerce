<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_details', function (Blueprint $table) {
            //products table
            if (!Schema::hasColumn('order_details', 'product_id')) {
                $table->unsignedInteger('product_id')->index('order_details_product_id_foreign');
            }
            $table->foreign('product_id')->references('product_id')->on('products')->onUpdate('cascade')->onDelete('cascade');
            
            //orders table
            if (!Schema::hasColumn('order_details', 'order_id')) {
                $table->unsignedInteger('order_id')->index('order_details_order_id_foreign');
            }
            $table->foreign('order_id')->references('order_id')->on('orders')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_details', function (Blueprint $table) {
            $table->dropForeign('order_details_product_id_foreign');
        });
        Schema::table('order_details', function (Blueprint $table) {
            $table->dropForeign('order_details_order_id_foreign');
        });
    }
}
