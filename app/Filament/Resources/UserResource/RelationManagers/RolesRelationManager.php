<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Debugbar;
use Filament\Forms;
use App\Models\Role;
use App\Models\Team;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\RoleResource;
use App\Filament\Resources\UserResource;
use Filament\Forms\Components\BelongsToManyCheckboxList;
use Filament\Resources\RelationManagers\BelongsToManyRelationManager;

class RolesRelationManager extends BelongsToManyRelationManager
{
    use Forms\Concerns\InteractsWithForms;

    protected static string $relationship = 'roles';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $pluralLabel = 'ruoli';

    public Role $role;




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

                //RoleResource::getTableColumns()
                [
                    \Filament\Tables\Columns\TextColumn::make('name'),
                    \Filament\Tables\Columns\TextColumn::make('team')
                        ->getStateUsing(fn ($record): ?string => (Team::find($record->team_id)?->name ?? null)),
                ]
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
                Forms\Components\Select::make('team_id')
                    ->label('Team')
                    ->options(\App\Models\Team::all()->pluck('name', 'id'))
                    ->reactive()
                    ->afterStateUpdated(fn (callable $set) => $set('recordId', null)),

                Forms\Components\Select::make('recordId')
                    ->label('Ruolo')
                    ->options(function (callable $get) {
                        // rimuove dalla scelta i ruoli già assegnati
                        dd(getRecord());

                        return DB::table('roles')
                            ->select('id', 'name')
                            ->whereNotIn('id', DB::table('role_user')->select('role_id')->where('team_id', '=', 1)->where('user_id', '=', 1))->pluck('name', 'id');
                    }),
            ]);
    }
}
