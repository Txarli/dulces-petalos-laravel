<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    use HasFactory;

    // Nombre de la tabla en la BD
    protected $table = 'plants';

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'name',
        'binomial_name',
        'price',
        'img_url',
        'waterings_per_week',
        'fertilizer_type',
        'height_in_cm',
    ];

    // Definir nombres en snake_case (opcional si sigues convenciones de Laravel)
    protected $casts = [
        'price' => 'decimal:2',
        'waterings_per_week' => 'integer',
        'height_in_cm' => 'integer',
    ];
}
