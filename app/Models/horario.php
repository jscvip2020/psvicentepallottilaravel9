<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class horario extends Model
{
    use HasFactory;

    protected $fillable=[
        'dia',
        'inicio1',
        'final1',
        'inicio2',
        'final2',
        'descricao',
        'tipoatendimento_id',
    ];

    public function tipoatendimento(): BelongsTo
    {
        return $this->belongsTo(tipoatendimento::class);
    }
}
