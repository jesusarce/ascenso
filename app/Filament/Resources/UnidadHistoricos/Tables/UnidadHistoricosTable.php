<?php

namespace App\Filament\Resources\UnidadHistoricos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class UnidadHistoricosTable {

    public static function configure(Table $table): Table {
        return $table
            ->defaultSort('unih_gestion', 'desc')
            ->columns([
                TextColumn::make('unidad_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('unih_coduni')
                    ->searchable(),
                TextColumn::make('unih_descripcion')
                    ->searchable(),
                TextColumn::make('unih_tipo')
                    ->searchable(),
                TextColumn::make('unih_puntaje')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('unih_puntajeadd')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('unih_gestion')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('uhis_estado')
                    ->searchable(),
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
                \Filament\Actions\Action::make('clonarGestion')
                    ->label('Clonar última gestión')
                    ->icon('heroicon-m-document-duplicate')
                    ->form([
                        \Filament\Forms\Components\TextInput::make('nueva_gestion')
                            ->label('Nueva gestión')
                            ->required(),
                    ])
                    ->action(function (array $data) {
                        $ultima_gestion = \App\Models\UnidadHistorico::query()
                            ->orderByDesc('unih_gestion')
                            ->value('unih_gestion');
                        if (!$ultima_gestion) {
                            \Filament\Notifications\Notification::make()
                                ->title('No hay registros para clonar')
                                ->danger()
                                ->send();
                            return;
                        }
                        $registros = \App\Models\UnidadHistorico::withTrashed()
                            ->where('unih_gestion', $ultima_gestion)
                            ->get();
                        if ($registros->isEmpty()) {
                            \Filament\Notifications\Notification::make()
                                ->title('No hay registros para clonar')
                                ->danger()
                                ->send();
                            return;
                        }
                        $clonados = 0;
                        foreach ($registros as $registro) {
                            $existe = \App\Models\UnidadHistorico::withTrashed()
                                ->where('unidad_id', $registro->unidad_id)
                                ->where('unih_gestion', $data['nueva_gestion'])
                                ->first();
                            if ($existe) {
                                if ($existe->trashed()) {
                                    $existe->restore();
                                    $clonados++;
                                }
                                // Si existe y no está borrado, no se clona ni restaura
                                continue;
                            }
                            $nuevo = $registro->replicate();
                            $nuevo->unih_gestion = $data['nueva_gestion'];
                            $nuevo->save();
                            $clonados++;
                        }
                        if ($clonados > 0) {
                            \Filament\Notifications\Notification::make()
                                ->title("Se clonaron/restauraron $clonados registros para la gestión {$data['nueva_gestion']}")
                                ->success()
                                ->send();
                        } else {
                            \Filament\Notifications\Notification::make()
                                ->title('No se clonó ningún registro porque ya existen activos para esa gestión')
                                ->warning()
                                ->send();
                        }
                    }),
                    \Filament\Actions\Action::make('borrarGestion')
                        ->label('Borrar gestión')
                        ->icon('heroicon-m-trash')
                        ->color('danger')
                        ->form([
                            \Filament\Forms\Components\TextInput::make('gestion_borrar')
                                ->label('Gestión a borrar')
                                ->required(),
                        ])
                        ->action(function (array $data) {
                            $registros = \App\Models\UnidadHistorico::where('unih_gestion', $data['gestion_borrar'])->get();
                            if ($registros->isEmpty()) {
                                \Filament\Notifications\Notification::make()
                                    ->title('No hay registros para esa gestión')
                                    ->warning()
                                    ->send();
                                return;
                            }
                            $borrados = 0;
                            foreach ($registros as $registro) {
                                $registro->delete();
                                $borrados++;
                            }
                            \Filament\Notifications\Notification::make()
                                ->title("Se borraron $borrados registros de la gestión {$data['gestion_borrar']}")
                                ->success()
                                ->send();
                        }),
            ]);
    }
}
