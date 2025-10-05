<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

/**
 * @method static \Illuminate\Database\Eloquent\Builder insert(array $values)
 */

class Proveedor extends Model
{
    use HasApiTokens;

    protected $table = 'proveedores';

    protected $fillable = [
        'nombre',
        'alias',
        'direccion',
        'telefono',
        'estado',
    ];
}
