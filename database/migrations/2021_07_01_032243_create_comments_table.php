<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->increments('comment_id');
            $table->text('comment_content')->nullable();
            $table->string('comment_name', 100);
            $table->string('comment_phone', 255);
            $table->string('rating', 10)->nullable();
            $table->timestamp('comment_date')->useCurrent();
            $table->unsignedInteger('product_id')->index('comments_product_id_foreign');
            $table->unsignedInteger('comment_parent_comment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
