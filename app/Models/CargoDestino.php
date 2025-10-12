<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * Modelo CargoDestino
 *
 * Representa los destinos de cargo asignados a una persona.
 *
 * @property int $persona_id ID de la persona
 * @property int $concepto_id ID del concepto
 * @property string $conc_cod Código del concepto
 * @property string $concepto Nombre del concepto
 * @property string $desde Fecha de inicio
 * @property string $hasta Fecha de fin
 * @property string $grado Grado
 * @property string $grado_codigo Código del grado
 * @property string $grado_descripcion Descripción del grado
 * @property string $unidad Unidad
 * @property string $unidad_codigo Código de la unidad
 * @property string $unidad_descripcion Descripción de la unidad
 * @property string $cargo Cargo
 * @property string $cargo_codigo Código del cargo
 * @property string $cargo_descripcion Descripción del cargo
 * @property-read TipoCargo $tipoCargo Relación con TipoCargo
 * @property-read Persona $persona Relación con Persona
 */
use Illuminate\Database\Eloquent\SoftDeletes;

class CargoDestino extends Model {
    use SoftDeletes;
    /**
     * Nombre de la tabla asociada al modelo.
     *
     * @var string
     */
    protected $table = 'cargo_destinos';

    /**
     * Atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'persona_id', 'concepto_id', 'conc_cod', 'concepto', 'desde', 'hasta',
        'grado', 'grado_codigo', 'grado_descripcion',
        'unidad', 'unidad_codigo', 'unidad_descripcion',
        'cargo', 'cargo_codigo', 'cargo_descripcion'
    ];

    /**
     * Relación: Un destino de cargo pertenece a un TipoCargo.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoCargo() {
        return $this->belongsTo(TipoCargo::class);
    }

    /**
     * Relación: Un destino de cargo pertenece a una Persona.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function persona() {
        return $this->belongsTo(Persona::class);
    }
}
