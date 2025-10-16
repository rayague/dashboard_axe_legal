<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->enum('event_type', ['in-person', 'webinar', 'hybrid'])->default('in-person');
            $table->string('webinar_link')->nullable();
            $table->string('replay_url')->nullable();
            $table->json('materials')->nullable(); // For documents and resources
            $table->integer('max_participants')->nullable();
            $table->json('metadata')->nullable(); // For additional settings
        });

        Schema::create('event_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('registration_status')->default('registered');
            $table->boolean('attended')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('event_registrations');
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn(['event_type', 'webinar_link', 'replay_url', 'materials', 'max_participants', 'metadata']);
        });
    }
};
