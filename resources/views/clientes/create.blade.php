<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- <h3 class="mb-4 font-semibold text-lg text-gray-800">Novo Cliente</h3> -->

                    @can('isAdmin')
                    <p class="mb-4">
                        <a href="{{ route('clientes.index') }}" class="bg-blue-500 text-white rounded p-2">
                            Todos os Clientes
                        </a>
                    </p>
                    @else
                        <p class="mb-4">
                            <a href="{{ route('clientes.meus', Auth::user()->id) }}" class="bg-blue-500 text-white rounded p-2">
                                Meus Clientes
                            </a>
                        </p>
                    @endcan

                    @if(session('msg'))
                        <p class="bg-blue-300 border border-blue-700 p-2 mb-4 rounded text-center text-white">
                            {{ session('msg') }}
                        </p>
                    @endif

                    <form action="{{ route('clientes.store') }}" method="post">
                        @csrf
                        <fieldset class="border-2 rounded p-6">
                            <legend>Preencha todos os campos</legend>
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <div class="bg-gray-100 px-4 py-3 mb-4 rounded overflow-hidden">
                                <label for="nome">Nome</label>
                                <input type="text" name="nome" id="nome" class="w-full rounded" required autofocus>
                            </div>
                            <div class="bg-gray-100 px-4 py-3 mb-4 rounded overflow-hidden">
                                <label for="email">E-mail</label>
                                <input type="email" name="email" id="email" class="w-full rounded" required>
                            </div>
                            <div class="bg-gray-100 px-4 py-3 mb-4 rounded overflow-hidden">
                                <label for="telefone">Telefone</label>
                                <input type="tel" name="telefone" id="telefone" class="w-full rounded">
                            </div>
                            <div class="bg-gray-100 px-4 py-3 mb-4 rounded overflow-hidden">
                                <label for="empresa">Empresa</label>
                                <input type="text" name="empresa" id="empresa" class="w-full rounded">
                            </div>
                            <div class="bg-gray-100 px-4 py-3 mb-4 rounded overflow-hidden">
                                <label for="tel_com">Tel. Comercial</label>
                                <input type="tel" name="tel_com" id="tel_com" class="w-full rounded">
                            </div>
                            <div class="bg-gray-100 px-4 py-3 mb-4 rounded overflow-hidden">
                                <input type="submit" value="Cadastrar" class="bg-blue-500 text-white rounded p-2 w-32">
                                <input type="reset" value="Limpar" class="bg-red-500 text-white rounded p-2 w-32">
                            </div>
                        </fieldset>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
