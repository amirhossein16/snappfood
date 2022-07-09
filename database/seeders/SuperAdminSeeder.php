<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use function PHPUnit\Framework\isNull;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::where('role', 'superAdmin')->first();

        if (is_null($admin)) {
            $admin = new User();
            $admin->name = "Super Admin";
            $admin->email = "superadmin@example.com";
            $admin->role = "superAdmin";
            $admin->password = bcrypt('12345678');
            $admin->save();
        }

        $admin->assignRole('superadmin');
    }
}
