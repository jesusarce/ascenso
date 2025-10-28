<?php

namespace App\Filament\Resources\PersonaAscensos;

use App\Filament\Resources\PersonaAscensos\Pages\CreatePersonaAscenso;
use App\Filament\Resources\PersonaAscensos\Pages\EditPersonaAscenso;
use App\Filament\Resources\PersonaAscensos\Pages\ListPersonaAscensos;
use App\Filament\Resources\PersonaAscensos\Pages\ViewPersonaAscenso;
use App\Filament\Resources\PersonaAscensos\RelationManagers\RequisitoDocumentoPersonaAscensosRelationManager;
use App\Filament\Resources\PersonaAscensos\Schemas\PersonaAscensoForm;
use App\Filament\Resources\PersonaAscensos\Schemas\PersonaAscensoInfolist;
use App\Filament\Resources\PersonaAscensos\Tables\PersonaAscensosTable;
use App\Models\PersonaAscenso;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PersonaAscensoResource extends Resource {

    protected static ?string $model = PersonaAscenso::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::UserGroup;

    protected static ?string $recordTitleAttribute = 'PersonaAscenso';

    protected static ?string $navigationLabel = 'Convocados a Ascenso';
    
    protected static ?string $pluralModelLabel = 'Convocados a Ascenso';    

    protected static string|\UnitEnum|null $navigationGroup = 'Ascensos';

    protected static ?int $navigationSort = 2;

    public static function getNavigationBadge(): ?string {
        return static::getModel()::count();
    }
    
    public static function form(Schema $schema): Schema
    {
        return PersonaAscensoForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PersonaAscensoInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PersonaAscensosTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            RequisitoDocumentoPersonaAscensosRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPersonaAscensos::route('/'),
            'create' => CreatePersonaAscenso::route('/create'),
            // 'view' => ViewPersonaAscenso::route('/{record}'),
            'edit' => EditPersonaAscenso::route('/{record}/edit'),
        ];
    }
}
