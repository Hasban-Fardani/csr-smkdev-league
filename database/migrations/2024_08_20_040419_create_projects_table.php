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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->timestamp('start_date');
            $table->timestamp('end_date');
            $table->date('published_date')->nullable();
            $table->boolean('is_published')->default(0);
            $table->foreignId('sector_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('sector_program_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('subdistrict_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
