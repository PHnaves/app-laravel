<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Carrinho') }}
        </h2>
    </x-slot>

    <div class="bg-white">
        <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900">Seu Carrinho de Compras Possui {{ $products->count() }} Produtos</h2>

            @if ($mensage = Session::get('aviso'))
                <h2>{{ $mensage }}</h2>
            @endif
            <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
        
               @if ($products->count() == 0)
                   <h1>Não tem Produtos em seu Carrinho </h1>
                @else

                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nome</th>
                            <th>Preço</th>
                            <th>Quantidade</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($products as $product)

                        <tr>
                            <td><img src="{{ $product->attributes->image}}" alt="imagem dos produtos no carrinho"></td>
                            <td> {{ $product->name}}</td>
                            <td> {{ $product->price}}</td>

                            <form action="{{ route('product.updateCart') }}" method="post">
                                @csrf
                                @method('put')
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <td><input type="number" name="quantity" id="quantity" min="1" value="{{ $product->quantity}}"></td>
                                <td>
                                    <!-- Botão de Refresh -->
                                    <button 
                                        class="px-4 py-2 bg-blue-500 text-black font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75"
                                    >
                                        🔄 Atualizar
                                    </button>
                                </td>
                            </form>
                            
                            <td>
                                <div class="flex space-x-4">
                                    <!-- Botão de Remover Produto do Carrinho -->
                                    <form action="{{ route('product.removeCart') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <button 
                                            class="px-4 py-2 bg-red-500 text-black font-semibold rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75"
                                        >
                                            🗑️ Remover Produto
                                        </button>
                                    </form>
                                </div>
                                
                            </td>

                        </tr>

                        @endforeach
                    </tbody>
                </table>
                    
                @endif

                <div>
                        <!-- Botão de Continuar Comprando -->
                        <a href="{{ route('products') }}"
                            class="px-4 py-2 bg-green-500 text-black font-semibold rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75"
                        >
                            🛒 Continuar Comprando
                        </a>

                        <form action="{{ route('product.clearCart') }}" method="post">
                            @csrf
                            @method('delete')
                            <!-- Botão de Esvaziar Carrinho -->
                            <button
                                class="px-4 py-2 bg-red-500 text-black font-semibold rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75"
                            >
                                ❌ Esvaziar Carrinho
                            </button>
                        </form>

                        <!-- Botão de Finalizar Pedido -->
                        <button 
                            class="px-4 py-2 bg-purple-500 text-black font-semibold rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:ring-opacity-75"
                        >
                            ✅ Finalizar Pedido
                        </button>
                        <h4>Total: {{ \Webkleur\Cart\Facades\CartFacade::getTotal() }}</h4>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


