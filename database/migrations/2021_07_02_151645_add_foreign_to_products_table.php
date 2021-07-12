<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            //category_products table
            if (!Schema::hasColumn('products', 'category_id')) {
                $table->unsignedInteger('category_id')->index('products_category_id_foreign');
            }
            $table->foreign('category_id')->references('category_id')->on('category_products')->onUpdate('cascade')->onDelete('cascade');

            //brands table
            if (!Schema::hasColumn('products', 'brand_id')) {
                $table->unsignedInteger('brand_id')->index('products_brand_id_foreign');
            }
            $table->foreign('brand_id')->references('brand_id')->on('brands')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_category_id_foreign');
            $table->dropForeign('products_brand_id_foreign');
        });
    }
}
