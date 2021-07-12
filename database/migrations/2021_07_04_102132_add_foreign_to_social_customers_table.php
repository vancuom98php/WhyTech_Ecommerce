<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToSocialCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('social_customers', function (Blueprint $table) {
            //customers table
            if (!Schema::hasColumn('social_customers', 'user')) {
                $table->unsignedInteger('user')->index('social_customers_user_foreign');
            }
            $table->foreign('user')->references('customer_id')->on('customers')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('social_customers', function (Blueprint $table) {
            $table->dropForeign('social_customers_user_foreign');
        });
    }
}
