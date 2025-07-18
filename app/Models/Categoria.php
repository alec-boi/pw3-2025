<?php

namespace App\Models;

use App\Models\Produto;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        'nome',
    ];

    public function produtos() {
        return $this->belongsToMany(Produto::class, 'categorias_produtos');
    }
}
