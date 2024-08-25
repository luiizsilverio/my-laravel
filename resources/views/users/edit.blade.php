<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Alteração de Usuário') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900">
                    <p>Alterando nível de acesso do usuário <strong>{{ $user->name }}</strong></p>
                    <p>Nível de acesso atual: <strong>{{ $user->level }}</strong></p>
                </div>
                <div class="p-4 text-gray-900">
                    <form action="{{ route('users.update', $user->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <label for="level">Selecione o nível &nbsp;</label>
                        <select name="level" id="level" required class="py-1 px-4 rounded">
                            <option value="" selected disabled>Selecione</option>
                            <option value="user">Usuário Comum</option>
                            <option value="admin">Administrador</option>
                        </select>
                        <button type="submit" class="bg-blue-500 text-white rounded py-1 px-4">
                        <ion-icon name="checkbox-outline" class="mr-1"></ion-icon>
                        Confirmar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
