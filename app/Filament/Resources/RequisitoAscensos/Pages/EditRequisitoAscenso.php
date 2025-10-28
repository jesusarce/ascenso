<?php

namespace App\Filament\Resources\RequisitoAscensos\Pages;

use App\Filament\Resources\RequisitoAscensos\RequisitoAscensoResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditRequisitoAscenso extends EditRecord
{
    protected static string $resource = RequisitoAscensoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
