<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sites\SiteModel;  
use App\Models\Project;

class SiteSeeder extends Seeder
{
    public function run(): void
    {
        
        $project = Project::first();
        
        if (!$project) {
            $project = Project::create([
                'name' => 'Projet Principal',
                'description' => 'Projet par défaut',
                'status' => 1,
            ]);
        }
        
        $projectId = $project->id;
        
        $sites = [
            [
                'project_id' => $projectId,
                'site_code' => 'AC032',
                'site_name' => 'Abidjan Cocody',
                'commune' => 'Cocody',
                'ville' => 'Abidjan',
                'region' => 'Abidjan',
                'zone' => 'Sud',
                'latitude' => 5.354044,
                'longitude' => -3.987654,
                'typologie' => 'Rooftop',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'project_id' => $projectId,
                'site_code' => 'AC264',
                'site_name' => 'Abidjan Yopougon',
                'commune' => 'Yopougon',
                'ville' => 'Abidjan',
                'region' => 'Abidjan',
                'zone' => 'Ouest',
                'latitude' => 5.336789,
                'longitude' => -4.080321,
                'typologie' => 'Greenfield',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'project_id' => $projectId,
                'site_code' => 'ET165',
                'site_name' => 'Yamoussoukro Centre',
                'commune' => 'Yamoussoukro',
                'ville' => 'Yamoussoukro',
                'region' => 'Bélier',
                'zone' => 'Centre',
                'latitude' => 6.827623,
                'longitude' => -5.289343,
                'typologie' => 'Tower',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($sites as $site) {
            SiteModel::create($site); 
        }
    }
}