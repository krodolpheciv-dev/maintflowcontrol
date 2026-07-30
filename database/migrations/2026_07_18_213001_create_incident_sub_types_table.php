<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentSubTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incident_sub_types', function (Blueprint $table) {
            $table->id();

            $table->foreignId('incident_type_id')
                    ->constrained('incident_types')
                    ->cascadeOnDelete();


            $table->string('libellesoustype');

            $table->text('description')->nullable();

            $table->boolean('status')->default(true);

            $table->foreignId('created_by')
                    ->nullable()
                    ->constrained('users')
                    ->nullOnDelete();

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
        Schema::dropIfExists('incident_sub_types');
    }
}
