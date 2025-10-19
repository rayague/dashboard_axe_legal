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
        Schema::create('document_requests', function (Blueprint $table) {
            $table->id();
            $table->string('document_type'); // immobilier, travail, entreprise
            $table->string('document_title'); // Titre du document demandé
            $table->string('nom');
            $table->string('prenom');
            $table->string('email');
            $table->string('telephone');
            $table->string('entreprise')->nullable();
            $table->text('description'); // Détails de la demande
            $table->enum('statut', ['en_attente', 'en_cours', 'traite', 'rejete'])->default('en_attente');
            $table->text('note_admin')->nullable(); // Notes internes
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_requests');
    }
};
