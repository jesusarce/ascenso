<?php

namespace App\Filament\Resources\Permissions\Tables;

use Carbon\Carbon;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PermissionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nombre')->sortable()
                    ->toggleable()->searchable(isIndividual: true),
                TextColumn::make('guard_name')
                ->label('Guardian')->badge()
                ->color(fn ($state) => $state === 'web' ? 'primary' : ($state === 'api' ? 'warning' : 'secondary'))->sortable()
                    ->toggleable()->searchable(isIndividual: true),
                TextColumn::make('created_at')
                    ->label('Creado')
                    ->formatStateUsing(fn ($state) => $state ? Carbon::parse($state)
                        ->locale(app()->getLocale() ?? 'es')
                        ->isoFormat('LLL') : '—')
                    ->sortable()
                    ->tooltip('Formato: dd/mm/YYYY — también acepta "29 octubre 2025"')
                    ->searchable(isIndividual: true)
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Actualizado')
                    ->formatStateUsing(fn ($state) => $state ? Carbon::parse($state)
                        ->locale(app()->getLocale() ?? 'es')
                        ->isoFormat('LLL') : '—')
                    ->sortable()
                    ->tooltip('Formato: dd/mm/YYYY — también acepta "29 octubre 2025"')
                    ->searchable(isIndividual: true)
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
