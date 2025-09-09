<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\User;
use App\Models\Wallet;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
class TransferForm extends Component
{
    public function render()
    {
        return view('livewire.transfer-form');
    }
}
