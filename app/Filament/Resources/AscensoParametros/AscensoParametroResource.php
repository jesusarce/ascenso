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

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'AscencoParametro';

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
