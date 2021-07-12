<?php

use Illuminate\Database\Seeder;
use App\Models\Roles;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Roles::create(['role_name'=>'admin']);
        Roles::create(['role_name'=>'author']);
        Roles::create(['role_name'=>'user']);
    }
}
