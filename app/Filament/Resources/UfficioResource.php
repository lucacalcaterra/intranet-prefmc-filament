<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UfficioResource\Pages;
use App\Filament\Resources\UfficioResource\RelationManagers;
use App\Models\Ufficio;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class UfficioResource extends Resource
{
    protected static ?string $model = Ufficio::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $pluralLabel = 'uffici';

    protected static ?string $slug = 'uffici';

    protected static ?string $navigationGroup = 'Amministrazione';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
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
            'index' => Pages\ListUfficios::route('/'),
            'create' => Pages\CreateUfficio::route('/create'),
            'edit' => Pages\EditUfficio::route('/{record}/edit'),
        ];
    }
}
