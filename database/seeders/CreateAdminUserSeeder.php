<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;


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
                'name' => 'Luca Calcaterra',
                'username' => 'dpp1060688',
                'password' => bcrypt('')
            ]);
            $user->syncRoles(['super-admin']);
        }
    }
}