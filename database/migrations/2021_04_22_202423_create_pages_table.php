<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->comment('pareil que id lorqu\'il y a pas de parent ');
            $table->integer('menu_position');
            $table->integer('sub_menu_position')->comment('0 si aucune page parent (id=parent_id)');
            $table->string('title');
            $table->string('slug')->unique()->comment('Le slug unique par page');
            $table->text('text');
            $table->boolean('is_active')->default(true)->comment('is_active=true si la page est active');
            $table->boolean('is_deleted')->default(false);
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
        Schema::dropIfExists('pages');
    }
}
