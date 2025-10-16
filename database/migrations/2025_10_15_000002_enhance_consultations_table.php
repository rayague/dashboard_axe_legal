<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('consultations', function (Blueprint $table) {
            $table->foreignId('lawyer_id')->nullable()->constrained('users');
            $table->foreignId('service_id')->nullable()->constrained('services');
            $table->enum('status', ['pending', 'approved', 'scheduled', 'completed', 'cancelled'])->default('pending');
            $table->text('outcome')->nullable();
            $table->string('consultation_type')->nullable();
            $table->json('metadata')->nullable(); // For additional fields
        });
    }

    public function down()
    {
        Schema::table('consultations', function (Blueprint $table) {
            $table->dropForeign(['lawyer_id', 'service_id']);
            $table->dropColumn(['lawyer_id', 'service_id', 'status', 'outcome', 'consultation_type', 'metadata']);
        });
    }
};