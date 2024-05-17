<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)->create();
        $this->createAdminUser();
        $this->createNormalUser();
    }

    private function createAdminUser(): void
    {
        $adminUser = new User();

        $adminUser->name = 'admin';
        $adminUser->email = 'admin@boorgir.be';
        $adminUser->password = bcrypt('admin');
        $adminUser->is_admin = true;

        $adminUser->save();
    }

    private function createNormalUser(): void
    {
        $adminUser = new User();

        $adminUser->name = 'joe';
        $adminUser->email = 'joe@gmail.com';
        $adminUser->password = bcrypt('password');

        $adminUser->save();
    }
}
