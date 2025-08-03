<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AreaResource\Pages;
use App\Filament\Resources\AreaResource\RelationManagers;
use App\Models\Area; // Importa el modelo Area
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str; // Importa Str para el slug

class AreaResource extends Resource
{
    protected static ?string $model = Area::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube'; // Icono para el menú de navegación
    protected static ?string $navigationGroup = 'Contenido del Sitio'; // Agrupa las áreas en el menú
    protected static ?int $navigationSort = 1; // Para ordenar en el menú (Novedades podría ser 2)

    protected static ?string $modelLabel = 'Área de Práctica';
    protected static ?string $pluralModelLabel = 'Áreas de Práctica';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('nombre')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),
                        Forms\Components\Textarea::make('descripcion_corta')
                            ->rows(3)
                            ->maxLength(500)
                            ->nullable(),
                        Forms\Components\RichEditor::make('contenido')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('icono')
                            ->label('Clase de Icono (ej. heroicon-o-cube)')
                            ->maxLength(255)
                            ->nullable()
                            ->helperText('Puedes usar iconos de Heroicons. Ejemplo: heroicon-o-cube'),
                        Forms\Components\FileUpload::make('imagen_destacada')
                            ->image()
                            ->directory('areas-imagenes')
                            ->nullable(),
                        Forms\Components\TextInput::make('orden')
                            ->numeric()
                            ->default(0)
                            ->minValue(0)
                            ->maxValue(999),
                        Forms\Components\Toggle::make('publicado')
                            ->label('Publicar Área')
                            ->default(true)
                            ->helperText('Si está activado, el área será visible en el sitio web.'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\IconColumn::make('icono')
                    ->label('Icono')
                    ->icon(fn (string $state): string => $state) // Muestra el icono basado en la clase
                    ->size(Tables\Columns\IconColumn\IconColumnSize::Medium)
                    ->color('primary')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\ImageColumn::make('imagen_destacada')
                    ->label('Imagen'),
                Tables\Columns\TextColumn::make('orden')
                    ->sortable(),
                Tables\Columns\IconColumn::make('publicado')
                    ->boolean()
                    ->label('Publicado'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('publicado')
                    ->label('Estado de Publicación')
                    ->boolean()
                    ->trueLabel('Publicadas')
                    ->falseLabel('Borradores')
                    ->placeholder('Todas las Áreas'),
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
            'index' => Pages\ListAreas::route('/'),
            'create' => Pages\CreateArea::route('/create'),
            'edit' => Pages\EditArea::route('/{record}/edit'),
        ];
    }
}