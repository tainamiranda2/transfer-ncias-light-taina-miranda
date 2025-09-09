<div>
    <h2>Transações</h2>
    <table>
        <thead>
            <tr>
                <th>Payer</th>
                <th>Payee</th>
                <th>Amount</th>
                <th>Type</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaction_list as $transaction)
                <tr>
                    <td>{{ $transaction->payer->name }}</td>
                    <td>{{ $transaction->payee->name }}</td>
                    <td>{{ $transaction->amount }}</td>
                    <td>{{ $transaction->type }}</td>
                    <td>{{ $transaction->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('transferencias') }}">
        <button>Nova Transferência</button>
    </a>
</div>
