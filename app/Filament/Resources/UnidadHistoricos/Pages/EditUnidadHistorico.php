<?php

namespace App\Filament\Resources\UnidadHistoricos\Pages;

use App\Filament\Resources\UnidadHistoricos\UnidadHistoricoResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditUnidadHistorico extends EditRecord
{
    protected static string $resource = UnidadHistoricoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
