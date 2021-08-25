<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $fillable = [
        'nome',
        'ano_nascimento',
        'sexo',
        'nacionalidade',
    ];

    public function rules()
    {
        return [
            'nome' => 'required',
            'ano_nascimento' => 'required',
            'sexo' => 'required',
            'nacionalidade' => 'required',
        ];
    }
}
