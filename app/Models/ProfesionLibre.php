<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * Modelo ProfesionLibre
 *
 * Representa las profesiones libres asociadas a una persona.
 *
 * @property int $persona_id ID de la persona
 * @property int $concepto_id ID del concepto
 * @property string $conc_cod Código del concepto
 * @property string $concepto Nombre del concepto
 * @property string $grado_g1 Grado
 * @property string $grado_codigo_g1 Código del grado
 * @property string $grado_descripcion_g1 Descripción del grado
 * @property string $unidad_g3 Unidad
 * @property string $unidad_codigo_g3 Código de la unidad
 * @property string $unidad_descripcion_g3 Descripción de la unidad
 * @property string $curso_realizado_g2 Curso realizado
 * @property string $curso_realizado_codigo_g2 Código del curso realizado
 * @property string $curso_realizado_descripcion_g2 Descripción del curso realizado
 * @property string $causa_g4 Causa
 * @property string $causa_codigo_g4 Código de la causa
 * @property string $causa_descripcion_g4 Descripción de la causa
 * @property string $otorgado_g5 Otorgado
 * @property string $otorgado_codigo_g5 Código otorgado
 * @property string $otorgado_descripcion_g5 Descripción otorgado
 * @property string $cargo_g6 Cargo
 * @property string $cargo_codigo_g6 Código del cargo
 * @property string $cargo_descripcion_g6 Descripción del cargo
 * @property string $respaldo_g7 Respaldo
 * @property string $fecha_inicio Fecha de inicio
 * @property string $fecha_fin Fecha de fin
 * @property string $notas Notas
 * @property-read Persona $persona Relación con Persona
 */
class ProfesionLibre extends Model {
	/**
	 * Nombre de la tabla asociada al modelo.
	 *
	 * @var string
	 */
	protected $table = 'profesion_libres';

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
		'grado_g1',
		'grado_codigo_g1',
		'grado_descripcion_g1',
		'unidad_g3',
		'unidad_codigo_g3',
		'unidad_descripcion_g3',
		'curso_realizado_g2',
		'curso_realizado_codigo_g2',
		'curso_realizado_descripcion_g2',
		'causa_g4',
		'causa_codigo_g4',
		'causa_descripcion_g4',
		'otorgado_g5',
		'otorgado_codigo_g5',
		'otorgado_descripcion_g5',
		'cargo_g6',
		'cargo_codigo_g6',
		'cargo_descripcion_g6',
		'respaldo_g7',
		'fecha_inicio',
		'fecha_fin',
		'notas',
	];

	/**
	 * Relación: Una profesión libre pertenece a una Persona.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function persona() {
		return $this->belongsTo(Persona::class);
	}
}
