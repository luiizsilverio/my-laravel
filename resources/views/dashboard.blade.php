<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My-Laravel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p>Olá, <strong>{{ Auth::user()->name }}</strong></p>
                </div>
            </div>
            <div class="overflow-hidden mt-4 grid grid-cols-2 gap-4">
                <div class="bg-white p-6 text-gray-900 sm:rounded-lg shadow-sm">
                    <p>Clientes cadastrados: <strong>{{ str_pad($clientes, 3, "0", STR_PAD_LEFT) }}</strong></p>
                </div>
                <div class="bg-white p-6 text-gray-900 sm:rounded-lg shadow-sm">
                    <p>Usuários cadastrados: <strong>{{ str_pad($usuarios, 3, "0", STR_PAD_LEFT) }}</strong></p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
