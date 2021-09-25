<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->increments('product_id');
            $table->string('product_name', 255);
            $table->text('product_tags')->nullable();
            $table->unsignedInteger('product_quantity');
            $table->unsignedInteger('product_sold')->nullable();
            $table->string('product_slug', 255);
            $table->unsignedInteger('category_id')->index('products_category_id_foreign');
            $table->unsignedInteger('brand_id')->index('products_brand_id_foreign');
            $table->text('product_desc');
            $table->text('product_content');
            $table->unsignedInteger('product_price');
            $table->string('product_image', 255);
            $table->string('product_file', 100)->nullable();
            $table->string('product_views', 100)->nullable();
            $table->unsignedInteger('product_status');
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
        Schema::dropIfExists('products');
    }
}
