<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTableStructure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::table('users', function (Blueprint $table) {

            // Supprimer colonne name
            $table->dropColumn('name');

            // Ajouter nouvelles colonnes
            $table->string('nom')->after('id');
            $table->string('prenom')->after('nom');

            $table->string('contact')->nullable()->after('email');
            $table->string('zone')->nullable()->after('contact');

            $table->enum('etat_utilisateur', ['actif', 'inactif'])
                  ->default('actif')
                  ->after('zone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //

        Schema::table('users', function (Blueprint $table) {

            $table->string('name')->after('id');

            $table->dropColumn([
                'nom',
                'prenom',
                'contact',
                'zone',
                'etat_utilisateur'
            ]);
        });
    }
}
