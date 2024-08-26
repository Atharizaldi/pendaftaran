<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\AccountUser;

class AddUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AccountUser::create([
                'role' => 'admin',
                'status_daftar' => 'belum mendaftar',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12341234'),
                'phone_number' => '081234567890',
        ]);
    }
}
