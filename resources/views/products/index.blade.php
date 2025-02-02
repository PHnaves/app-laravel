<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Produtos') }}
        </h2>
    </x-slot>

    <div class="bg-white">
        <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900">Customers also purchased</h2>

            <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
                @foreach ($products as $product)
                    <!-- Produto -->
                    <div class="group relative bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg">
                        <div class="aspect-w-1 aspect-h-1 w-full h-48 overflow-hidden">
                            <img 
                                {{-- src="https://tailwindui.com/plus/img/ecommerce-images/product-page-01-related-product-01.jpg"  --}}
                                alt="{{ $product->name }}" 
                                class="w-full h-full object-cover group-hover:opacity-75"
                            >
                        </div>
                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-800 truncate">
                                <a href=" {{ route('product.details', ['product' => $product->id]) }}" class="hover:underline">
                                    {{ $product->name }}
                                </a>
                            </h3>
                            <p class="mt-1 text-sm text-gray-500 truncate">{{ $product->description }}</p>
                            <p class="mt-2 text-sm font-semibold text-indigo-600">${{ $product->price }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>


