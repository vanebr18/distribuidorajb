<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

/**
 * @method static \Illuminate\Database\Eloquent\Builder insert(array $values)
 */

class Cliente extends Model
{
    use HasApiTokens;

    protected $table = 'clientes';

    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'estado',
        'zona_id',
    ];

    public function zona()
    {
        return $this->belongsTo(Zonas::class, 'zona_id');
    }
}
