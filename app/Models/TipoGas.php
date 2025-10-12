<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;

/**
 * @method static \Illuminate\Database\Eloquent\Builder insert(array $values)
 */

class TipoGas extends Model
{
    use HasApiTokens;

    protected $table = 'tipo_gases';

    protected $fillable = [
        'descripcion',
        'uni_medida',
    ];

    public function tubos(): HasMany
    {
        return $this->hasMany(Tubos::class);
    }
}
