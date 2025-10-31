<?php

namespace App\Filament\Resources\Permissions\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Validation\Rule;

class PermissionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nombre (interno)')
                    ->required()
                    ->maxLength(255)
                    ->helperText('Ej: users.create (minúsculas, sin espacios)')
                    ->rules([
                        'required',
                        'string',
                        'max:255',
                        Rule::unique('permissions', 'name')->where(fn ($q) => $q->where('guard_name', request()->input('guard_name', 'web')))
                    ]),

                Select::make('guard_name')
                    ->label('Guard')
                    ->options(['web' => 'web', 'api' => 'api'])
                    ->default('web')
                    ->required(),
            ]);
    }
}
