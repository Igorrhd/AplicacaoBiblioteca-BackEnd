<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Editora extends Model
{
    protected $fillable = [
        'nome',
        'endereco',
    ];

    public function rules()
    {
        return [
            'nome' => 'required',
            'endereco' => 'required',
        ];
    }
}
