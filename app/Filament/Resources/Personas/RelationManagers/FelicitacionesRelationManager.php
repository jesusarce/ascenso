<?php

namespace App\Filament\Resources\Personas\RelationManagers;

use Filament\Actions\ActionGroup;
use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\RecordActionsPosition;
use Filament\Tables\Table;

class FelicitacionesRelationManager extends RelationManager {
    protected static string $relationship = 'felicitaciones';

    public function form(Schema $schema): Schema {
        return $schema
            ->components([
                TextInput::make('persona_id')->label('persona_id'),
                TextInput::make('concepto_id')->label('concepto_id'),
                TextInput::make('conc_cod')->label('conc_cod'),
                TextInput::make('concepto')->label('concepto'),
                DatePicker::make('fecha')->label('fecha')->native(false)->firstDayOfWeek(7)->locale('es'),
                TextInput::make('grado_g1')->label('grado_g1'),
                TextInput::make('grado_codigo_g1')->label('grado_codigo_g1'),
                TextInput::make('grado_descripcion_g1')->label('grado_descripcion_g1'),
                TextInput::make('motivo_g3')->label('motivo_g3'),
                TextInput::make('motivo_codigo_g3')->label('motivo_codigo_g3'),
                TextInput::make('motivo_descripcion_g3')->label('motivo_descripcion_g3'),
                TextInput::make('documento_g2')->label('documento_g2'),
                TextInput::make('documento_codigo_g2')->label('documento_codigo_g2'),
                TextInput::make('documento_descripcion_g2')->label('documento_descripcion_g2'),
                TextInput::make('causa_g4')->label('causa_g4'),
                TextInput::make('causa_codigo_g4')->label('causa_codigo_g4'),
                TextInput::make('causa_descripcion_g4')->label('causa_descripcion_g4'),
                TextInput::make('nro')->label('nro'),
                TextInput::make('otorgado_g5')->label('otorgado_g5'),
                TextInput::make('otorgado_codigo_g5')->label('otorgado_codigo_g5'),
                TextInput::make('otorgado_descripcion_g5')->label('otorgado_descripcion_g5'),
                TextInput::make('cargo_g6')->label('cargo_g6'),
                TextInput::make('cargo_codigo_g6')->label('cargo_codigo_g6'),
                TextInput::make('cargo_descripcion_g6')->label('cargo_descripcion_g6'),
                TextInput::make('respaldo_g7')->label('respaldo_g7'),
            ]);
    }

    public function table(Table $table): Table {
        return $table
            ->recordTitleAttribute('Felicitaciones')
            ->columns([
                TextColumn::make('persona_id')->searchable(isIndividual: true)->sortable()->label('persona_id')->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('concepto_id')->searchable(isIndividual: true)->sortable()->label('concepto_id')->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('conc_cod')->searchable(isIndividual: true)->sortable()->label('conc_cod')->toggleable(),
                TextColumn::make('concepto')->searchable(isIndividual: true)->sortable()->label('concepto')->toggleable(),
                TextColumn::make('fecha')->searchable(isIndividual: true)->sortable()->label('fecha')->date('l, d F Y')->toggleable(),
                TextColumn::make('grado_g1')->searchable(isIndividual: true)->sortable()->label('grado_g1')->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('grado_codigo_g1')->searchable(isIndividual: true)->sortable()->label('grado_codigo_g1')->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('grado_descripcion_g1')->searchable(isIndividual: true)->sortable()->label('grado_descripcion_g1')->toggleable(),
                TextColumn::make('motivo_g3')->searchable(isIndividual: true)->sortable()->label('motivo_g3')->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('motivo_codigo_g3')->searchable(isIndividual: true)->sortable()->label('motivo_codigo_g3')->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('motivo_descripcion_g3')->searchable(isIndividual: true)->sortable()->label('motivo_descripcion_g3')->toggleable(),
                TextColumn::make('documento_g2')->searchable(isIndividual: true)->sortable()->label('documento_g2')->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('documento_codigo_g2')->searchable(isIndividual: true)->sortable()->label('documento_codigo_g2')->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('documento_descripcion_g2')->searchable(isIndividual: true)->sortable()->label('documento_descripcion_g2')->toggleable(),
                TextColumn::make('causa_g4')->searchable(isIndividual: true)->sortable()->label('causa_g4')->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('causa_codigo_g4')->searchable(isIndividual: true)->sortable()->label('causa_codigo_g4')->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('causa_descripcion_g4')->searchable(isIndividual: true)->sortable()->label('causa_descripcion_g4')->toggleable(),
                TextColumn::make('nro')->searchable(isIndividual: true)->sortable()->label('nro')->toggleable(),
                TextColumn::make('otorgado_g5')->searchable(isIndividual: true)->sortable()->label('otorgado_g5')->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('otorgado_codigo_g5')->searchable(isIndividual: true)->sortable()->label('otorgado_codigo_g5')->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('otorgado_descripcion_g5')->searchable(isIndividual: true)->sortable()->label('otorgado_descripcion_g5')->toggleable(),
                TextColumn::make('cargo_g6')->searchable(isIndividual: true)->sortable()->label('cargo_g6')->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('cargo_codigo_g6')->searchable(isIndividual: true)->sortable()->label('cargo_codigo_g6')->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('cargo_descripcion_g6')->searchable(isIndividual: true)->sortable()->label('cargo_descripcion_g6')->toggleable(),
                TextColumn::make('respaldo_g7')->searchable(isIndividual: true)->sortable()->label('respaldo_g7')->toggleable(),
                TextColumn::make('puntos')->searchable(isIndividual: true)->sortable()->label('puntos')->toggleable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make(),
                AssociateAction::make(),
            ])
            ->recordActions([
                ActionGroup::make([
                    EditAction::make(),
                    // DissociateAction::make(),
                    DeleteAction::make(),
                ])
            ])->actionsPosition(RecordActionsPosition::BeforeCells) // Muestra el menú al inicio de cada fila
            ->toolbarActions([
                BulkActionGroup::make([
                    DissociateBulkAction::make(),
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
