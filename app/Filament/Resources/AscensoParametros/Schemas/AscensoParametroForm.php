<?php

namespace App\Filament\Resources\AscensoParametros\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AscensoParametroForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                    TextInput::make('ascp_nombre')->label('Nombre'),
                    TextInput::make('ascp_grupo')->label('Grupo'),
                    TextInput::make('ascp_grado')->label('Grado'),
                    TextInput::make('ascp_abreviatura')->label('Abreviatura'),
                    TextInput::make('ascp_nota_detalle')->label('Nota Detalle'),
            ]);
    }
}
