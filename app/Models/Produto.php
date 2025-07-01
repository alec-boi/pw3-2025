<?php

namespace App\Models;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'nome', 'preco', 'descricao', 'imagem',
    ];

    public function categorias() {
        return $this->belongsToMany(Categoria::class, 'categorias_produtos');
    }
}
