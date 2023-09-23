<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin')
           ])->assignRole('Admin');

           User::create([
            'name' => 'Profe',
            'email' => 'profe@gmail.com',
            'password' => bcrypt('admin')
           ])->assignRole('Profe');

           User::create([
            'name' => 'Aprendiz',
            'email' => 'aprendiz@gmail.com',
            'password' => bcrypt('admin')
           ])->assignRole('Aprendiz');
    }
}
