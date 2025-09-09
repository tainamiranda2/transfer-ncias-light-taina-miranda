<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        User::create([
            'name' => 'Alice Comum',
            'email' => 'alice@example.com',
            'password' => Hash::make('12345678'),
            'cpf_cnpj' => '12345678901',
            'tipo_user' => 'comum',
        ]);
        
        User::create([
            'name' => 'Loja XYZ',
            'email' => 'lojista@example.com',
            'password' => Hash::make('12345678'),
            'cpf_cnpj' => '98765432100',
            'tipo_user' => 'lojista',
        ]);
    }
}
