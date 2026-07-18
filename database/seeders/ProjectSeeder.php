<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        Project::firstOrCreate(
            ['nom_projet' => 'Projet Démo'],
            [
                'date_debut' => now(),
                'date_fin'   => null,
                'contrat'    => 'CTR-DEMO-001',
                'is_active'  => true,
            ]
        );

        Project::firstOrCreate(
            ['nom_projet' => 'Projet Démo 2'],
            [
                'date_debut' => now(),
                'date_fin'   => null,
                'contrat'    => 'CTR-DEMO-002',
                'is_active'  => true,
            ]
        );
    }
}