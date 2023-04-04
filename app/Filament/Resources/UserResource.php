<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\TextInput;
use App\Filament\Resources\UserResource\Pages;
use Filament\Forms\Components\HasManyRepeater;
use Filament\Forms\Components\MorphManyRepeater;
use Filament\Pages\Actions\Action;
use robertogallea\LaravelCodiceFiscale\CodiceFiscale;
use Filament\Forms\Components\BelongsToManyMultiSelect;
use App\Filament\Resources\UserResource\RelationManagers;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Autorizzazioni';

    protected static ?string $pluralLabel = 'Utenti';


    public static function form(Form $form): Form
    {



        return $form
            ->schema([
                Fieldset::make('Dati')->schema([
                    Forms\Components\TextInput::make('username')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('surname')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('data_nascita')
                        ->type('date')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('comune_nascita')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('provincia_nascita')
                        ->required()
                        ->length(2),
                    Forms\Components\TextInput::make('sesso')
                        ->required()
                        ->length(1),
                    Forms\Components\TextInput::make('codice_fiscale')
                        ->length(16)
                        ,

                    Select::make('team_id')
                        ->label('Ufficio di Appartenenza')
                        ->relationship('area', 'name')
                        ->default(''),
                    Select::make('qualifica_id')
                        ->relationship('qualifica', 'name')
                        ->default(''),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('username')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('surname')->label('Cognome')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('data_nascita')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('comune_nascita')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('provincia_nascita')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('qualifica.name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('area.name')->label('Area')->sortable()->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->defaultSort('username')
            ->filters([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\RolesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
