<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['client', 'avocat', 'admin'])->default('client');
            $table->string('phone')->nullable();
            $table->string('specialty')->nullable(); // For lawyers
            $table->string('bar_number')->nullable(); // For lawyers
            $table->json('permissions')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'phone', 'specialty', 'bar_number', 'permissions']);
        });
    }
};
