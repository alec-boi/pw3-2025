<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoria = Categoria::create(['nome' => 'Cantor Pessoal']);

        $categoria->produtos()->create([
            'nome' => 'Cristiano Cornelio',
            'preco' => 299.99,
            'descricao' => 'cantor?',
            'imagem' => '/produtos/S8vPFQ6NoqAaPZXqiFXoKZ110pWuPnU9sLtblfmz.jpg'
        ]);
    }
}
