<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use App\Filament\Resources\RoleResource;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\BelongsToManyRelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class RolesRelationManager extends BelongsToManyRelationManager
{
    protected static string $relationship = 'roles';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $pluralLabel = 'ruoli';


    // disabilita la creazione e la modifica dei ruoli all'interno dal form utente
    protected function canCreate(): bool
    {
        return false;
    }

    protected function canDelete(Model $record): bool
    {
        return false;
    }

    protected function canDeleteAny(): bool
    {
        return false;
    }

    protected function canEdit(Model $record): bool
    {
        return false;
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
                    ->label('Ruolo')
                    ->options(\App\Models\Role::all()->pluck('name', 'id'))
                    ->searchable()
            ]);
    }
}
