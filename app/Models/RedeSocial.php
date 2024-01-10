<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RedeSocial extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'icone',
        'url',
        'status',
    ];
}
