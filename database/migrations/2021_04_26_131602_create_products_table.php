<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique()->comment('Le slug unique par page');
            $table->text('description');
            $table->decimal('price');
            $table->decimal('weight');
            $table->integer('quantity');
            $table->integer('quantity_alert');
            $table->integer('image');
            $table->boolean('is_promoted')->default(false)->comment('is_active=true si le produit est en promotion');
            $table->boolean('is_active')->default(true)->comment('is_active=true si le produit est actif');
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
        Schema::dropIfExists('products');
    }
}
