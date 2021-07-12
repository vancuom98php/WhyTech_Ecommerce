<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToWardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wards', function (Blueprint $table) {
            //districts table
            if (!Schema::hasColumn('wards', 'district_id')) {
                $table->unsignedInteger('district_id')->index('wards_district_id_foreign');
            }
            $table->foreign('district_id')->references('district_id')->on('districts')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wards', function (Blueprint $table) {
            $table->dropForeign('wards_district_id_foreign');
        });
    }
}
