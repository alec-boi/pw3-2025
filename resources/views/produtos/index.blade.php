<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Produtos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <x-link-button href="{{ route('produtos.create') }}">
                        + Produto
                    </x-link-button>


                    <div class="product-wrapper">
                        @foreach ($categorias as $categoria)
                            <br>
                            <h2>{{ $categoria->nome }}</h2>
                            <br>
                            @foreach ($categoria->produtos as $product)
                                <div class="product-item" style="margin: 10px;">
                                    @if ($product->imagem)
                                        <img style="display:inline-block; width: 50px;"
                                            src="{{ asset('storage/' . $product->imagem) }}" alt="">
                                    @endif
                                    <span>Nome: {{ $product->nome }}</span>
                                    <span>Preço: {{ $product->preco }}</span>
                                    <span>
                                        <form action="{{ route('carrinho.store', $product) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-success">|| + Carrinho</button>
                                        </form>
                                    </span>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>