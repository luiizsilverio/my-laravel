<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Usuários') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-4">Olá, <strong>{{ Auth::user()->name }}</strong></p>
                </div>
                <div class="p-6 text-gray-900">
                    <div class="p-3 bg-gray-100 rounded-lg mb-4">
                        {{ $users->links() }}
                    </div>
                    <table class="table-auto w-full">
                        <thead class="text-left bg-gray-100">
                            <tr>
                                <th class="text-center">Nível</th>
                                <th class="p-4">Nome</th>
                                <th>E-mail</th>
                                <th>Dt. Cadastro</th>
                                @if(Auth::user()->level == "admin")
                                    <th class="text-center">Ações</th>
                                @endif
                            </tr>
                            <tbody>
                                @foreach($users as $user)
                                    <tr class="hover:bg-gray-100">
                                        <td class="text-center">
                                            @if($user->level == "admin")
                                                <ion-icon name="medal"></ion-icon>
                                            @endif
                                        </td>
                                        <td class="p-2">{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        @if(Auth::user()->level == "admin")
                                            <td class="text-center">
                                                <a href="{{ route('users.edit', $user->id) }}">Alterar</a>
                                                <!-- <a href="/users/edit/{{ $user->id }}">Alterar</a> -->
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
