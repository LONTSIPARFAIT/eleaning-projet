<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cours_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->foreignId('lesson_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('quizzes');
    }
};
