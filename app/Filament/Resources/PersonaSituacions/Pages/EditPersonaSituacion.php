<?php

namespace App\Filament\Resources\PersonaSituacions\Pages;

use App\Filament\Resources\PersonaSituacions\PersonaSituacionResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditPersonaSituacion extends EditRecord
{
    protected static string $resource = PersonaSituacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
