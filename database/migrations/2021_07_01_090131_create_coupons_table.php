<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->increments('coupon_id');
            $table->string('coupon_name', 150);
            $table->string('coupon_date_start', 50);
            $table->string('coupon_date_end', 50);
            $table->unsignedInteger('coupon_time');
            $table->integer('coupon_condition');
            $table->unsignedInteger('coupon_number');
            $table->string('coupon_code', 50);
            $table->unsignedInteger('coupon_status')->default(1);
            $table->string('coupon_used', 255)->nullable();
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
        Schema::dropIfExists('coupons');
    }
}
