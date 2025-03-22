<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tenues', function (Blueprint $table) {
            $table->string('league')->nullable();
            $table->string('equipe')->nullable();
            $table->integer('quantite')->default(0);
            $table->enum('statut', ['published', 'pending', 'archive'])->default('pending');
            $table->decimal('premier_prix', 8, 2)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tenues', function (Blueprint $table) {
            $table->dropColumn(['league', 'equipe', 'quantite', 'statut', 'premier_prix']);
        });
    }
};
