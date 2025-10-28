<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequisitoDocumentoPersonaAscenso extends Model {
    
    use SoftDeletes;
    protected $table = 'requisito_documento_persona_ascensos';

    protected $fillable = [
        'requisito_documento_id',
        'persona_id',
        'persona_ascenso_id',
        'rdpa_especifico',
        'rdpa_detalle',
        'rdpa_documento',
        'rdpa_puntaje',
    ];

    public function requisitoDocumento() {
        return $this->belongsTo(RequisitoDocumento::class);
    }

    public function personaAscenso() {
        return $this->belongsTo(PersonaAscenso::class);
    }

    public function persona() {
        return $this->belongsTo(Persona::class);
    }
}
