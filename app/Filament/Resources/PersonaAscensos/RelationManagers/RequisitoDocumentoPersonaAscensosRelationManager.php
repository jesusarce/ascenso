<?php

namespace App\Filament\Resources\PersonaAscensos\RelationManagers;

use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RequisitoDocumentoPersonaAscensosRelationManager extends RelationManager
{
    protected static string $relationship = 'requisitoDocumentoPersonaAscensos';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                // TextInput::make('requisito_documento_id')
                //     ->numeric(),
                // TextInput::make('persona_id')
                //     ->numeric(),
                // TextInput::make('rdpa_especifico'),
                // Textarea::make('rdpa_detalle')
                //     ->columnSpanFull(),
                FileUpload::make('rdpa_documento')
                    ->label('Documento de Respaldo')
                    ->required(),
                // TextInput::make('rdpa_puntaje')
                //     ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('RequisitoDocumentoPersonaAscenso')
            ->columns([
                TextColumn::make('requisito_documento_id')->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                TextColumn::make('persona_id')->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                TextColumn::make('requisitoDocumento.rdoc_descripcion')->wrap()->extraAttributes(['style' => 'width:400px; white-space:normal; word-break:break-word;'])
                        ->searchable(),
                TextColumn::make('rdpa_documento')
                        ->label('Respaldo')
                        ->searchable(),
                TextColumn::make('rdpa_puntaje')
                        ->label('Puntaje')
                        ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->headerActions([
                CreateAction::make(),
                AssociateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                // DissociateAction::make(),
                DeleteAction::make(),
                ForceDeleteAction::make(),
                RestoreAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DissociateBulkAction::make(),
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ])
            ->modifyQueryUsing(fn (Builder $query) => $query
                ->withoutGlobalScopes([
                    SoftDeletingScope::class,
                ]));
    }
}
