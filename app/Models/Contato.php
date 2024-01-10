<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    use HasFactory;

    protected $fillable = [
        'cep',
        'logradouro',
        'bairro',
        'localidade',
        'uf',
        'numero',
        'telefone',
        'celular',
        'whatsapp',
        'email',
        'localizacao',
    ];
}
