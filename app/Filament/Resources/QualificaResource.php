<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QualificaResource\Pages;
use App\Filament\Resources\QualificaResource\RelationManagers;
use App\Models\Qualifica;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class QualificaResource extends Resource
{
    protected static ?string $model = Qualifica::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $pluralLabel = 'qualifiche';

    protected static ?string $slug = 'qualifiche';

    protected static ?string $navigationGroup = 'Amministrazione';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable(),
                Tables\Columns\TextColumn::make('created_at')->label('Creato il')
                    ->dateTime('d-m-Y H:i:s'),
                Tables\Columns\TextColumn::make('updated_at')->label('Modificato il')
                    ->dateTime('d-m-Y H:i:s'),
            ])
            ->filters([
                //
            ])
            ->defaultSort('name');
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
            'index' => Pages\ListQualificas::route('/'),
            'create' => Pages\CreateQualifica::route('/create'),
            'edit' => Pages\EditQualifica::route('/{record}/edit'),
        ];
    }
}
