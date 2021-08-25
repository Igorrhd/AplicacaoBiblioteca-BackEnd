<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
  protected $fillable = [
        'autor',
        'genero_literario',
        'editora',
        'titulo',
        'ano_lancamento',
    ];

    public function rules()
    {
        return [
            'autor' => 'required',
            'genero_literario' => 'required',
            'editora' => 'required',
            'titulo' => 'required',
            'ano_lancamento' => 'required',
        ];
    }          
}
