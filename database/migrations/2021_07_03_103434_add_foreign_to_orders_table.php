<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            //customers table
            if (!Schema::hasColumn('orders', 'customer_id')) {
                $table->unsignedInteger('customer_id')->index('orders_customer_id_foreign');
            }
            $table->foreign('customer_id')->references('customer_id')->on('customers')->onUpdate('cascade')->onDelete('cascade');

            //shippings table
            if (!Schema::hasColumn('orders', 'shipping_id')) {
                $table->unsignedInteger('shipping_id')->index('orders_shipping_id_foreign');
            }
            $table->foreign('shipping_id')->references('shipping_id')->on('shippings')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('orders_customer_id_foreign');
            $table->dropForeign('orders_shipping_id_foreign');
        });
    }
}
