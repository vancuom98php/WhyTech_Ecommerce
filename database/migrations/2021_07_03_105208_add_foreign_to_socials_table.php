<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('socials', function (Blueprint $table) {
            //admin table
            if (!Schema::hasColumn('socials', 'user')) {
                $table->unsignedInteger('user')->index('socials_user_foreign');
            }
            $table->foreign('user')->references('admin_id')->on('admin')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('socials', function (Blueprint $table) {
            $table->dropForeign('socials_user_foreign');
        });
    }
}
