<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sites')->insert([

            [
                'project_id' => 4,
                'site_code'  => 'AC032',
                'site_name'  => 'Abidjan Cocody',
                'region'     => 'Abidjan',
                'ville'      => 'Abidjan',
                'commune'    => 'Cocody',
                'typologie'  => 'Rooftop',
                'zone'       => 'Sud',
                'latitude'   => 5.354044,
                'longitude'  => -3.987654,
                'status'     => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'project_id' => 4,
                'site_code'  => 'AC264',
                'site_name'  => 'Abidjan Yopougon',
                'region'     => 'Abidjan',
                'ville'      => 'Abidjan',
                'commune'    => 'Yopougon',
                'typologie'  => 'Greenfield',
                'zone'       => 'Ouest',
                'latitude'   => 5.336789,
                'longitude'  => -4.080321,
                'status'     => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'project_id' => 4,
                'site_code'  => 'ET165',
                'site_name'  => 'Yamoussoukro Centre',
                'region'     => 'Bélier',
                'ville'      => 'Yamoussoukro',
                'commune'    => 'Yamoussoukro',
                'typologie'  => 'Tower',
                'zone'       => 'Centre',
                'latitude'   => 6.827623,
                'longitude'  => -5.289343,
                'status'     => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
