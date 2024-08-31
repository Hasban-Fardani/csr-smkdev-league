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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->json('files');
            $table->string('title');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('funds')->nullable();
            $table->enum('status',['draf','ditolak','revisi','diterima'])->default('draf');
            $table->boolean('is_submitted')->default(false);
            $table->date('realization_date')->nullable();
            $table->foreignId('project_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('partner_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
