<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Roles;
use Illuminate\Support\Facades\DB;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_roles')->truncate();

        $adminRoles = Roles::where('role_name', 'admin')->first();
        $authorRoles = Roles::where('role_name', 'author')->first();
        $userRoles = Roles::where('role_name', 'user')->first();

        $admin = Admin::create([
            'admin_name' => 'Cườm Admin',
            'admin_email' => 'cuomadmin@gmail.com',
            'admin_avatar' => 'backend/images/1.jpg',
            'admin_phone' => '0764608195',
            'admin_password' => bcrypt('pass4so2555')
        ]);

        $author = Admin::create([
            'admin_name' => 'Cườm Author',
            'admin_email' => 'cuomauthor@gmail.com',
            'admin_avatar' => 'backend/images/2.jpg',
            'admin_phone' => '090505505',
            'admin_password' => bcrypt('pass4so2555')
        ]);

        $user = Admin::create([
            'admin_name' => 'Cườm User',
            'admin_email' => 'cuomuser@gmail.com',
            'admin_avatar' => 'backend/images/3.jpg',
            'admin_phone' => '0510008009',
            'admin_password' => bcrypt('pass4so2555')
        ]);

        $admin->roles()->attach($adminRoles);
        $author->roles()->attach($authorRoles);
        $user->roles()->attach($userRoles);
    }
}
