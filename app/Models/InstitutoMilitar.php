<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * Modelo InstitutoMilitar
 *
 * Representa los institutos militares asociados a una persona.
 *
 * @property int $persona_id ID de la persona
 * @property int $concepto_id ID del concepto
 * @property string $conc_cod Código del concepto
 * @property string $concepto Nombre del concepto
 * @property string $fecha Fecha
 * @property string $grado_g1 Grado
 * @property string $grado_codigo_g1 Código del grado
 * @property string $grado_descripcion_g1 Descripción del grado
 * @property string $unidad_g3 Unidad
 * @property string $unidad_codigo_g3 Código de la unidad
 * @property string $unidad_descripcion_g3 Descripción de la unidad
 * @property string $curso_unidad_g2 Curso/Unidad
 * @property string $curso_unidad_codigo_g2 Código del curso/unidad
 * @property string $curso_unidad_descripcion_g2 Descripción del curso/unidad
 * @property string $lugar_g4 Lugar
 * @property string $lugar_codigo_g4 Código del lugar
 * @property string $lugar_descripcion_g4 Descripción del lugar
 * @property string $documento_g2 Documento
 * @property string $documento_codigo_g2 Código del documento
 * @property string $documento_descripcion_g2 Descripción del documento
 * @property string $otorgado_g5 Otorgado
 * @property string $otorgado_codigo_g5 Código otorgado
 * @property string $otorgado_descripcion_g5 Descripción otorgado
 * @property string $cargo_g6 Cargo
 * @property string $cargo_codigo_g6 Código del cargo
 * @property string $cargo_descripcion_g6 Descripción del cargo
 * @property string $respaldo_g7 Respaldo
 * @property float $promedio Promedio
 * @property-read Persona[] $personas Relación con Persona
 */
class InstitutoMilitar extends Model {
    /**
     * Nombre de la tabla asociada al modelo.
     *
     * @var string
     */
    protected $table = 'instituto_militares';

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
        'unidad_g3',
        'unidad_codigo_g3',
        'unidad_descripcion_g3',
        'curso_unidad_g2',
        'curso_unidad_codigo_g2',
        'curso_unidad_descripcion_g2',
        'lugar_g4',
        'lugar_codigo_g4',
        'lugar_descripcion_g4',
        'documento_g2',
        'documento_codigo_g2',
        'documento_descripcion_g2',
        'otorgado_g5',
        'otorgado_codigo_g5',
        'otorgado_descripcion_g5',
        'cargo_g6',
        'cargo_codigo_g6',
        'cargo_descripcion_g6',
        'respaldo_g7',
        'promedio',
    ];

    /**
     * Relación: Un instituto militar tiene muchas Personas.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function personas() {
        return $this->hasMany(Persona::class);
    }
}
