<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * Modelo DisciplinaDemerito
 *
 * Representa los deméritos disciplinarios asignados a una persona.
 *
 * @property int $persona_id ID de la persona
 * @property int $concepto_id ID del concepto
 * @property string $conc_cod Código del concepto
 * @property string $concepto Nombre del concepto
 * @property string $fecha Fecha del demérito
 * @property string $grado_g1 Grado
 * @property string $grado_codigo_g1 Código del grado
 * @property string $grado_descripcion_g1 Descripción del grado
 * @property string $motivo_g3 Motivo
 * @property string $motivo_codigo_g3 Código del motivo
 * @property string $motivo_descripcion_g3 Descripción del motivo
 * @property string $documento_g2 Documento
 * @property string $documento_codigo_g2 Código del documento
 * @property string $documento_descripcion_g2 Descripción del documento
 * @property string $causa_g4 Causa
 * @property string $causa_codigo_g4 Código de la causa
 * @property string $causa_descripcion_g4 Descripción de la causa
 * @property string $nro Número
 * @property string $otorgado_g5 Otorgado
 * @property string $otorgado_codigo_g5 Código otorgado
 * @property string $otorgado_descripcion_g5 Descripción otorgado
 * @property string $cargo_g6 Cargo
 * @property string $cargo_codigo_g6 Código del cargo
 * @property string $cargo_descripcion_g6 Descripción del cargo
 * @property string $respaldo_g7 Respaldo
 * @property int $puntos Puntos
 * @property-read Persona $persona Relación con Persona
 */
class DisciplinaDemerito extends Model {
    /**
     * Nombre de la tabla asociada al modelo.
     *
     * @var string
     */
    protected $table = 'disciplina_demeritos';

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
        'motivo_g3',
        'motivo_codigo_g3',
        'motivo_descripcion_g3',
        'documento_g2',
        'documento_codigo_g2',
        'documento_descripcion_g2',
        'causa_g4',
        'causa_codigo_g4',
        'causa_descripcion_g4',
        'nro',
        'otorgado_g5',
        'otorgado_codigo_g5',
        'otorgado_descripcion_g5',
        'cargo_g6',
        'cargo_codigo_g6',
        'cargo_descripcion_g6',
        'respaldo_g7',
        'puntos',
    ];

    /**
     * Relación: Un demérito disciplinario pertenece a una Persona.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function persona() {
        return $this->belongsTo(Persona::class);
    }
}
