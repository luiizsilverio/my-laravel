<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Excluir Cliente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 pb-1 text-gray-900">
                    <p">Gostaria mesmo de excluir o cliente <strong>{{ $cliente->nome }}</strong>?</p>
                </div>
                <form action="{{ route('clientes.destroy', $cliente->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="p-6  text-gray-900">
                        <button type="submit" class="bg-red-500 text-white rounded p-2 w-32 mr-2">Confirma</button>
                        <a href="{{ route('clientes.show', $cliente->id) }}">
                            <span class="bg-gray-50 border border-gray-400 rounded inline-block text-center p-2 w-32">Não</span>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
