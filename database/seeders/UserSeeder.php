<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert(
            [
                [
                    'name'          => 'Super Admin',
                    'email'         => 'admin@gmail.com',
                    'password'      => '$2y$10$Dgz2Vn17c1F6zp5pKtza9ujA5atpy5tJ.hSvmxWb1RY25ju39k26e', // 12345678
                    'user_type'     => 'admin',
                    'created_at'    => Carbon::now(),
                    'updated_at'    => Carbon::now()
                ],
                [
                    'name'      => 'Jemes Bon',
                    'email'     => 'user@gmail.com',
                    'password'  => '$2y$10$Dgz2Vn17c1F6zp5pKtza9ujA5atpy5tJ.hSvmxWb1RY25ju39k26e', // 12345678
                    'user_type' => 'user',
                    'created_at'    => Carbon::now(),
                    'updated_at'    => Carbon::now()
                ],
            ]
        );
    }
}
