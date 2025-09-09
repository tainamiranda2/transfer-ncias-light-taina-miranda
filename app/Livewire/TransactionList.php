<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaction;
class TransactionList extends Component
{
    public function render()
    {
        return view('livewire.transaction-list', [
            'transaction_list' => Transaction::with(['payer', 'payee'])->get()
        ]);
    }
}
