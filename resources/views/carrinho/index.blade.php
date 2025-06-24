<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Carrinho
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="product-wrapper">
                        <ul>
                            @if (count($produtos) > 0)

                                @foreach ($produtos as $produto)
                                    <li>
                                        {{ $produto->nome }} (Qtd: {{ $carrinho[$produto->id] }}) - R$ {{ $produto->preco }}

                                        <form action="{{ route('carrinho.remove', $produto) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            <button type="submit">|| Remover do Carrinho</button>
                                        </form>
                                    </li>
                                @endforeach
                            
                            @else

                            <li>Não há produtos no carrinho.</li>

                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>