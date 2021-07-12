<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->increments('post_id');
            $table->text('post_title');
            $table->string('post_views', 50)->nullable();
            $table->string('post_slug', 255);
            $table->text('post_desc');
            $table->text('post_content');
            $table->text('post_meta_desc');
            $table->string('post_meta_keywords', 255);
            $table->unsignedInteger('post_status');
            $table->string('post_image', 200);
            $table->unsignedInteger('cate_post_id')->index('posts_cate_post_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
