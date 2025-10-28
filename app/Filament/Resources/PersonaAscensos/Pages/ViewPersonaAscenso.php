<?php

namespace App\Filament\Resources\PersonaAscensos\Pages;

use App\Filament\Resources\PersonaAscensos\PersonaAscensoResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPersonaAscenso extends ViewRecord
{
    protected static string $resource = PersonaAscensoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
