<?php

namespace App\Filament\Resources\RequisitoAscensos;

use App\Filament\Resources\RequisitoAscensos\Pages\CreateRequisitoAscenso;
use App\Filament\Resources\RequisitoAscensos\Pages\EditRequisitoAscenso;
use App\Filament\Resources\RequisitoAscensos\Pages\ListRequisitoAscensos;
use App\Filament\Resources\RequisitoAscensos\RelationManagers\RequisitoDocumentoRelationManager;
use App\Filament\Resources\RequisitoAscensos\RelationManagers\RequisitoDocumentosRelationManager;
use App\Filament\Resources\RequisitoAscensos\Schemas\RequisitoAscensoForm;
use App\Filament\Resources\RequisitoAscensos\Tables\RequisitoAscensosTable;
use App\Models\RequisitoAscenso;
use App\Models\RequisitoDocumento;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class RequisitoAscensoResource extends Resource {

    protected static ?string $model = RequisitoAscenso::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClipboardDocumentCheck;

    protected static ?string $recordTitleAttribute = 'RequisitoAscenso';

    protected static ?string $navigationLabel = 'Requisitos de Ascenso';
    protected static ?string $pluralModelLabel = 'Requisitos de Ascenso';
    protected static ?int $navigationSort = 1;
    protected static string|\UnitEnum|null $navigationGroup = 'Parametros de Ascenso';
    /**
     * Must match the type declared in Filament\Resources\Resource
     * (Illuminate\Contracts\Support\Htmlable|string|null).
     */
    protected static \Illuminate\Contracts\Support\Htmlable|string|null $navigationBadgeTooltip = 'Numero de requisitos para ascenso.';

    public static function getNavigationBadge(): ?string {
        return static::getModel()::count();
    }

    public static function form(Schema $schema): Schema {
        return RequisitoAscensoForm::configure($schema);
    }

    public static function table(Table $table): Table {
        return RequisitoAscensosTable::configure($table);
    }

    public static function getRelations(): array {
        return [
            RequisitoDocumentosRelationManager::class,
        ];
    }

    public static function getPages(): array {
        return [
            'index' => ListRequisitoAscensos::route('/'),
            'create' => CreateRequisitoAscenso::route('/create'),
            'edit' => EditRequisitoAscenso::route('/{record}/edit'),
        ];
    }
}
