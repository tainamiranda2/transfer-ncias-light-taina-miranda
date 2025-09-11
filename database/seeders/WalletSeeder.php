<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Wallet;
use App\Models\User;

class WalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       User::doesntHave('wallet')->get()->each(function ($user) {
            Wallet::create([
                'user_id' => $user->id,
                'balance' => rand(0, 5000), 
            ]);
        });
    
    }
}
