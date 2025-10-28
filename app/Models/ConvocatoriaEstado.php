<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Modelo ConvocatoriaEstado
 *
 * Representa los estados de convocatoria en el sistema.
 *
 * @property int $id ID del estado de convocatoria
 * @property string $cest_descripcion Descripción del estado
 * @property-read PersonaAscenso[] $personaAscensos Relación con PersonaAscenso
 */
class ConvocatoriaEstado extends Model {
    
    use SoftDeletes;

    /**
     * Nombre de la tabla asociada al modelo.
     *
     * @var string
     */
    protected $table = 'convocatoria_estados';

    /**
     * Atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'cest_descripcion',
    ];

    /**
     * Relación: Un estado de convocatoria puede estar asociado a muchos PersonaAscenso.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function personaAscensos() {
        return $this->belongsToMany(PersonaAscenso::class, 'convocatoria_estado_persona_ascenso');
    }
}
