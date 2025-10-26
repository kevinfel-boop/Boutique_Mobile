<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Ajouter la colonne stock avec une valeur par défaut
            $table->integer('stock')->default(0)->after('price');

            // Ajouter la colonne is_new (boolean)
            $table->boolean('is_new')->default(false)->after('stock');

            // Optionnel : Ajouter d'autres colonnes si nécessaire
            $table->boolean('is_featured')->default(false)->after('is_new');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['stock', 'is_new', 'is_featured']);
        });
    }
};
