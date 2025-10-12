<?php

namespace App\Filament\Resources\Personas\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PersonaForm {

    public static function configure(Schema $schema): Schema {
        return $schema
            ->components([
                Section::make('Datos Personales')
            ->description('Puede crear o editar los datos personales de una persona.')
            // ->columns(3
            //     [
            //     'sm' => 1,
            //     'xl' => 3,
            //     '2xl' => 4,
            // ])
            ->schema([
                    TextInput::make('pers_codper')->label('Codigo'),
                    TextInput::make('pers_folder')->label('Folder'),
                    TextInput::make('pers_codigo_mininsterio')->label('Cod. Mininsterio'),
                    TextInput::make('pers_cua')->label('CUA'),
                    TextInput::make('pers_cta_banco')->label('Cta. Banco'),
                    TextInput::make('grad_descripcion')->label('Grado'),
                    TextInput::make('pers_apellido_paterno')->label('Paterno'),
                    TextInput::make('pers_apellido_materno')->label('Materno'),
                    TextInput::make('pers_nombres')->label('Nombres'),
                    TextInput::make('pers_estado_civil')->label('Estado Civil'),
                    TextInput::make('pers_sexo')->label('Sexo'),
                    // Select::make('tipo_sangre_id')->label('Tipo Sangre')->options(TipoSangre::all()->pluck('tsan_descripcion', 'id')),
                    DatePicker::make('pers_fecha_nacimiento')->label('Fecha Nacimiento')
                    ->formatStateUsing(fn ($state) => $state ? \Carbon\Carbon::parse($state)->format('d/m/Y') : '')
                    ->dehydrateStateUsing(fn ($state) => $state ? \Carbon\Carbon::createFromFormat('d/m/Y', $state)->format('Y-m-d') : null)
                    ->native(false) // Para usar el calendario de Filament (más bonito)
                    ->closeOnDateSelection(),
                    TextInput::make('pers_ci')->label('CI'),
                    TextInput::make('pers_ci_complemento')->label('Complemento'),
                    TextInput::make('pers_expedido')->label('Expedido'),
                    TextInput::make('pers_carnet_militar')->label('Cnt. Militar'),
            ])->columnSpan(4)->columns(3),
            Section::make('Datos Adicionales')
                ->schema([
                    TextInput::make('pers_carnet_cosmil')->label('Cnt. Cosmil'),
                ])->columnSpan(2)
            ])->columns(6);
    }
}
