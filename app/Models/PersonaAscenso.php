<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * Modelo PersonaAscenso
 *
 * Representa los ascensos de una persona en el sistema.
 *
 * @property int $persona_id ID de la persona
 * @property string $pasc_gestion Gestión
 * @property string $pasc_grado Grado
 * @property string $pasc_grado_grupo Grupo de grado
 * @property string $pasc_tipo Tipo de ascenso
 * @property int $convocatoria_estado_id ID estado de convocatoria
 * @property string $pasc_promocion Promoción
 * @property string $pasc_antiguedad Antigüedad
 * @property string $observacion Observación
 * @property string $archivo_nombre Nombre del archivo
 * @property int $requisito_documento_detalle_id ID requisito documento detalle
 * @property-read ConvocatoriaEstado[] $convocatoriaEstados Relación con ConvocatoriaEstado
 * @property-read CargoDestino[] $cargosDestino Relación con CargoDestino
 * @property-read DisciplinaDemerito[] $disciplinasDemerito Relación con DisciplinaDemerito
 */
class PersonaAscenso extends Model {

    /**
     * Nombre de la tabla asociada al modelo.
     *
     * @var string
     */
    protected $table = 'persona_ascensos';

    /**
     * Atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'persona_id',
        'pasc_gestion',
        'pasc_grado',
        'pasc_grado_grupo',
        'pasc_tipo',
        'convocatoria_estado_id',
        'pasc_promocion',
        'pasc_antiguedad',
        'observacion',
        'archivo_nombre',
        'requisito_documento_detalle_id',
    ];

    /**
     * Relación: Un ascenso pertenece a una Persona.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function persona() {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    /**
     * Relación: Un ascenso puede estar asociado a varios estados de convocatoria.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function convocatoriaEstados() {
        return $this->belongsToMany(ConvocatoriaEstado::class, 'convocatoria_estado_persona_ascenso', 'persona_ascenso_id', 'convocatoria_estado_id');
    }

    /**
     * Relación: Un ascenso puede tener muchos cargos destino.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cargosDestino() {
        return $this->hasMany(CargoDestino::class, 'persona_id', 'persona_id');
    }

    /**
     * Relación: Un ascenso puede tener muchas disciplinas de demérito.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function disciplinasDemerito() {
        return $this->hasMany(DisciplinaDemerito::class, 'persona_id', 'persona_id');
    }

    /**
     * Relación: Un ascenso pertenece a un RequisitoDocumentoDetalle.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function requisitoDocumentoDetalle() {
        return $this->belongsTo(RequisitoDocumentoDetalle::class, 'requisito_documento_detalle_id');
    }

    public function requisitoDocumentoPersonaAscensos() {
        return $this->hasMany(\App\Models\RequisitoDocumentoPersonaAscenso::class, 'persona_ascenso_id', 'id');
    }
}
