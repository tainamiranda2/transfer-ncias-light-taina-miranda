<div class="min-h-screen flex flex-col items-center justify-center bg-gray-100 p-6">
    <div class="w-full max-w-5xl bg-white shadow-lg rounded-2xl p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-700">Transações</h2>
            <a href="{{ route('transferencias') }}">
                <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow-md transition">
                    Nova Transferência
                </button>
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full border-collapse rounded-lg overflow-hidden">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Pagador</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Recebedor</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Valor</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Tipo</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Data</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($transaction_list as $transaction)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $transaction->payer->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $transaction->payee->name }}</td>
                            <td class="px-6 py-4 text-sm font-semibold text-green-600">R$ {{ number_format($transaction->amount, 2, ',', '.') }}</td>
                            <td class="px-6 py-4 text-sm">
                                <span class="px-2 py-1 rounded-full text-xs 
                                    {{ $transaction->type === 'entrada' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                    {{ ucfirst($transaction->type) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $transaction->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
