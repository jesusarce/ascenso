<?php

namespace App\Filament\Resources\UnidadHistoricos\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UnidadHistoricoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('unidad_id')
                    ->numeric(),
                TextInput::make('unih_coduni'),
                TextInput::make('unih_descripcion'),
                TextInput::make('unih_tipo'),
                TextInput::make('unih_puntaje')
                    ->numeric(),
                TextInput::make('unih_puntajeadd')
                    ->numeric(),
                TextInput::make('unih_gestion'),
                TextInput::make('uhis_estado'),
            ]);
    }
}
