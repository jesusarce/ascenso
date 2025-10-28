<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequisitoDocumento extends Model {
    
    protected $table = 'requisito_documentos';

    protected $fillable = [
        'requisito_ascenso_id',
	    'rdoc_descripcion',
	    'rdoc_respaldo',
	    'rdoc_reqespecifico',
    ];

    public function requisitoAscenso() {
        return $this->belongsTo(RequisitoAscenso::class, 'requisito_ascenso_id');
    }
}
