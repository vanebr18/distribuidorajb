<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Tubos extends Model
{
    use HasApiTokens;

    protected $table = 'tubos';

    protected $fillable = [
        'nro_tubo',
        'capacidad',
        'estado',
        'propio',
        'dueño',
        'proveedor_id',
        'cliente_id',
        'tipogas_id',
    ];

    public function gas()
    {
        return $this->belongsTo(TipoGas::class, 'tipogas_id');
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }
}
