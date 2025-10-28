<?php

namespace App\Filament\Resources\RequisitoAscensos\Pages;

use App\Filament\Resources\RequisitoAscensos\RequisitoAscensoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRequisitoAscensos extends ListRecords
{
    protected static string $resource = RequisitoAscensoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
