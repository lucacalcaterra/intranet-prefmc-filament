<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('username', 'dpp1060688')->first();
        if (!$user) {
            $user = User::create([
                'name' => 'superadmin' ,
                'surname' => 'superadmin',
                'email' => env('SUPERADMIN_EMAIL'),
                'username' => env('SUPERADMIN_USER'),
                'password' => bcrypt(env('SUPERADMIN_PASSWORD'))
            ]);
            $user->syncRoles(['superadministrator']);
        }
    }
}
