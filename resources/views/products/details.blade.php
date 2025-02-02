<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalhe do Produto</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Detalhe do Produto') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-4xl mx-auto px-6">
                <div class="bg-white shadow-lg rounded-lg p-6">
                    
                    <div class="flex items-center gap-6">
                        <!-- Imagem do produto -->
                        <img src="https://via.placeholder.com/150" alt="Imagem do Produto" class="w-40 h-40 object-cover rounded-lg shadow-md">

                        <!-- Informações do produto -->
                        <div class="flex flex-col space-y-3">
                            <h2 class="text-2xl font-bold text-gray-800">{{ $product->name }}</h2>
                            <p class="text-gray-600 text-sm">{{ $product->description }}</p>
                            <span class="text-2xl font-bold text-blue-600">R$ {{ number_format($product->price , 2, ',', '.')}} </span>
                            <span class="text-2xl font-bold text-blue-600">Postado por: {{ $product->user->name }}</span>
                            <span class="text-2xl font-bold text-blue-600">Categoria: {{ $product->category->name }}</span>
                            <!-- Botão de adicionar ao carrinho -->
                            <form action="{{ route('product.Addcart') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <input type="hidden" name="name" value="{{ $product->name }}">
                                <input type="hidden" name="price" value="{{ $product->price }}">
                                <input type="number" name="quantity" value="1" min="1">
                                <input type="hidden" name="image" value="{{ $product->image }}">
                                <button class="bg-blue-500 text-black px-5 py-2 text-lg rounded-lg shadow-md hover:bg-blue-600 transition duration-300">
                                    Adicionar ao Carrinho
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </x-app-layout>

</body>
</html>
