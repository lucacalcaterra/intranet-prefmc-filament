<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReportResource\Pages;
use App\Filament\Resources\ReportResource\RelationManagers;
use App\Models\Report;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class ReportResource extends Resource
{
    protected static ?string $model = Report::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([Forms\Components\DatePicker::make('data')->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')->sortable(),
                Tables\Columns\TextColumn::make('data')->sortable()->date(),
                Tables\Columns\TextColumn::make('created_at')->label('Creato il')
                ->dateTime('d-m-Y H:i:s'),
                Tables\Columns\TextColumn::make('updated_at')->label('Modificato il')
                ->dateTime('d-m-Y H:i:s'),
            ])
            ->filters([
                //
            ])
            ->defaultSort('nome');
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
            'index' => Pages\ListReports::route('/'),
            'create' => Pages\CreateReport::route('/create'),
            'edit' => Pages\EditReport::route('/{record}/edit'),
        ];
    }
}
