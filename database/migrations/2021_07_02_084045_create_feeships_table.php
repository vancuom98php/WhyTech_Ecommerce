<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeeshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feeships', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->increments('fee_id');
            $table->string('province_id', 5)->index('feeships_province_id_foreign');
            $table->string('district_id', 5)->index('feeships_district_id_foreign');
            $table->string('ward_id', 5)->index('feeships_ward_id_foreign');
            $table->string('fee_feeship', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feeships');
    }
}
