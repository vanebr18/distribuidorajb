<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

/**
 * @method static \Illuminate\Database\Eloquent\Builder insert(array $values)
 */
class Zonas extends Model
{
    use HasApiTokens;

    protected $table = 'zonas';

    protected $fillable = [
        'descripcion',
        'estado',
    ];
}
