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
        Schema::table('formations', function (Blueprint $table) {
            $table->foreignId('category_id')->nullable()->after('id')->constrained('formation_categories')->onDelete('set null');
            $table->integer('nombre_lecons')->nullable()->after('duree');
            $table->string('image')->nullable()->after('titre');
            $table->boolean('populaire')->default(false)->after('objectifs');
            $table->decimal('note', 2, 1)->default(0)->after('populaire'); // Note sur 5
            $table->integer('nombre_avis')->default(0)->after('note');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('formations', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn(['category_id', 'nombre_lecons', 'image', 'populaire', 'note', 'nombre_avis']);
        });
    }
};
