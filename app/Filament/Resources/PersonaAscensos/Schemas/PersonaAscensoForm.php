<?php

namespace App\Filament\Resources\PersonaAscensos\Schemas;

use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use \Filament\Forms\Concerns\InteractsWithActions;

class PersonaAscensoForm {
    public static function configure(Schema $schema): Schema {
        return $schema
            ->components([
                Section::make('Datos para Ascenso')
                    ->description('Puede crear o editar los datos del ascenso de una persona.')
                    ->columns(3)
                    ->schema([
                        TextInput::make('persona_id')->label('Persona ID')->required(),
                        TextInput::make('pasc_gestion')->label('Gestion Ascenso:')->required(),
                        TextInput::make('pasc_grado_grupo')->label('Grupo Grado:')->required(),
                        TextInput::make('pasc_grado')->label('Grado:')->required(),
                        Select::make('pasc_tipo')
                            ->label('Tipo:')
                            ->options([
                                'ADMINISTRATIVO' => '🔵 Administrativo',
                                'OPERATIVO' => '🔴 Operativo',
                            ])
                            ->required(),
                            Action::make('verRequisitos')
                                ->label('Ver Requisitos')
                                ->modalHeading('Requisitos de Ascenso')
                                ->modalContent(function ($get) {
                                    $descripcion = $get('requisitoDocumentoDetalle.rasc_ascenso_descripcion');
                                    $requisitos = \App\Models\RequisitoAscenso::query()
                                        ->join('requisito_documento_detalles', 'requisito_documento_detalles.requisito_ascenso_id', '=', 'requisito_ascensos.id')
                                        ->where('requisito_documento_detalles.rasc_ascenso_descripcion', $descripcion)
                                        ->select('requisito_ascensos.*')
                                        ->get();
                                    return view('filament.modals.requisitos-ascenso', compact('requisitos'));
                                })
                                ->modalSubmitAction(false)
                                ->color('info'),
                        TextInput::make('convocatoria_estado_id')->label('Estado:')->required(),
                        TextInput::make('pasc_promocion')->label('Promoción de Egreso')->type('integer')->required(),
                        TextInput::make('pasc_antiguedad')->label('Antigüedad')->required(),
                        MarkdownEditor::make('observacion')
                            ->toolbarButtons([
                                ['bold', 'italic', 'strike', 'link'],
                                ['heading'],
                                ['blockquote', 'codeBlock', 'bulletList', 'orderedList'],
                                ['table'],
                                ['undo', 'redo'],
                            ])->label('Observación')->columnSpanFull(),
                        FileUpload::make('archivo_nombre')
                            ->label('Nombre del Archivo')
                            ->disk('sftp')
                            ->directory('data')
                            ->visibility('private')
                            ->acceptedFileTypes(['application/pdf', 'image/jpeg', 'image/jpg']),
                        TextInput::make('requisito_documento_detalle_id')->label('Requisito Documento Detalle ID'),
                    ])->columnSpan(4),
                Section::make('Datos Adicionales')
                    ->schema([
                        Placeholder::make('info_persona')
                            ->label('Datos de la Persona')
                            ->content(fn ($get) => (
                                ($get('persona')?->nombre ?? '') . ' ' .
                                ($get('persona')?->apellido ?? '') . ' ' .
                                ($get('persona')?->apellido_materno ?? '') . ' | CI: ' .
                                ($get('persona')?->ci ?? 'No disponible')
                            )),
                    ])->columnSpan(2)
            ])->columns(6);
    }
}
