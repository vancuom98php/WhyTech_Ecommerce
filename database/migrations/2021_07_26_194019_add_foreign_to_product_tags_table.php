<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToProductTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_tags', function (Blueprint $table) {
            //products table
            if (!Schema::hasColumn('product_tags', 'product_id')) {
                $table->unsignedInteger('product_id')->index('product_tags_product_id_foreign');
            }
            $table->foreign('product_id')->references('product_id')->on('products')->onUpdate('cascade')->onDelete('cascade');

            //tags table
            if (!Schema::hasColumn('product_tags', 'tag_id')) {
                $table->unsignedInteger('tag_id')->index('product_tags_tag_id_foreign');
            }
            $table->foreign('tag_id')->references('tag_id')->on('tags')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_tags', function (Blueprint $table) {
            $table->dropForeign('product_tags_product_id_foreign');
            $table->dropForeign('product_tags_tag_id_foreign');
        });
    }
}
