<?php

namespace App\Filament\Resources\RoleResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Filament\Resources\RoleResource;
use Filament\Forms\Components\BelongsToManyCheckboxList;
use Filament\Resources\RelationManagers\BelongsToManyRelationManager;

class PermissionsRelationManager extends BelongsToManyRelationManager
{
    protected static string $relationship = 'permissions';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $pluralLabel = 'permessi';


    // disabilita la creazione e la modifica dei ruoli all'interno dal form utente
    protected function canCreate(): bool
    {
        return false;
    }


    protected function canDeleteAny(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                BelongsToManyCheckboxList::make('permissions')
                    ->relationship('permissions', 'name')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(
                RoleResource::getTableColumns()

            )
            ->filters([
                //
            ]);
    }

    public static function attachForm(Form $form): Form
    {
        return $form
            ->schema([
                // static::getAttachFormRecordSelect(),
                Forms\Components\Select::make('recordId')
                    ->label('Permesso')
                    ->options(\App\Models\Permission::all()->pluck('name', 'id'))
                    ->searchable()
            ]);
    }
}
