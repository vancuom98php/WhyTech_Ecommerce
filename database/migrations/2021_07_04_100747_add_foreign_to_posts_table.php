<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            //category_posts table
            if (!Schema::hasColumn('posts', 'cate_post_id')) {
                $table->unsignedInteger('cate_post_id')->index('posts_cate_post_id_foreign');
            }
            $table->foreign('cate_post_id')->references('cate_post_id')->on('category_posts')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign('posts_cate_post_id_foreign');
        });
    }
}
