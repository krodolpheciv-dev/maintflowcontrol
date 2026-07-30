<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
        $table->id();

    /*
    |--------------------------------------------------------------------------
    | Projet
    |--------------------------------------------------------------------------
    */
    $table->unsignedBigInteger('project_id');

    /*
    |--------------------------------------------------------------------------
    | Informations du site
    |--------------------------------------------------------------------------
    */
    $table->string('site_code',30)->unique();
    $table->string('site_name',150);

    /*
    |--------------------------------------------------------------------------
    | Localisation
    |--------------------------------------------------------------------------
    */
    $table->string('region')->nullable();
    $table->string('ville')->nullable();
    $table->string('commune')->nullable();

    /*
    |--------------------------------------------------------------------------
    | Caractéristiques
    |--------------------------------------------------------------------------
    */
    $table->string('typologie')->nullable();
    $table->string('zone')->nullable();

    /*
    |--------------------------------------------------------------------------
    | Coordonnées GPS
    |--------------------------------------------------------------------------
    */
    $table->decimal('latitude',10,7)->nullable();
    $table->decimal('longitude',10,7)->nullable();

    /*
    |--------------------------------------------------------------------------
    | Statut
    |--------------------------------------------------------------------------
    */
    $table->boolean('status')->default(true);

    $table->timestamps();

    /*
    |--------------------------------------------------------------------------
    | Clé étrangère
    |--------------------------------------------------------------------------
    */
    $table->foreign('project_id')
          ->references('id')
          ->on('projects')
          ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sites');
    }
}
