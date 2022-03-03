<?php

namespace Database\Seeders;

use App\Models\Qualifica;
use Illuminate\Database\Seeder;

class QualificheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $qualifiche = [
            'Prefetto',
            'Viceprefetto',
            'Viceprefetto Aggiunto',
            'Dirigente contr.to',
            'Funzionario Amministrativo',
            'Funzionario Economico Finanziario',
            'Funzionario Assistente Sociale',
            'Funzionario Informatico',
            'Assistente Amministrativo',
            'Assistente Economico Finanziario',
            'Assistente Informatico',
            'Operatore Amministrativo',
            'Ausiliario',
            'Ausiliario Tecnico',
        ];

        foreach ($qualifiche as $qualifica) {
            Qualifica::create(['name' => $qualifica]);
        }
    }
}
