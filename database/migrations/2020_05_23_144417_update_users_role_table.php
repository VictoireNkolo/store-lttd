<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->comment('role utilisateur');
            $table->boolean('is_active')->default(true)->comment('is_active = true si l\'utilisateur est actif');
            $table->boolean('is_suspend')->default(false)->comment('is_suspend = true si l\'utilisateur a été suspendu');
            $table->boolean('is_delete')->default(false)->comment('is_delete = true si l\'utilisateur a été bannie');
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
    }
}
