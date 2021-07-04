<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToFeeshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('feeships', function (Blueprint $table) {
            //provinces table
            if (!Schema::hasColumn('feeships', 'province_id')) {
                $table->string('province_id', 5)->index('feeships_province_id_foreign');
            }
            $table->foreign('province_id')->references('province_id')->on('provinces')->onUpdate('cascade')->onDelete('cascade');
            
            //districts table
            if (!Schema::hasColumn('feeships', 'district_id')) {
                $table->string('district_id', 5)->index('feeships_district_id_foreign');
            }
            $table->foreign('district_id')->references('district_id')->on('districts')->onUpdate('cascade')->onDelete('cascade');
            
            //wards table
            if (!Schema::hasColumn('feeships', 'ward_id')) {
                $table->string('ward_id', 5)->index('feeships_ward_id_foreign');
            }
            $table->foreign('ward_id')->references('ward_id')->on('wards')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('feeships', function (Blueprint $table) {
            $table->dropForeign('feeships_province_id_foreign');
            $table->dropForeign('feeships_district_id_foreign');
            $table->dropForeign('feeships_ward_id_foreign');
        });
    }
}
