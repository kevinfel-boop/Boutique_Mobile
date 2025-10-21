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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); //Liaison clés etrangère(foreignId) et constrained() c'est pour la contrainte et onDelete c'est pour suprimer si la categorie n'existe plus
            $table->string('image')->nullable(); //Ce qui veut dire qu'il peuvent etre nul(ne rien contenir)
            $table->text('desciption')->nullable();
            $table->boolean('news')->default(false);
            $table->float('price', 10, 2); //max 10 caractere et 2 nombre après la virgule 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
