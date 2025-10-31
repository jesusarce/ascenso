<?php
namespace App\Filament\Resources\Users\RelationManagers;

use Filament\Actions\ActionGroup;
use Filament\Actions\AttachAction;
use Filament\Actions\Action;
use App\Filament\Resources\Roles\RoleResource;
use Filament\Forms\Components\Select;
use Spatie\Permission\Models\Role as SpatieRole;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\TextColumn;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Forms\Components\CheckboxList;

class RolesRelationManager extends RelationManager
{
    protected static string $relationship = 'roles';

    protected static ?string $recordTitleAttribute = 'name';

    public function form(Schema $schema): Schema
    {
        return $schema->components([
            CheckboxList::make('roles')
                ->relationship('roles', 'name')
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
                Action::make('viewRoles')
                    ->label('Ver roles')
                    ->url(RoleResource::getUrl('index'))
                    ->icon('heroicon-o-eye'),
                AttachAction::make()->label('Asignar rol')
                    ->preloadRecordSelect(true)
                    ->recordSelectSearchColumns(['name'])
                    ->recordSelect(fn (Select $select) => $select
                        ->searchable()
                        ->getOptionLabelUsing(function ($value) {
                            $r = SpatieRole::find($value);
                            // Show role name and guard separated by ' - ' for clarity in the selector
                            return $r ? "{$r->name} - {$r->guard_name}" : (string) $value;
                        })
                    ),
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
