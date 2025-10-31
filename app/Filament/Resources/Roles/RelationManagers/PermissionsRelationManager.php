<?php

namespace App\Filament\Resources\Roles\RelationManagers;

use Filament\Actions\ActionGroup;
use Filament\Actions\AssociateAction;
use Filament\Actions\AttachAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\TextColumn;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Select;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Log;

class PermissionsRelationManager extends RelationManager {

    protected static string $relationship = 'permissions';

    protected static ?string $recordTitleAttribute = 'name';

    public function form(Schema $schema): Schema
    {
        return $schema->components([
            CheckboxList::make('permissions')
                ->relationship('permissions', 'name')
                ->columns(2),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('guard_name')->label('Guard')->sortable(),
            ])
            ->headerActions([
                AttachAction::make()
                    ->preloadRecordSelect(true)
                    ->recordSelect(fn (Select $select) => $select
                        ->options(function () {
                            $owner = $this->getOwnerRecord();

                            $ownerGuard = $owner?->guard_name ?? 'web';

                            $assigned = [];
                            try {
                                $assigned = $owner->permissions()->pluck('id')->toArray();
                            } catch (\Throwable $e) {
                                // ignore
                            }

                            return Permission::where('guard_name', $ownerGuard)
                                ->when(count($assigned) > 0, fn($q) => $q->whereNotIn('id', $assigned))
                                ->orderBy('name')
                                ->pluck('name', 'id')
                                ->all();
                        })
                        ->searchable()
                        ->getOptionLabelUsing(function ($value) {
                            $p = Permission::find($value);
                            // Show permission name and guard separated by ' - '
                            return $p ? "{$p->name} - {$p->guard_name}" : (string) $value;
                        })
                    )
            ])
            ->recordActions([
                ActionGroup::make([
                    DissociateAction::make(),
                ])
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DissociateBulkAction::make(),
                ]),
            ]);
    }
}
