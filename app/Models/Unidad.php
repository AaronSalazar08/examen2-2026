<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unidad extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    public function presupuestos(): HasMany
    {
        return $this->hasMany(Presupuesto::class);
    }
}