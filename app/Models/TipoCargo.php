<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Modelo TipoCargo
 *
 * Representa los tipos de cargos en el sistema.
 *
 * @property string $tcar_descripcion Descripción del tipo de cargo
 * @property-read \Illuminate\Database\Eloquent\Collection|CargoDestino[] $cargoDestinos Relación con CargoDestino
 */
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoCargo extends Model {
    use SoftDeletes;
    /**
     * Nombre de la tabla asociada al modelo.
     *
     * @var string
     */
    protected $table = 'tipo_cargos';

    /**
     * Atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = ['tcar_descripcion'];

    /**
     * Relación: Un tipo de cargo tiene muchos CargoDestino.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cargoDestinos() {
        return $this->hasMany(CargoDestino::class);
    }
}
