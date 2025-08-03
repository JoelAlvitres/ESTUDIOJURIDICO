<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NovedadResource\Pages;
use App\Models\Novedad;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class NovedadResource extends Resource
{
    protected static ?string $model = Novedad::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationGroup = 'Contenido del Sitio';

    protected static ?string $modelLabel = 'Novedad';
    protected static ?string $pluralModelLabel = 'Novedades';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('titulo')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => 
                                $operation === 'create' ? $set('slug', Str::slug($state)) : null),
                        
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),

                        Forms\Components\RichEditor::make('contenido')
                            ->required()
                            ->columnSpanFull(),

                        Forms\Components\FileUpload::make('imagen_destacada')
                            ->image()
                            ->directory('novedades-imagenes')
                            ->nullable(),

                        Forms\Components\TextInput::make('autor')
                            ->maxLength(255)
                            ->nullable(),

                        Forms\Components\DateTimePicker::make('fecha_publicacion')
                            ->default(now())
                            ->required(),

                        Forms\Components\Toggle::make('publicado')
                            ->label('Publicar Novedad')
                            ->default(true)
                            ->helperText('Si está activado, la novedad será visible en el sitio web.'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('titulo')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('autor')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\ImageColumn::make('imagen_destacada')
                    ->label('Imagen'),

                Tables\Columns\TextColumn::make('fecha_publicacion')
                    ->dateTime()
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
                Tables\Filters\TernaryFilter::make('publicado')
                    ->label('Estado de Publicación')
                    ->boolean()
                    ->trueLabel('Publicadas')
                    ->falseLabel('Borradores')
                    ->placeholder('Todas las Novedades'),
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNovedads::route('/'),
            'create' => Pages\CreateNovedad::route('/create'),
            'edit' => Pages\EditNovedad::route('/{record}/edit'),
        ];
    }
}
