<div class="min-h-screen flex items-center justify-center bg-gray-100">


    <form wire:submit.prevent="submit" x-data class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-lg relative">
    @if (session('success'))
            <div class="p-2 bg-green-100 text-green-700 rounded mb-3">
                {{ session('success') }}
            </div>
        @endif    
    <div class="absolute top-4 left-4">    
            <a href="{{ route('transferencias.lista') }}" class="ext-blue-600 hover:text-blue-800 text-sm font-medium flex items-center gap-1">
                        Voltar para Lista
                    </a>
            </div>
    
    <h2 class="text-2xl font-bold text-center mb-6 text-gray-700">Nova Transferência</h2>
        <div class="mb-3">
            <label class="block text-sm font-medium mb-1">Pagador</label>
            <select wire:model="payer_id" class="w-full border rounded p-2">
                <option class=" w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none" value="">Selecione</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->tipo_user }} {{$user->id}})</option>
                @endforeach
            </select>
            @error('payer_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label class="block text-sm font-medium mb-1">Recebedor</label>
            <select wire:model="payee_id" class="w-full border rounded p-2">
                <option  class=" w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none" value="">Selecione</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->tipo_user }})</option>
                @endforeach
            </select>
            @error('payee_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium mb-1">Valor</label>
            <input type="number" step="0.01" wire:model="amount" class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            @error('amount') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <button type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 transition-colors text-white py-3 rounded-lg font-semibold shadow-md">
            Transferir
        </button>
          
    </form>
</div>
