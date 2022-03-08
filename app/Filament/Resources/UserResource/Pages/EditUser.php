<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Pages\Actions\ButtonAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms\Components\BelongsToManyMultiSelect;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;


    protected function getFormActions(): array
    {
        // pulsante per validazione finale
        return ([
            ButtonAction::make('Salva & Chiudi')->action('saveAndClose'),
        ]);
    }

    public function saveAndClose(): void
    {
        $this->record->save();
        $this->notify('success', 'Salvato', isAfterRedirect: true);
        redirect()->to(route('filament.resources.users.index'));
    }
}
