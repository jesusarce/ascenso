<?php

namespace App\Filament\Resources\Roles\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\CheckboxList;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Permission\Models\Permission;
use Filament\Schemas\Schema;

class RoleForm {
    public static function configure(Schema $schema): Schema {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nombre')
                    ->required()
                    ->maxLength(255),
                Select::make('guard_name')
                    ->label('Guard')
                    ->options([
                        'web' => 'web',
                        'api' => 'api',
                    ])
                    ->default('web')
                    ->required()
                    ->columns(2)
                    ->searchable(),
            ]);
    }
}
