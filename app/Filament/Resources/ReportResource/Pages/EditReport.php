<?php

namespace App\Filament\Resources\ReportResource\Pages;

use App\Filament\Resources\ReportResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Pages\Actions\ButtonAction;
use Filament;


class EditReport extends EditRecord
{
    protected static string $resource = ReportResource::class;

    protected function getFormActions(): array
    {
        return array_merge(parent::getFormActions(), [
            ButtonAction::make('Salva e Invia')->action(function () {

                $this->record->stato = "INVIATO";
                $this->record->save();
                redirect(
                    $this->getRedirectUrl()
                );
            })
                ->requiresConfirmation(),
        ]);
    }

    public function salvaEValida(): void
    {
        // ...
    }
}
