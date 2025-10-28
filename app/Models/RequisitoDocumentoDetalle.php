<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequisitoDocumentoDetalle extends Model {
    
    protected $table = 'requisito_documento_detalles';

    protected $fillable = [
        'rasc_grado',
        'rasc_tiempo',
        'rasc_grado_grupo',
        'rasc_unidad_tiempo',
        'rasc_gestion',
        'rasc_abreviatura',
        'rasc_orden',
        'rasc_ascenso_descripcion',
        ];

    public function personaAscensos() {
        return $this->belongsTo(PersonaAscenso::class, 'requisito_documento_detalle_id');
    }
}
