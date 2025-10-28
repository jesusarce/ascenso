<?php

namespace App\Filament\Resources\UnidadHistoricos\Pages;

use App\Filament\Resources\UnidadHistoricos\UnidadHistoricoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListUnidadHistoricos extends ListRecords
{
    protected static string $resource = UnidadHistoricoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
