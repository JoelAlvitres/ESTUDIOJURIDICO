<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonioResource\Pages;
use App\Filament\Resources\TestimonioResource\RelationManagers;
use App\Models\Testimonio;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;

class TestimonioResource extends Resource
{
    protected static ?string $model = Testimonio::class;
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationLabel = 'Testimonios';
    protected static ?string $modelLabel = 'Testimonio';
    protected static ?string $pluralModelLabel = 'Testimonios';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nombre_cliente')
                    ->required()
                    ->maxLength(255),
                TextInput::make('cargo')
                    ->required()
                    ->maxLength(255),
                Textarea::make('testimonio')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Toggle::make('publicado')
                    ->label('Publicar Testimonio')
                    ->default(false)
                    ->helperText('Solo los testimonios publicados serán visibles en la página web.'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre_cliente')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cargo')
                    ->searchable(),
                Tables\Columns\IconColumn::make('publicado')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListTestimonios::route('/'),
            'create' => Pages\CreateTestimonio::route('/create'),
            'edit' => Pages\EditTestimonio::route('/{record}/edit'),
        ];
    }    
}