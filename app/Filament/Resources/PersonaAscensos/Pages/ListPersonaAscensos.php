<?php

namespace App\Filament\Resources\PersonaAscensos\Pages;

use App\Filament\Resources\PersonaAscensos\PersonaAscensoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPersonaAscensos extends ListRecords
{
    protected static string $resource = PersonaAscensoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
