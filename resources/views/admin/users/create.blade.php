<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Novo Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    

                <!-- formulario para criar novo usuario -->
                <form class="text-black" action=" {{ route('users.store') }}" method="post">
                    @csrf()
                    <input type="text" name="nome" placeholder="Nome">
                    <input type="email" name="email" placeholder="Email">
                    <input type="password" name="password" placeholder="Senha">
                    <button class="p-5 text-gray-900 bg-white" type="submit">Criar</button>
                </form>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
