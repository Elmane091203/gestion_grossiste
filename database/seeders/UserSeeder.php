<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('users')->insert([
            [
                'nom' => 'Kane',
                'prenom' => 'Samba Bery',
                'email' => 'sambaisidk@groupeisi.com',
                'password' => Hash::make('12345'),
                'role' => 'admin'
            ],
            [
                'nom' => 'Houmadi',
                'prenom' => 'Elmane Djaanffar',
                'email' => 'elmane@groupeisi.com',
                'password' => Hash::make('12345'),
                'role' => 'gestionnaire'
            ],
        ]);
    }
}
