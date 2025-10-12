<?php

namespace App\Filament\Resources\Personas\RelationManagers;

use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\RecordActionsPosition;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DisciplinaDemeritosRelationManager extends RelationManager {
    
    protected static string $relationship = 'disciplinaDemeritos';

    public function form(Schema $schema): Schema {
        return $schema
            ->components([
                TextInput::make('concepto_id')->label('concepto_id'),
                TextInput::make('conc_cod')->label('conc_cod'),
                TextInput::make('concepto')->label('concepto'),
                DatePicker::make('fecha_f1')->label('fecha_f1')->native(false)->firstDayOfWeek(7)->locale('es'),
                TextInput::make('grado_g1')->label('grado_g1'),
                TextInput::make('grado_codigo_g1')->label('grado_codigo_g1'),
                TextInput::make('grado_descripcion_g1')->label('grado_descripcion_g1'),
                TextInput::make('detalle_sancion_g3')->label('detalle_sancion_g3'),
                TextInput::make('detalle_sancion_codigo_g3')->label('detalle_sancion_codigo_g3'),
                TextInput::make('detalle_sancion_descripcion_g3')->label('detalle_sancion_descripcion_g3'),
                TextInput::make('puntos')->label('puntos'),
                TextInput::make('documento_g2')->label('documento_g2'),
                TextInput::make('documento_codigo_g2')->label('documento_codigo_g2'),
                TextInput::make('documento_descripcion_g2')->label('documento_descripcion_g2'),
                TextInput::make('motivo_g4')->label('motivo_g4'),
                TextInput::make('motivo_codigo_g4')->label('motivo_codigo_g4'),
                TextInput::make('motivo_descripcion_g4')->label('motivo_descripcion_g4'),
                TextInput::make('cargo_sancionador_g5')->label('cargo_sancionador_g5'),
                TextInput::make('cargo_sancionador_codigo_g5')->label('cargo_sancionador_codigo_g5'),
                TextInput::make('cargo_sancionador_descripcion_g5')->label('cargo_sancionador_descripcion_g5'),
                TextInput::make('cargo_sancionado_g6')->label('cargo_sancionado_g6'),
                TextInput::make('cargo_sancionado_codigo_g6')->label('cargo_sancionado_codigo_g6'),
                TextInput::make('cargo_sancionado_descripcion_g6')->label('cargo_sancionado_descripcion_g6'),
                TextInput::make('respaldo_g7')->label('respaldo_g7'),
            ]);
    }

    public function infolist(Schema $schema): Schema {
        return $schema
            ->components([
                TextEntry::make('Disciplina Demeritos'),
            ]);
    }

    public function table(Table $table): Table {
        return $table
            ->recordTitleAttribute('Disciplina Demeritos')
            ->columns([
                TextColumn::make('persona_id')->searchable(isIndividual: true)->sortable()->label('persona_id')->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('concepto_id')->searchable(isIndividual: true)->sortable()->label('concepto_id')->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('conc_cod')->searchable(isIndividual: true)->sortable()->label('conc_cod')->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('concepto')->searchable(isIndividual: true)->sortable()->label('concepto')->toggleable(),
                TextColumn::make('fecha_f1')->searchable(isIndividual: true)->sortable()->label('fecha_f1')->date('l, d F Y')->toggleable(),
                TextColumn::make('grado_g1')->searchable(isIndividual: true)->sortable()->label('grado_g1')->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('grado_codigo_g1')->searchable(isIndividual: true)->sortable()->label('grado_codigo_g1')->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('grado_descripcion_g1')->searchable(isIndividual: true)->sortable()->label('grado_descripcion_g1')->toggleable(),
                TextColumn::make('detalle_sancion_g3')->searchable(isIndividual: true)->sortable()->label('detalle_sancion_g3')->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('detalle_sancion_codigo_g3')->searchable(isIndividual: true)->sortable()->label('detalle_sancion_codigo_g3')->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('detalle_sancion_descripcion_g3')->searchable(isIndividual: true)->sortable()->label('detalle_sancion_descripcion_g3')->toggleable(),
                TextColumn::make('puntos')->searchable(isIndividual: true)->sortable()->label('puntos')->toggleable(),
                TextColumn::make('documento_g2')->searchable(isIndividual: true)->sortable()->label('documento_g2')->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('documento_codigo_g2')->searchable(isIndividual: true)->sortable()->label('documento_codigo_g2')->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('documento_descripcion_g2')->searchable(isIndividual: true)->sortable()->label('documento_descripcion_g2')->toggleable(),
                TextColumn::make('motivo_g4')->searchable(isIndividual: true)->sortable()->label('motivo_g4')->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('motivo_codigo_g4')->searchable(isIndividual: true)->sortable()->label('motivo_codigo_g4')->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('motivo_descripcion_g4')->searchable(isIndividual: true)->sortable()->label('motivo_descripcion_g4')->toggleable(),
                TextColumn::make('cargo_sancionador_g5')->searchable(isIndividual: true)->sortable()->label('cargo_sancionador_g5')->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('cargo_sancionador_codigo_g5')->searchable(isIndividual: true)->sortable()->label('cargo_sancionador_codigo_g5')->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('cargo_sancionador_descripcion_g5')->searchable(isIndividual: true)->sortable()->label('cargo_sancionador_descripcion_g5')->toggleable(),
                TextColumn::make('cargo_sancionado_g6')->searchable(isIndividual: true)->sortable()->label('cargo_sancionado_g6')->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('cargo_sancionado_codigo_g6')->searchable(isIndividual: true)->sortable()->label('cargo_sancionado_codigo_g6')->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('cargo_sancionado_descripcion_g6')->searchable(isIndividual: true)->sortable()->label('cargo_sancionado_descripcion_g6')->toggleable(),
                TextColumn::make('respaldo_g7')->searchable(isIndividual: true)->sortable()->label('respaldo_g7')->toggleable(),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->headerActions([
                CreateAction::make(),
            ])
            ->recordActions([
                ActionGroup::make([
                    // ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                    // ForceDeleteAction::make(),
                    // RestoreAction::make(),
                ])
            ])->actionsPosition(RecordActionsPosition::BeforeCells) // Muestra el menú al inicio de cada fila
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ])
            ->modifyQueryUsing(fn (Builder $query) => $query
                ->withoutGlobalScopes([
                    SoftDeletingScope::class,
                ]));
    }
}
