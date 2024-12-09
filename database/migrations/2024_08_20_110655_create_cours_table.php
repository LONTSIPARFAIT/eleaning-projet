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
            // database/migrations/YYYY_MM_DD_HHMMSS_create_courses_table.php
        Schema::create('cours', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->integer('duration'); 
            $table->decimal('price', 8, 2);
            $table->unsignedBigInteger('teacher_id')->nullable(); // Ajoutez la colonne teacher_id
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cours');
    }
};
