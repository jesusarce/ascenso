<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

class UserForm {
    
    public static function configure(Schema $schema): Schema {
        return $schema
            ->components([
                TextInput::make('name'),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                DateTimePicker::make('email_verified_at'),
                TextInput::make('password')
                    ->label('Contraseña')
                    ->password()
                    ->hint('Dejar en blanco para mantener la contraseña actual')
                    // requerido solo en creación
                    ->required(fn ($context) => $context === 'create')
                    // sólo enviar al modelo si se ingresó algo
                    ->dehydrated(fn ($state) => filled($state))
                    // hashear antes de guardar (si tu modelo NO tiene mutator setPasswordAttribute)
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state)),
                ]);
    }
}
