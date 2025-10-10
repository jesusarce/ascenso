<?php

namespace App\Filament\Resources\PersonaSituacions;

use App\Filament\Resources\PersonaSituacions\Pages\CreatePersonaSituacion;
use App\Filament\Resources\PersonaSituacions\Pages\EditPersonaSituacion;
use App\Filament\Resources\PersonaSituacions\Pages\ListPersonaSituacions;
use App\Filament\Resources\PersonaSituacions\Schemas\PersonaSituacionForm;
use App\Filament\Resources\PersonaSituacions\Tables\PersonaSituacionsTable;
use App\Models\PersonaSituacion;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PersonaSituacionResource extends Resource {

    protected static ?string $model = PersonaSituacion::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUser;

    protected static ?string $recordTitleAttribute = 'Persona';

    protected static ?string $navigationLabel = 'Situaciones de Persona';
    
    protected static ?string $pluralModelLabel = 'Situaciones de Persona';

    public static function form(Schema $schema): Schema {
        return PersonaSituacionForm::configure($schema);
    }

    public static function table(Table $table): Table {
        return PersonaSituacionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPersonaSituacions::route('/'),
            'create' => CreatePersonaSituacion::route('/create'),
            'edit' => EditPersonaSituacion::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
