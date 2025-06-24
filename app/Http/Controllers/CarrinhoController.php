<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function index()
    {
        $carrinho = session()->get('carrinho', []);
        $produtos = [];

        foreach (array_keys($carrinho) as $produto_id) {
            $produto = Produto::find($produto_id);
            if ($produto) {
                $produtos[] = $produto;
            }
        }

        return view('carrinho.index', ['produtos' => $produtos, 'carrinho' => $carrinho]);
    }
    
    public function store(Request $request, Produto $produto) {
        $carrinho = session()->get('carrinho', []);
        
        if (isset($carrinho[$produto->id])) {
            $carrinho[$produto->id]++;
        } else {
            $carrinho[$produto->id] = 1;
        }

        session([
            'carrinho' => $carrinho
        ]);

        return redirect()->route('carrinho.index');
    }
    
    public function remove(Request $request, Produto $produto)
    {

        $carrinho = session()->get('carrinho', []);
        unset($carrinho[$produto->id]);

        session([
            'carrinho' => $carrinho
        ]);

        return redirect()->route('carrinho.index');
    }
}
