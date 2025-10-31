<?php

namespace App\Filament\Resources\AscensoParametros\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class AscensoParametrosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                	TextColumn::make('ascp_nombre')->label('Nombre'),
                    TextColumn::make('ascp_grupo')->label('Grupo'),
                    TextColumn::make('ascp_grado')->label('Grado'),
                    TextColumn::make('ascp_abreviatura')->label('Abreviatura'),
                    TextColumn::make('ascp_nota_detalle')->label('Nota Detalle'),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
