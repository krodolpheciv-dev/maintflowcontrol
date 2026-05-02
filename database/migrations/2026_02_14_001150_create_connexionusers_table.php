<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConnexionusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('connexionusers', function (Blueprint $table) {
         
            $table->id();
            $table->string('nom');
            $table->string('prenom');

            $table->string('email')->unique();

            $table->string('contact')->nullable();

            $table->string('password');

            $table->string('zone')->nullable(); // seulement si technicien

            $table->enum('etat_utilisateur', ['actif', 'inactif'])
                  ->default('actif');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('connexionusers');
    }
}
