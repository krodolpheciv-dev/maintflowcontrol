<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddModuleToPermissionsTable extends Migration
{
 
     public function up()
    {
        Schema::table('permissions', function (Blueprint $table) {
            $table->string('module')
                  ->nullable()
                  ->after('name')
                  ->index();
        });
    }

    public function down()
    {
        Schema::table('permissions', function (Blueprint $table) {
            $table->dropColumn('module');
        });
    }
}
