<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Incident\IncidentTypeModel;
use App\Models\Incident\IncidentSubTypeModel;

class IncidentTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Désactiver les événements pour éviter les déclenchements inutiles
        IncidentTypeModel::withoutEvents(function () {
            
            // 1. Types d'incidents
            $incidentTypes = [
                [
                    'libelletypeincident' => 'Énergie',
                    'description' => 'Problèmes liés à l\'alimentation électrique',
                    'status' => true,
                    'created_by' => 1,
                    'sub_types' => [
                        'Panne GE',
                        'Batterie HS',
                        'Chargeur défectueux',
                        'Coupure secteur',
                        'Onduleur défaillant'
                    ]
                ],
                [
                    'libelletypeincident' => 'Transmission',
                    'description' => 'Problèmes de transmission de données',
                    'status' => true,
                    'created_by' => 1,
                    'sub_types' => [
                        'Lien coupé',
                        'Signal faible',
                        'Équipement HS',
                        'Désynchronisation',
                        'Perte de paquets'
                    ]
                ],
                [
                    'libelletypeincident' => 'Carburant',
                    'description' => 'Problèmes liés au carburant',
                    'status' => true,
                    'created_by' => 1,
                    'sub_types' => [
                        'Manque carburant',
                        'Vol carburant',
                        'Fuite réservoir',
                        'Qualité carburant',
                        'Fuite tuyauterie'
                    ]
                ],
                [
                    'libelletypeincident' => 'Sécurité',
                    'description' => 'Problèmes de sécurité',
                    'status' => true,
                    'created_by' => 1,
                    'sub_types' => [
                        'Intrusion',
                        'Vol équipement',
                        'Vandalisme',
                        'Accès non autorisé',
                        'Caméra défaillante'
                    ]
                ],
                [
                    'libelletypeincident' => 'Climatisation',
                    'description' => 'Problèmes de climatisation',
                    'status' => true,
                    'created_by' => 1,
                    'sub_types' => [
                        'Clim HS',
                        'Température élevée',
                        'Fuite de gaz',
                        'Ventilateur défectueux',
                        'Filtre encrassé'
                    ]
                ],
                [
                    'libelletypeincident' => 'Réseau',
                    'description' => 'Problèmes de réseau informatique',
                    'status' => true,
                    'created_by' => 1,
                    'sub_types' => [
                        'Panoramique',
                        'Routeur défectueux',
                        'Commutateur HS',
                        'Câble endommagé',
                        'Interface réseau défaillante'
                    ]
                ],
                [
                    'libelletypeincident' => 'Matériel',
                    'description' => 'Problèmes matériels divers',
                    'status' => true,
                    'created_by' => 1,
                    'sub_types' => [
                        'Serveur défaillant',
                        'Disque dur HS',
                        'Carte mère défectueuse',
                        'Alimentation défaillante',
                        'Ventilateur en panne'
                    ]
                ],
                [
                    'libelletypeincident' => 'Logiciel',
                    'description' => 'Problèmes logiciels',
                    'status' => true,
                    'created_by' => 1,
                    'sub_types' => [
                        'Bug application',
                        'Erreur système',
                        'Mise à jour défaillante',
                        'Licence expirée',
                        'Configuration incorrecte'
                    ]
                ],
                [
                    'libelletypeincident' => 'Télécommunications',
                    'description' => 'Problèmes de télécommunications',
                    'status' => true,
                    'created_by' => 1,
                    'sub_types' => [
                        'Ligne téléphonique coupée',
                        'Défaillance fibre optique',
                        'Signal satellite faible',
                        'Antenne défaillante',
                        'Modem HS'
                    ]
                ],
                [
                    'libelletypeincident' => 'Infrastructure',
                    'description' => 'Problèmes d\'infrastructure physique',
                    'status' => true,
                    'created_by' => 1,
                    'sub_types' => [
                        'Fuite d\'eau',
                        'Incendie',
                        'Inondation',
                        'Effondrement structurel',
                        'Problème électrique'
                    ]
                ]
            ];

            foreach ($incidentTypes as $typeData) {
                // Extraire les sous-types
                $subTypesData = $typeData['sub_types'];
                unset($typeData['sub_types']);

                // Créer le type d'incident
                $incidentType = IncidentTypeModel::create($typeData);

                // Créer les sous-types associés
                foreach ($subTypesData as $subTypeName) {
                    IncidentSubTypeModel::create([
                        'incident_type_id' => $incidentType->id,
                        'libellesoustype' => $subTypeName,
                        'description' => "Sous-type: {$subTypeName}",
                        'status' => true,
                        'created_by' => 1
                    ]);
                }
            }

            $this->command->info('✅ Types et sous-types d\'incidents créés avec succès !');
        });
    }
}