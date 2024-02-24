<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Esteban',
            'last_name' => 'Barria',
            'email' => 'dabnav1995@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'admin',
            'rut' => '19029244-4'
        ]);
    }
}
