<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projet_user', function (Blueprint $table) {
             $table->id();
   
    $table->unsignedBigInteger('user_id');
    $table->foreign('user_id')->references('id')
          ->on('users')->onDelete('cascade');


     $table->unsignedBigInteger('projet_id');
    $table->foreign('projet_id')->references('id')
          ->on('projects')->onDelete('cascade');

    // role_id vient de spatie (table roles)
    $table->foreignId('role_id')
          ->constrained('roles')
          ->onDelete('cascade');

    $table->timestamps();

    $table->unique(['user_id', 'projet_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projet_user');
    }
}
