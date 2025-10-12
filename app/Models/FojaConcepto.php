<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * Modelo FojaConcepto
 *
 * Representa los conceptos de foja asociados a una persona.
 *
 * @property int $persona_id ID de la persona
 * @property int $concepto_id ID del concepto
 * @property string $conc_cod Código del concepto
 * @property string $concepto Nombre del concepto
 * @property string $fecha Fecha
 * @property string $grado_g1 Grado
 * @property string $grado_codigo_g1 Código del grado
 * @property string $grado_descripcion_g1 Descripción del grado
 * @property string $foja_concepto_g2 Foja concepto
 * @property string $foja_concepto_codigo_g2 Código de foja concepto
 * @property string $foja_concepto_descripcion_g2 Descripción de foja concepto
 * @property string $otorgado_g3 Otorgado
 * @property string $otorgado_codigo_g3 Código otorgado
 * @property string $otorgado_descripcion_g3 Descripción otorgado
 * @property string $cargo_g4 Cargo
 * @property string $cargo_codigo_g4 Código del cargo
 * @property string $cargo_descripcion_g4 Descripción del cargo
 * @property string $respaldo_g7 Respaldo
 * @property float $promedio Promedio
 * @property-read Persona $persona Relación con Persona
 */
class FojaConcepto extends Model {
    
    /**
     * Nombre de la tabla asociada al modelo.
     *
     * @var string
     */
    protected $table = 'foja_conceptos';

    /**
     * Atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'persona_id',
        'concepto_id',
        'conc_cod',
        'concepto',
        'fecha',
        'grado_g1',
        'grado_codigo_g1',
        'grado_descripcion_g1',
        'foja_concepto_g2',
        'foja_concepto_codigo_g2',
        'foja_concepto_descripcion_g2',
        'otorgado_g3',
        'otorgado_codigo_g3',
        'otorgado_descripcion_g3',
        'cargo_g4',
        'cargo_codigo_g4',
        'cargo_descripcion_g4',
        'respaldo_g7',
        'promedio',
    ];

    /**
     * Relación: Un concepto de foja pertenece a una Persona.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function persona() {
        return $this->belongsTo(Persona::class);
    }
}
