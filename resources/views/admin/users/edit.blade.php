<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="shadow-md sm:rounded-lg">
                <div class="p-8">
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-200 text-center mb-6">
                        Editar Usuario
                    </h3>

                    <form class="text-black" action=" {{ route('users.update', $user->id) }}" method="POST">
                        @method('put')
                        @include('admin.users.components.form')

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
