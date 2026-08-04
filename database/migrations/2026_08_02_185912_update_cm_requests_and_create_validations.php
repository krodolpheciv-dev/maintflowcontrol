<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Modifier l'ENUM de cm_requests
        DB::statement("ALTER TABLE cm_requests MODIFY status ENUM(
            'Ouverte', 
            'Affectée', 
            'En cours', 
            'Suspendue', 
            'Terminée', 
            'Annulée',
            'Validée',
            'Refusée'
        ) DEFAULT 'Ouverte'");

        // 2. Créer la table cm_request_validations
        Schema::create('cm_request_validations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('cm_request_id');
            $table->foreign('cm_request_id')
                  ->references('id')->on('cm_requests')
                  ->onDelete('cascade');

            $table->string('ticket');
            $table->unsignedBigInteger('project_id')->nullable();
            $table->string('project_name')->nullable();

            $table->unsignedBigInteger('site_id')->nullable();
            $table->string('site_code')->nullable();

            $table->unsignedBigInteger('incident_type_id')->nullable();
            $table->string('incident_type_libelle')->nullable();

            $table->unsignedBigInteger('incident_sub_type_id')->nullable();
            $table->string('incident_sub_type_libelle')->nullable();

            $table->string('priority')->nullable();
            $table->string('impact')->nullable();
            $table->text('description')->nullable();
            $table->string('attachment')->nullable();

            $table->unsignedBigInteger('created_by')->nullable();
            $table->string('created_by_name')->nullable();

            $table->unsignedBigInteger('assigned_to')->nullable();
            $table->string('assigned_to_name')->nullable();

            $table->string('request_status')->nullable();
            $table->timestamp('request_created_at')->nullable();

            $table->enum('validation_decision', ['validee', 'refusee']);
            $table->text('comment')->nullable();

            $table->unsignedBigInteger('validated_by');
            $table->string('validated_by_name')->nullable();
            $table->string('validated_by_email')->nullable();

            $table->foreign('validated_by')
                  ->references('id')->on('users')
                  ->onDelete('cascade');

            $table->timestamp('created_at')->useCurrent();

            $table->index(['cm_request_id', 'validation_decision']);
            $table->index('ticket');
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cm_request_validations');
        
        // Revenir à l'ENUM précédent
        DB::statement("ALTER TABLE cm_requests MODIFY status ENUM(
            'Ouverte', 
            'Affectée', 
            'En cours', 
            'Suspendue', 
            'Terminée', 
            'Annulée'
        ) DEFAULT 'Ouverte'");
    }
};