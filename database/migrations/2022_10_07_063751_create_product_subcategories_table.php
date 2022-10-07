<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_subcategories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('nom de la sous categorie');
            $table->string('slug')->unique()->comment('Le slug unique par catégorie');
            $table->string('icon');
            $table->text('description');
            $table->boolean('is_active')->default(true)->comment('is_active=true si la sous categorie est active');
            $table->boolean('is_deleted')->default(false);
            $table->unsignedBigInteger('product_category_id');
            $table->foreign('product_category_id')
                ->references('id')
                ->on('product_categories');
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
        Schema::dropIfExists('product_subcategories');
    }
};
