<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['fecha', 'estado', 'usuario_id'])]
class Requisicion extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'fecha' => 'datetime',
        ];
    }


    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

}
