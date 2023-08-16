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
        Schema::create('visiteurs', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->string('nom');
            $table->string('prenom');
            $table->string('organisme');
            $table->string('cin')->unique();
            $table->string('email')->unique();
            $table->integer('tele');
            $table->string('ville');
            $table->string('genre');
            $table->unsignedBigInteger('responsable_id')->nullable();
             $table->foreign('responsable_id')->references('id')->on('users');
            $table->string('objet_visite')->default('OMPIC');
            $table->string('satisfaction')->default("Oui");
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};