<x-alert/>
@csrf()
{{-- <input type="text" name="name" placeholder="Nome" value="{{ $user->name ?? old('name') }}">
<input type="email" name="email" placeholder="Email" value="{{ $user->email ?? old('email') }}">
<input type="password" name="password" placeholder="Senha">
<button class="p-5 text-gray-900 bg-white" type="submit">Enviar</button> --}}




                    <!-- Nome -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-900 dark:text-gray-300">Nome</label>
                        <div class="mt-2">
                            <input 
                                type="text" 
                                name="name" 
                                id="name" 
                                value="{{ $user->name ?? old('name') }}" 
                                placeholder="Digite o nome completo" 
                                autocomplete="name" 
                                required 
                                class="block w-full rounded-lg bg-gray-50 dark:bg-gray-700 px-4 py-2 text-gray-900 dark:text-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            >
                        </div>
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-900 dark:text-gray-300">E-mail</label>
                        <div class="mt-2">
                            <input 
                                type="email" 
                                name="email" 
                                id="email" 
                                value="{{ $user->email ?? old('email') }}" 
                                placeholder="Digite o e-mail" 
                                autocomplete="email" 
                                required 
                                class="block w-full rounded-lg bg-gray-50 dark:bg-gray-700 px-4 py-2 text-gray-900 dark:text-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            >
                        </div>
                    </div>

                    <!-- Senha -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-900 dark:text-gray-300">Senha</label>
                        <div class="mt-2">
                            <input 
                                type="password" 
                                name="password" 
                                id="password" 
                                placeholder="Digite a senha" 
                                autocomplete="new-password" 
                                required 
                                class="block w-full rounded-lg bg-gray-50 dark:bg-gray-700 px-4 py-2 text-gray-900 dark:text-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            >
                        </div>
                    </div>

                    <!-- Botão de Enviar -->
                    <div>
                        <button 
                            type="submit" 
                            class="w-full rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        >
                            Enviar
                        </button>
                    </div>