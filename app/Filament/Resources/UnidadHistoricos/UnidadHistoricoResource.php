<?php

namespace App\Filament\Resources\UnidadHistoricos;

use App\Filament\Resources\UnidadHistoricos\Pages\CreateUnidadHistorico;
use App\Filament\Resources\UnidadHistoricos\Pages\EditUnidadHistorico;
use App\Filament\Resources\UnidadHistoricos\Pages\ListUnidadHistoricos;
use App\Filament\Resources\UnidadHistoricos\Schemas\UnidadHistoricoForm;
use App\Filament\Resources\UnidadHistoricos\Tables\UnidadHistoricosTable;
use App\Models\UnidadHistorico;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UnidadHistoricoResource extends Resource {
    
    protected static ?string $model = UnidadHistorico::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingOffice2;

    protected static ?string $recordTitleAttribute = 'UnidadHistorico';

    protected static ?string $navigationLabel = 'Unidad Historicos';
    protected static ?string $pluralModelLabel = 'Unidad Historicos';
    protected static ?int $navigationSort = 2;
    protected static string|\UnitEnum|null $navigationGroup = 'Parametros de Ascenso';
    /**
     * Must match the type declared in Filament\Resources\Resource
     * (Illuminate\Contracts\Support\Htmlable|string|null).
     */
    protected static \Illuminate\Contracts\Support\Htmlable|string|null $navigationBadgeTooltip = 'Numero de Unidades';
    public static function getNavigationBadge(): ?string {
        return static::getModel()::count();
    }


    public static function form(Schema $schema): Schema
    {
        return UnidadHistoricoForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UnidadHistoricosTable::configure($table);
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
            'index' => ListUnidadHistoricos::route('/'),
            'create' => CreateUnidadHistorico::route('/create'),
            'edit' => EditUnidadHistorico::route('/{record}/edit'),
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
