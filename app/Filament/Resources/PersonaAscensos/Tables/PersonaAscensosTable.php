<?php

namespace App\Filament\Resources\PersonaAscensos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PersonaAscensosTable {
    public static function configure(Table $table): Table {
        return $table
            ->columns([
                    IconColumn::make('convocado')
                        ->label('Convocado?')
                        ->boolean()
                        ->color(fn ($record) => $record->convocatoriaEstados()->whereIn('convocatoria_estados.id', (array) config('ascensos.convocado_estado_ids', [1,2]))->exists() ? 'success' : 'danger')
                        ->getStateUsing(fn ($record) => $record->convocatoriaEstados()->whereIn('convocatoria_estados.id', (array) config('ascensos.convocado_estado_ids', [1,2]))->exists()),
                    TextColumn::make('pasc_tipo')
                        ->label('Tipo')
                        ->badge()
                        ->color(fn ($state) => $state === 'OPERATIVA' ? 'success' : 'info')
                        ->sortable()
                        ->searchable(isIndividual: true),
                    TextColumn::make('pasc_antiguedad')->toggleable(true)->searchable(isIndividual: true)->sortable()->label('Antiguedad'),
                    TextColumn::make('requisitoDocumentoDetalle.rasc_ascenso_descripcion')->label('Postulacion')
                    ->toggleable(true)->searchable(isIndividual: true)
                    ->sortable(),
                    TextColumn::make('pasc_grado')->toggleable(true)->searchable(isIndividual: true)->sortable()->label('Grado'),
                    TextColumn::make('persona.espe_abreviacion')->searchable(isIndividual: true)->sortable()->label('Especialidad')->alignCenter(),
                    TextColumn::make('persona.pers_apellido_paterno')->toggleable(true)->label('Paterno')
                        ->toggleable(true)->searchable(isIndividual: true)
                        ->sortable(),
                    TextColumn::make('persona.pers_apellido_materno')->label('Materno')
                        ->toggleable(true)->searchable(isIndividual: true)
                        ->sortable(),
                    TextColumn::make('persona.pers_nombres')->label('Nombres')
                        ->toggleable(true)->searchable(isIndividual: true)
                        ->sortable(),
                    TextColumn::make('pasc_gestion')->toggleable(true)->searchable(isIndividual: true)->sortable()->label('Año Ascenso')->alignCenter(),
                    TextColumn::make('pasc_grado_grupo')->toggleable(true)->searchable(isIndividual: true)->sortable()->label('Grupo de Ascenso'),
                    BadgeColumn::make('convocatoriaEstados')
                        ->toggleable(true)->searchable(isIndividual: true)->label('Convocatorias')
                        ->getStateUsing(fn ($record) => $record->convocatoriaEstados->pluck('cest_descripcion')->toArray()),
                    TextColumn::make('requisitoDocumentoDetalle.rasc_ascenso_descripcion')->label('Postulacion')
                        ->toggleable(true)->searchable(isIndividual: true)
                        ->sortable(),
                    TextColumn::make('pasc_nota_ascenso')->toggleable(true)->searchable(isIndividual: true)->sortable()->label('Nota de Ascenso')->alignCenter(),

                ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
