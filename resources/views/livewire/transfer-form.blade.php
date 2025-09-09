<div class="max-w-md mx-auto p-6 bg-white rounded-xl shadow-md">
    <h2 class="text-lg font-bold mb-4">Nova Transferência</h2>

    @if (session('success'))
        <div class="p-2 bg-green-100 text-green-700 rounded mb-3">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="submit" x-data>
        <div class="mb-3">
            <label class="block text-sm font-medium">Pagador</label>
            <select wire:model="payer_id" class="w-full border rounded p-2">
                <option value="">Selecione</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->tipo_user }})</option>
                @endforeach
            </select>
            @error('payer_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label class="block text-sm font-medium">Recebedor</label>
            <select wire:model="payee_id" class="w-full border rounded p-2">
                <option value="">Selecione</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->tipo_user }})</option>
                @endforeach
            </select>
            @error('payee_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label class="block text-sm font-medium">Valor</label>
            <input type="number" step="0.01" wire:model="amount" class="w-full border rounded p-2">
            @error('amount') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <button type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded">
            Transferir
        </button>
          <a href="{{ route('transferencias.lista') }}">
            <button type="button">Voltar para Lista</button>
        </a>
    </form>
</div>
