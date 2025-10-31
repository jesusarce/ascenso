<?php

namespace App\Filament\Resources\AscensoParametros\Pages;

use App\Filament\Resources\AscensoParametros\AscensoParametroResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAscensoParametros extends ListRecords
{
    protected static string $resource = AscensoParametroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
