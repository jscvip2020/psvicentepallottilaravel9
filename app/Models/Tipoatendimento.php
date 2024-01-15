<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoAtendimento extends Model
{
    use HasFactory;

    protected $table = 'tipoatendimentos';

    protected $fillable =[
        'nome',
        'descricao',
        'link',
        'icone',
    ];

    public function horarios(): HasMany
    {
        return $this->hasMany(horario::class,'tipoatendimento_id');
    }
}
