<?php

namespace App\Filament\Resources\Personas\RelationManagers;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FojaConceptosRelationManager extends RelationManager {

    protected static string $relationship = 'fojaConceptos';

    public function form(Schema $schema): Schema {
        return $schema
            ->components([
                TextInput::make('concepto_id')->label('concepto_id'),
                TextInput::make('conc_cod')->label('conc_cod'),
                TextInput::make('concepto')->label('concepto'),
                DatePicker::make('fecha')->label('fecha')->native(false)->firstDayOfWeek(7)->locale('es'),
                TextInput::make('grado_g1')->label('grado_g1'),
                TextInput::make('grado_codigo_g1')->label('grado_codigo_g1'),
                TextInput::make('grado_descripcion_g1')->label('grado_descripcion_g1'),
                TextInput::make('foja_concepto_g2')->label('foja_concepto_g2'),
                TextInput::make('foja_concepto_codigo_g2')->label('foja_concepto_codigo_g2'),
                TextInput::make('foja_concepto_descripcion_g2')->label('foja_concepto_descripcion_g2'),
                TextInput::make('otorgado_g3')->label('otorgado_g3'),
                TextInput::make('otorgado_codigo_g3')->label('otorgado_codigo_g3'),
                TextInput::make('otorgado_descripcion_g3')->label('otorgado_descripcion_g3'),
                TextInput::make('cargo_g4')->label('cargo_g4'),
                TextInput::make('cargo_codigo_g4')->label('cargo_codigo_g4'),
                TextInput::make('cargo_descripcion_g4')->label('cargo_descripcion_g4'),
                TextInput::make('respaldo_g7')->label('respaldo_g7'),
                TextInput::make('promedio')->label('promedio'),
            ]);
    }

    public function table(Table $table): Table {
        return $table
            ->recordTitleAttribute('Foja Conceptos')
            ->columns([
                TextColumn::make('persona_id')->sortable()->searchable(isIndividual: true)->label('persona_id')->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('concepto_id')->sortable()->searchable(isIndividual: true)->label('concepto_id')->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('conc_cod')->sortable()->searchable(isIndividual: true)->label('conc_cod')->toggleable(),
                TextColumn::make('concepto')->sortable()->searchable(isIndividual: true)->label('concepto')->toggleable(),
                TextColumn::make('fecha')->sortable()->searchable(isIndividual: true)->label('fecha')->date('l, d F Y')->toggleable(),
                TextColumn::make('grado_g1')->sortable()->searchable(isIndividual: true)->label('grado_g1')->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('grado_codigo_g1')->sortable()->searchable(isIndividual: true)->label('grado_codigo_g1')->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('grado_descripcion_g1')->sortable()->searchable(isIndividual: true)->label('grado_descripcion_g1')->toggleable(),
                TextColumn::make('foja_concepto_g2')->sortable()->searchable(isIndividual: true)->label('foja_concepto_g2')->wrap()->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('foja_concepto_codigo_g2')->sortable()->searchable(isIndividual: true)->label('foja_concepto_codigo_g2')->wrap()->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('foja_concepto_descripcion_g2')->sortable()->searchable(isIndividual: true)->label('foja_concepto_descripcion_g2')->wrap()->toggleable(),
                TextColumn::make('otorgado_g3')->sortable()->searchable(isIndividual: true)->label('otorgado_g3')->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('otorgado_codigo_g3')->sortable()->searchable(isIndividual: true)->label('otorgado_codigo_g3')->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('otorgado_descripcion_g3')->sortable()->searchable(isIndividual: true)->label('otorgado_descripcion_g3')->toggleable(),
                TextColumn::make('cargo_g4')->sortable()->searchable(isIndividual: true)->label('cargo_g4')->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('cargo_codigo_g4')->sortable()->searchable(isIndividual: true)->label('cargo_codigo_g4')->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('cargo_descripcion_g4')->sortable()->searchable(isIndividual: true)->label('cargo_descripcion_g4')->toggleable(),
                TextColumn::make('respaldo_g7')->sortable()->searchable(isIndividual: true)->label('respaldo_g7')->toggleable(),
                TextColumn::make('promedio')->sortable()->searchable(isIndividual: true)->label('promedio')->toggleable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
