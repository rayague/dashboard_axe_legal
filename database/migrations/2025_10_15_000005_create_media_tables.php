<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('media_files', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('file_path');
            $table->string('mime_type');
            $table->string('collection'); // e.g., 'documents', 'images', 'videos'
            $table->unsignedBigInteger('size_in_bytes');
            $table->json('metadata')->nullable();
            $table->foreignId('uploaded_by')->constrained('users');
            $table->boolean('is_public')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('media_folders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('parent_id')->nullable()->constrained('media_folders')->onDelete('cascade');
            $table->foreignId('created_by')->constrained('users');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('media_shares', function (Blueprint $table) {
            $table->id();
            $table->foreignId('media_file_id')->constrained()->onDelete('cascade');
            $table->string('token')->unique();
            $table->timestamp('expires_at')->nullable();
            $table->integer('download_limit')->nullable();
            $table->integer('download_count')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('media_shares');
        Schema::dropIfExists('media_folders');
        Schema::dropIfExists('media_files');
    }
};