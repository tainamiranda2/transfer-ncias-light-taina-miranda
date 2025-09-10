<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\User;
use App\Models\Wallet;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Notifications\TransferReceived;

class TransferForm extends Component
{
    public $payer_id;
    public $payee_id;
    public $amount;

    public function submit()
    {
        $this->validate([
            'payer_id' => 'required|different:payee_id|exists:users,id',
            'payee_id' => 'required|exists:users,id',
            'amount'   => 'required|numeric|min:0.01',
        ]);

        $payer = User::find($this->payer_id);
        $payee = User::find($this->payee_id);

        if ($payer->tipo_user === 'lojista') {
            $this->addError('payer_id', 'Lojistas não podem enviar dinheiro.');
            return;
        }

        if ($payer->wallet->balance < $this->amount) {
            $this->addError('amount', 'Saldo insuficiente.');
            return;
        }
        $response = Http::get('https://util.devi.tools/api/v2/authorize');
        if (!$response->ok() || $response->json('status') !== 'success') {
            $this->addError('amount', 'Transação não autorizada pelo serviço externo.');
            return;
        }

        DB::transaction(function () use ($payer, $payee) {
            $payer->wallet->decrement('balance', $this->amount);
            $payee->wallet->increment('balance', $this->amount);

            Transaction::create([
                'payer_id' => $payer->id,
                'payee_id' => $payee->id,
                'amount'   => $this->amount,
                'type'     => 'transfer',
            ]);
        });

        // notificação mock
        Http::post('https://util.devi.tools/api/v1/notify', [
            'user' => $payee->email,
            'message' => 'Você recebeu uma transferência!',
        ]);

        session()->flash('success', 'Transferência realizada com sucesso!');
        $this->reset(['payer_id', 'payee_id', 'amount']);
        $payee->notify(new TransferReceived($this->amount));


    }


    public function render()
    {
        return view('livewire.transfer-form', [
            'users' => User::all()
        ]);
    }
}
