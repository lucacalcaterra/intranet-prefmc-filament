<?php

namespace App\Filament\Resources\ReportResource\Pages;

use App\Filament\Resources\ReportResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Pages\Actions\ButtonAction;
use App\Filament\Resources\ReportResource\Pages;


class EditReport extends EditRecord
{
    protected static string $resource = ReportResource::class;

    protected function getFormActions(): array
    {
        // pulsante per validazione finale
        return array_merge(parent::getFormActions(), [
            ButtonAction::make('Salva e Invia')->action(function () {

                $this->record->stato = "INVIATO";
                $this->record->save();
                redirect(
                    $this->getResource()::getUrl('index')
                );
            })
                ->requiresConfirmation()
                ->modalHeading('INVIO REPORT')
                ->modalSubheading('Una volta inviato il report non sarà più possibile modificarlo, sei sicuro ?')
                ->modalButton('Si, INVIA')
                ->color('danger'),

        ]);
    }
}
