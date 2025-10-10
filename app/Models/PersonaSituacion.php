<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PersonaSituacion extends Model {

    use SoftDeletes;

    protected $table = 'persona_situaciones';

    protected $fillable = [
        'pers_codper',
        'pers_folder',
        'pers_codigo_mininsterio',
        'pers_cua',
        'pers_cta_banco',
        'grad_descripcion',
        'pers_apellido_paterno',
        'pers_apellido_materno',
        'pers_nombres',
        'pers_estado_civil',
        'pers_sexo',
        'sangre',
        'pers_fecha_nacimiento',
        'espe_cod',
        'espe_descripcion', 
        'espe_abreviacion',
        'unid_cod',
        'unid_descricion',
        'unid_abreviatura',
        'tipo_sangre_id',
        'pers_ci',
        'pers_ci_complemento',
        'pers_expedido',
        'pers_carnet_militar',
        'pers_carnet_cosmil',
        'unidad_id',
        'coduni',
        'cargo_id',
        'codcar',
        'pers_fecha_alta',
        'escalafon_id',
        'codescal',
        'instituto_id',
        'codinst',
        'profesion_id',
        'codprof',
        'arma_id_origen',
        'armaori',
        'situacion_id',
        'codsit',
        'convo',
        'pers_fecha_baja',
        'pers_fecha_reincorporacion',
        'pers_numero_documento_baja',
        'pers_fecha_ascenso',
        'pers_puesto',
        'pers_entre',
        'pers_codigo_anterior',
        'pers_estudiante_militar',
        'ref1',
        'ref2',
        'ref3',
        'ref4',
        'usralt',
        'falta',
        'usrupd',
        'fupd',
    ];

    // public function personaAscensos()
    // {
    //     return $this->hasMany(PersonaAscenso::class, 'persona_id');
    // }
    // public function cargoDestino()
    // {
    //     return $this->hasMany(CargoDestino::class, 'persona_id');
    // }

    // public function felicitaciones()
    // {
    //     return $this->hasMany(Felicitacion::class, 'persona_id');
    // }
    // public function institutoMilitares()
    // {
    //     return $this->hasMany(InstitutoMilitar::class, 'persona_id');
    // }

    // public function disciplinaDemeritos() {
    //     return $this->hasMany(DisciplinaDemerito::class, 'persona_id');
    // }

    // public function profesionLibres()
    // {
    //     return $this->hasMany(ProfesionLibre::class, 'persona_id');
    // }

    // public function fojaConceptos()
    // {
    //     return $this->hasMany(FojaConcepto::class, 'persona_id');
    // }

    // public function tipoSangre()
    // {
    //     return $this->belongsTo(TipoSangre::class, 'tipo_sangre_id');
    // }
}
