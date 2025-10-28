<?php

namespace App\Filament\Resources\RequisitoAscensos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use PhpParser\Node\Stmt\Label;

class RequisitoAscensosTable {
    public static function configure(Table $table): Table {
        return $table->defaultSort('id', 'asc')
            ->columns([
                TextColumn::make('req_titulo')->label('Título')->searchable()->wrap()->extraAttributes(['style' => 'width:300px; white-space:normal; word-break:break-word;'])->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('rec_capitulo')->label('Capítulo')->searchable()->wrap()->extraAttributes(['style' => 'width:300px; white-space:normal; word-break:break-word;'])->toggleable(),
                TextColumn::make('req_gestion')->label('Gestión')->numeric()->sortable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')->label('Creado')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')->label('Actualizado')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('deleted_at')->label('Eliminado')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('rasc_grado_grupo')->label('Grupo de Grado')->searchable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('rasc_grado')->label('Grado')->searchable()->toggleable(),
                TextColumn::make('rasc_tiempo')->label('Tiempo')->numeric()->sortable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('rasc_unidad_tiempo')->label('Unidad de Tiempo')->searchable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('rasc_gestion')->label('Gestión')->numeric()->sortable()->toggleable(),
                TextColumn::make('rasc_abreviatura')->label('Abreviatura')->searchable()->toggleable(),
                TextColumn::make('rasc_orden')->label('Orden')->numeric()->sortable()->toggleable(),
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
