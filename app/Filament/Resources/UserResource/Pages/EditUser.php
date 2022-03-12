<?php

namespace App\Filament\Resources\UserResource\Pages;

use Debugbar;
use Livewire\Livewire;
use Livewire\Component;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\UserResource;
use App\Filament\Resources\UserResource\RelationManagers\RolesRelationManager;
use Filament\Pages\Actions\ButtonAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms\Components\BelongsToManyMultiSelect;
use Filament\Resources\RelationManagers\RelationManager;

class EditUser extends EditRecord
{

    protected static string $resource = UserResource::class;

    protected static  $rolesRel = RolesRelationManager::class;

    // protected function getFormActions(): array
    // {
    //     return array_merge(parent::getFormActions(), [
    //         ButtonAction::make('Salva e Chiudi')->action('saveAndClose'),
    //     ]);
    // }

    // public function saveAndClose(?Model $record): void
    // {
    //     Debugbar::info('ciao');
    //     $record->save();
    //     $this->fillForm();
    // }

    protected function afterSave(): void
    {

        $this->emit('userUpdated');


        //dd($this);
        //$rolesManager = $this->getRelationManagers()[0];

        // dd($rolesManager->getResourceTable()->fresh());
    }
}
