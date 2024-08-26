<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalhes do Cliente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p>
                        <a href="{{ route('clientes.meus', Auth::user()->id) }}" class="bg-blue-500 text-white rounded p-2">
                            Meus Clientes
                        </a>
                    </p>
                </div>

                <div class="p-6 text-gray-900">
                    <p><strong>Nome: </strong>{{ $cliente->nome }}</p>
                    <p><strong>E-mail: </strong>{{ $cliente->email }}</p>
                    <p><strong>Telefone: </strong>{{ $cliente->telefone }}</p>
                    <p><strong>Tel. Comercial: </strong>{{ $cliente->tel_com }}</p>
                    <p><strong>Empresa: </strong>{{ $cliente->empresa }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
