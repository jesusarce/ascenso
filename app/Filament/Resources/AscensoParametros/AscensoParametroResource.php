<?php

namespace App\Filament\Resources\AscensoParametros;

use App\Filament\Resources\AscensoParametros\Pages\CreateAscensoParametro;
use App\Filament\Resources\AscensoParametros\Pages\EditAscensoParametro;
use App\Filament\Resources\AscensoParametros\Pages\ListAscensoParametros;
use App\Filament\Resources\AscensoParametros\Schemas\AscensoParametroForm;
use App\Filament\Resources\AscensoParametros\Tables\AscensoParametrosTable;
use App\Models\AscensoParametro;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AscensoParametroResource extends Resource {

    protected static ?string $model = AscensoParametro::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedEquals;

    protected static ?string $recordTitleAttribute = 'Detalle de Ascenso';

    protected static ?string $navigationLabel = 'Detalle de Ascenso';
    protected static ?string $pluralModelLabel = 'Detalle de Ascenso';
    protected static ?int $navigationSort = 3;
    protected static string|\UnitEnum|null $navigationGroup = 'Parametros de Ascenso';

    protected static \Illuminate\Contracts\Support\Htmlable|string|null $navigationBadgeTooltip = 'Numero de requisitos para ascenso.';

    public static function getNavigationBadge(): ?string {
        return static::getModel()::count();
    }

    public static function form(Schema $schema): Schema
    {
        return AscensoParametroForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AscensoParametrosTable::configure($table);
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
            'index' => ListAscensoParametros::route('/'),
            'create' => CreateAscensoParametro::route('/create'),
            'edit' => EditAscensoParametro::route('/{record}/edit'),
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
