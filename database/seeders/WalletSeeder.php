<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Wallet;
class WalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Wallet::create([
            'user_id' => 1, 
            'balance' => 1000,
        ]);

        Wallet::create([
            'user_id' => 2, 
            'balance' => 5000,
        ]);
    }
}
