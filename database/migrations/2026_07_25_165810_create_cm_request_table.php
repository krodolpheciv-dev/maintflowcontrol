<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmRequestTable extends Migration
{
   /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    
    Schema::create('cm_requests', function (Blueprint $table) {
             $table->id();

    // Numéro de la requête
    $table->string('ticket',30)->unique();

    $table->unsignedBigInteger('project_id');
    

    // Site concerné
    $table->unsignedBigInteger('site_id');

    // Incident
    $table->unsignedBigInteger('incident_type_id');
    $table->unsignedBigInteger('incident_sub_type_id');

    // Priorité
    $table->enum('priority',[
        'Faible',
        'Moyenne',
        'Elevée',
        'Critique'
    ])->default('Faible');

    // Impact
    $table->enum('impact',[
        'Faible',
        'Moyen',
        'Critique'
    ])->default('Faible');

    // Description
    $table->text('description');

    // Pièce jointe
    $table->string('attachment')->nullable();

    /*
    |----------------------------------------------------
    | Créateur
    |----------------------------------------------------
    */

    $table->unsignedBigInteger('created_by');

    /*
    |----------------------------------------------------
    | Technicien affecté
    |----------------------------------------------------
    */

    $table->unsignedBigInteger('assigned_to')->nullable();

    /*
    |----------------------------------------------------
    | Validation
    |----------------------------------------------------
    */


    /*
    |----------------------------------------------------
    | Statut
    |----------------------------------------------------
    */

$table->enum('status',[
    'Ouverte',
    'Affectée',
    'En cours',
    'Suspendue',
    'Terminée',
    'Annulée'
])->default('Ouverte');


    /*
    |----------------------------------------------------
    | Dates importantes
    |----------------------------------------------------
    */

    $table->timestamp('assigned_at')->nullable();

    $table->timestamp('started_at')->nullable();

    $table->timestamp('completed_at')->nullable();

    $table->timestamps();

$table->softDeletes();

$table->foreign('project_id')
      ->references('id')
      ->on('projects');
   $table->foreign('incident_type_id')
      ->references('id')
      ->on('incident_types')
      ->onDelete('restrict');

$table->foreign('incident_sub_type_id')
      ->references('id')
      ->on('incident_sub_types')
      ->onDelete('restrict');

$table->foreign('site_id')
      ->references('id')
      ->on('sites')
      ->onDelete('restrict');

$table->foreign('created_by')
      ->references('id')
      ->on('users')
      ->onDelete('restrict');

$table->foreign('assigned_to')
      ->references('id')
      ->on('users')
      ->nullOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cm_requests');
    }
}