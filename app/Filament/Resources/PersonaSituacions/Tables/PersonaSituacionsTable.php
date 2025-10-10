<?php

namespace App\Filament\Resources\PersonaSituacions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class PersonaSituacionsTable {

    public static function configure(Table $table): Table {
        return $table
            ->columns([
                TextColumn::make('pers_codper')->sortable()->searchable(isIndividual: true)->label('Codigo')->wrap()->toggleable(isToggledHiddenByDefault:true)->alignCenter(),
                TextColumn::make('pers_folder')->sortable()->searchable(isIndividual: true)->label('Folder')->wrap()->toggleable(isToggledHiddenByDefault:true)->alignCenter(),
                TextColumn::make('pers_codigo_mininsterio')->sortable()->searchable(isIndividual: true)->label('Cod. Mininsterio')->wrap()->toggleable(isToggledHiddenByDefault:true)->alignCenter(),
                TextColumn::make('pers_cua')->sortable()->searchable(isIndividual: true)->label('CUA')->wrap()->toggleable(isToggledHiddenByDefault:true)->alignCenter(),
                TextColumn::make('pers_cta_banco')->sortable()->searchable(isIndividual: true)->label('Cta. Banco')->wrap()->toggleable(isToggledHiddenByDefault:true)->alignCenter(),
                TextColumn::make('grad_descripcion')->sortable()->searchable(isIndividual: true)->label('Grado')->wrap()->toggleable(),
                TextColumn::make('pers_apellido_paterno')->sortable()->searchable(isIndividual: true)->label('Paterno')->wrap()->toggleable(),
                TextColumn::make('pers_apellido_materno')->sortable()->searchable(isIndividual: true)->label('Materno')->wrap()->toggleable(),
                TextColumn::make('pers_nombres')->sortable()->searchable(isIndividual: true)->label('Nombres')->wrap()->toggleable(),
                TextColumn::make('pers_estado_civil')->sortable()->searchable(isIndividual: true)->label('Estado Civil')->wrap()->toggleable(isToggledHiddenByDefault:true)->alignCenter(),
                TextColumn::make('pers_sexo')->sortable()->searchable(isIndividual: true)->label('Sexo')->wrap()->toggleable()->alignCenter(),
                TextColumn::make('tipoSangre.tsan_descripcion')->sortable()->searchable(isIndividual: true)->label('Tipo Sangre')->wrap()->toggleable()->alignCenter(),
                TextColumn::make('pers_fecha_nacimiento')->sortable()->searchable(isIndividual: true)->label('Fecha Nacimiento')->wrap()->toggleable()->alignCenter()
                    ->date('d/m/Y')
                    ->sortable()
                    ->toggleable()
                    ->placeholder('Sin fecha'),
                // Tables\Columns\TextColumn::make('pers_fecha_nacimiento')->sortable()->label('Edad')->wrap()->toggleable()->alignCenter()
                //     ->getStateUsing(function ($record) {
                //         return $record->pers_fecha_nacimiento 
                //             ? \Carbon\Carbon::parse($record->pers_fecha_nacimiento)->age . ' años'
                //             : 'N/A';
                //     })
                //     ->sortable(false),
                TextColumn::make('pers_ci')->sortable()->searchable(isIndividual: true)->label('CI')->alignCenter()->toggleable(),
                TextColumn::make('pers_ci_complemento')->sortable()->searchable(isIndividual: true)->label('Complemento')->toggleable()->alignCenter(),
                TextColumn::make('pers_expedido')->sortable()->searchable(isIndividual: true)->label('Expedido')->toggleable(isToggledHiddenByDefault:true)->alignCenter(),
                TextColumn::make('pers_carnet_militar')->sortable()->searchable(isIndividual: true)->label('Cnt. Militar')->toggleable(isToggledHiddenByDefault:true)->alignCenter(),
                TextColumn::make('pers_carnet_cosmil')->sortable()->searchable(isIndividual: true)->label('Cnt. Cosmil')->toggleable(isToggledHiddenByDefault:true)->alignCenter(),
            ])
            ->filters([
                Filter::make('pers_codper')->label('Codigo'),
                Filter::make('pers_folder')->label('Folder'),
                Filter::make('pers_codigo_mininsterio')->label('Cod. Mininsterio'),
                Filter::make('pers_cua')->label('CUA'),
                Filter::make('pers_cta_banco')->label('Cta. Banco'),
                Filter::make('grad_descripcion')->label('Grado'),
                Filter::make('pers_apellido_paterno')->label('Paterno'),
                Filter::make('pers_apellido_materno')->label('Materno'),
                Filter::make('pers_nombres')->label('Nombres'),
                Filter::make('pers_estado_civil')->label('Estado Civil'),
                Filter::make('pers_sexo')->label('Sexo'),
                Filter::make('sangre')->label('Tipo Sangre'),
                Filter::make('pers_fecha_nacimiento')->label('Fecha Nacimiento'),
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
