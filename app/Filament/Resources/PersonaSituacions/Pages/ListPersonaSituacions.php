<?php

namespace App\Filament\Resources\PersonaSituacions\Pages;

use App\Filament\Resources\PersonaSituacions\PersonaSituacionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPersonaSituacions extends ListRecords
{
    protected static string $resource = PersonaSituacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
