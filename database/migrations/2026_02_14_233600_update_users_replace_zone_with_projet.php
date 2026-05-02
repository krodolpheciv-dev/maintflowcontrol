<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersReplaceZoneWithProjet extends Migration
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

        $table->dropColumn('zone');

      

               $table->unsignedBigInteger('projet_id')->nullable()->after('contact');
    $table->foreign('projet_id')
          ->references('id')
          ->on('projects')
          ->onDelete('set null');
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

        $table->string('zone')->nullable();

        $table->dropForeign(['projet_id']);
        $table->dropColumn('projet_id');
    });

    }
}
