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
use Filament\Tables\Table;
use Filament\Tables\Enums\RecordActionsPosition;

class CargoDestinosRelationManager extends RelationManager {

    protected static string $relationship = 'cargoDestinos';
    protected static ?string $recordTitleAttribute = 'persona_id';

    public function form(Schema $schema): Schema {
        return $schema
            ->components([
                TextInput::make('persona_id')->label('Persona'),
                TextInput::make('concepto_id')->label('Concepto_id'),
                TextInput::make('conc_cod')->label('Concepto Cod'),
                TextInput::make('concepto')->label('Concepto'),
                DatePicker::make('desde')->label('Desde')->native(false)->firstDayOfWeek(7)->locale('es'),//->helperText(fn ($state) => optional($state)->translatedFormat('l, d F Y')),
                DatePicker::make('hasta')->label('Hasta')->native(false)->firstDayOfWeek(7)->locale('es'),//->helperText(fn ($state) => optional($state)->translatedFormat('l, d F Y')),
                TextInput::make('grado')->label('Grado'),
                TextInput::make('grado_codigo')->label('Grado Codigo'),
                TextInput::make('grado_descripcion')->label('Grado Descripcion'),
                TextInput::make('unidad')->label('Unidad'),
                TextInput::make('unidad_codigo')->label('Unidad Codigo'),
                TextInput::make('unidad_descripcion')->label('Unidad Descripcion'),
                TextInput::make('cargo')->label('Cargo'),
                TextInput::make('cargo_codigo')->label('Cargo Codigo'),
                TextInput::make('cargo_descripcion')->label('Cargo Descripcion'),
                TextInput::make('pdd')->label('PDD'),
                TextInput::make('pcc')->label('PCC'),
            ]);
    }

    public function table(Table $table): Table {
        return $table
            ->recordTitleAttribute('persona_id')
            ->columns([
                TextColumn::make('persona_id')->sortable()->searchable(isIndividual: true)->label('Persona')->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('concepto_id')->sortable()->searchable(isIndividual: true)->label('Concepto_id')->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('conc_cod')->sortable()->searchable(isIndividual: true)->label('Concepto Cod')->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('concepto')->sortable()->searchable(isIndividual: true)->label('Concepto')->toggleable(),
                TextColumn::make('desde')->sortable()->searchable(isIndividual: true)->label('Desde')->date('l, d F Y')->toggleable(),
                TextColumn::make('hasta')->sortable()->searchable(isIndividual: true)->label('Hasta')->date('l, d F Y')->toggleable(),
                TextColumn::make('grado')->sortable()->searchable(isIndividual: true)->label('Grado')->toggleable(),
                TextColumn::make('grado_codigo')->sortable()->searchable(isIndividual: true)->label('Grado Codigo')->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('grado_descripcion')->sortable()->searchable(isIndividual: true)->label('Grado Descripcion')->toggleable(),
                TextColumn::make('unidad')->sortable()->searchable(isIndividual: true)->label('Unidad')->toggleable(),
                TextColumn::make('unidad_codigo')->sortable()->searchable(isIndividual: true)->label('Unidad Codigo')->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('unidad_descripcion')->sortable()->searchable(isIndividual: true)->label('Unidad Descripcion')->toggleable(),
                TextColumn::make('cargo')->sortable()->searchable(isIndividual: true)->label('Cargo')->toggleable(),
                TextColumn::make('cargo_codigo')->sortable()->searchable(isIndividual: true)->label('Cargo Codigo')->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('cargo_descripcion')->sortable()->searchable(isIndividual: true)->label('Cargo Descripcion')->toggleable(),
                TextColumn::make('pcc')->sortable()->searchable(isIndividual: true)->label('PDD')->toggleable(),
                TextColumn::make('pdd')->sortable()->searchable(isIndividual: true)->label('PCC')->toggleable(),
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
