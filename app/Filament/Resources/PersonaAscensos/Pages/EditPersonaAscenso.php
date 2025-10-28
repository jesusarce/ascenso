<?php

namespace App\Filament\Resources\PersonaAscensos\Pages;

use App\Filament\Resources\PersonaAscensos\PersonaAscensoResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPersonaAscenso extends EditRecord
{
    protected static string $resource = PersonaAscensoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
