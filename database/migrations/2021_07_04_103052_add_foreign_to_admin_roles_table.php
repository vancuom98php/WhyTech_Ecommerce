<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToAdminRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admin_roles', function (Blueprint $table) {
            //admin table
            if (!Schema::hasColumn('admin_roles', 'admin_id')) {
                $table->unsignedInteger('admin_id')->index('admin_roles_admin_id_foreign');
            }
            $table->foreign('admin_id')->references('admin_id')->on('admin')->onUpdate('cascade')->onDelete('cascade');

            //roles table
            if (!Schema::hasColumn('admin_roles', 'role_id')) {
                $table->unsignedInteger('role_id')->index('admin_roles_role_id_foreign');
            }
            $table->foreign('role_id')->references('role_id')->on('roles')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admin_roles', function (Blueprint $table) {
            $table->dropForeign('admin_roles_admin_id_foreign');
            $table->dropForeign('admin_roles_role_id_foreign');
        });
    }
}
