<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Team;


class TeamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aree = [
            'Area 1',
            'Area 2',
            'Area 3',
            'Area 4',
            'Uff. di Gabinetto',
            'Uff. Ragioneria',
            'Uff. del Vicario',
        ];

        foreach ($aree as $area) {
            Team::create(['name' => $area]);
        }
    }
}
