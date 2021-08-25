<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneroLiterario extends Model
{
    protected $fillable = [
        'tipo',
    ];

    public function rules()
    {
        return [
            'tipo' => 'required',
        ];
    }
}