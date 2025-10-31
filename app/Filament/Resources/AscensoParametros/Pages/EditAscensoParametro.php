<?php

namespace App\Filament\Resources\AscensoParametros\Pages;

use App\Filament\Resources\AscensoParametros\AscensoParametroResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditAscensoParametro extends EditRecord
{
    protected static string $resource = AscensoParametroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
