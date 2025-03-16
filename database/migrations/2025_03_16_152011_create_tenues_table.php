<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenuesTable extends Migration
{
    public function up()
    {
        Schema::create('tenues', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->text('description')->nullable();
            $table->decimal('prix', 8, 2);
            $table->foreignId('categorie_id')->constrained()->onDelete('cascade');
            $table->string('taille');
            $table->string('couleur');
            $table->boolean('disponible')->default(true);
            $table->string('image')->nullable();
            $table->date('date_creation');
            $table->string('materiau');
            $table->string('marque');
            $table->string('reference');
            $table->integer('promotion')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tenues');
    }
}
