<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tipoatendimento extends Model
{
    use HasFactory;

    protected $fillable =[
        'nome',
        'descricao',
        'link',
        'icone',
    ];

    public function horarios(): HasMany
    {
        return $this->hasMany(horario::class);
    }
}
