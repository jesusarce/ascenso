<?php

namespace App\Filament\Resources\RequisitoAscensos\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class RequisitoAscensoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('req_titulo'),
                TextInput::make('rec_capitulo'),
                TextInput::make('req_gestion')
                    ->required()
                    ->numeric(),
                TextInput::make('rasc_grado'),
                TextInput::make('rasc_tiempo')
                    ->numeric(),
                TextInput::make('rasc_grado_grupo'),
                TextInput::make('rasc_unidad_tiempo'),
                TextInput::make('rasc_gestion')
                    ->numeric(),
                TextInput::make('rasc_abreviatura'),
                TextInput::make('rasc_orden')
                    ->numeric(),
            ]);
    }
}
