<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfesionalResource\Pages;
use App\Filament\Resources\ProfesionalResource\RelationManagers;
use App\Models\Profesional;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str; // Importar la clase Str para slugs

class ProfesionalResource extends Resource
{
    protected static ?string $model = Profesional::class;

    // **MUY IMPORTANTE:** Define un ícono que exista o déjalo en null para que no tenga.
    // Si lo tenías en null y aún daba error de SVG, prueba con uno que sabes que existe.
    protected static ?string $navigationIcon = 'heroicon-o-newspaper'; // O 'heroicons-o-users' o 'heroicons-o-user'

    protected static ?string $navigationGroup = 'Contenido del Sitio'; // Para agruparlo con Novedades y Áreas

    protected static ?int $navigationSort = 1; // Para ordenar dentro del grupo

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre_completo')
                    ->required()
                    ->maxLength(255)
                    ->reactive() // Hace que el slug se actualice al escribir el nombre
                    ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true), // Valida que el slug sea único, ignorando el registro actual al editar
                Forms\Components\TextInput::make('cargo')
                    ->maxLength(255)
                    ->nullable(),
                Forms\Components\TextInput::make('especialidad')
                    ->maxLength(255)
                    ->nullable(),
                Forms\Components\RichEditor::make('biografia_corta')
                    ->label('Biografía Corta (Resumen)')
                    ->maxLength(65535)
                    ->nullable(),
                Forms\Components\RichEditor::make('biografia_completa')
                    ->label('Biografía Completa')
                    ->maxLength(65535) // Puedes usar ->columnSpanFull() si quieres que ocupe todo el ancho
                    ->nullable(),
                Forms\Components\FileUpload::make('foto')
                    ->image()
                    ->directory('profesionales') // Almacena en storage/app/public/profesionales
                    ->preserveFilenames() // Mantiene el nombre original del archivo
                    ->visibility('public') // Hace que el archivo sea accesible públicamente
                    ->nullable(),
                Forms\Components\TextInput::make('enlace_linkedin')
                    ->label('Enlace de LinkedIn')
                    ->url() // Valida que sea una URL
                    ->maxLength(255)
                    ->nullable(),
                Forms\Components\TextInput::make('email')
                    ->email() // Valida que sea un email
                    ->maxLength(255)
                    ->nullable(),
                Forms\Components\TextInput::make('orden')
                    ->numeric()
                    ->default(0)
                    ->nullable(),
                Forms\Components\Toggle::make('publicado')
                    ->label('Publicar en el sitio web')
                    ->default(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre_completo')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cargo')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('foto')
                    ->label('Foto')
                    ->square(), // Hace que la imagen se vea cuadrada en la tabla
                Tables\Columns\TextColumn::make('orden')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('publicado')
                    ->boolean()
                    ->label('Publicado'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListProfesionals::route('/'),
            'create' => Pages\CreateProfesional::route('/create'),
            'edit' => Pages\EditProfesional::route('/{record}/edit'),
        ];
    }
}