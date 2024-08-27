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
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('company_name')->nullable();
            $table->string('email')->unique();
            $table->foreign('email')->references('email')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('phone')->unique()->nullable();
            $table->string('address')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_active')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};
