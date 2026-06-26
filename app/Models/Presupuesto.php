<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['codigo_presupuesto', 'nombre_presupuesto', 'unidad_id'])]
class Presupuesto extends Model
{
    use HasFactory;

    public function unidad(): BelongsTo
    {
        return $this->belongsTo(Unidad::class);
    }


    public function materialUnidads(): HasMany
    {
        return $this->hasMany(MaterialUnidad::class);
    }
}
