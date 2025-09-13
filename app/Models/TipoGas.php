<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

/**
 * @method static \Illuminate\Database\Eloquent\Builder insert(array $values)
 */

class TipoGas extends Model
{
    use HasApiTokens;

    protected $fillable = [
        'descripcion',
        'uni_medida',
    ];

}
