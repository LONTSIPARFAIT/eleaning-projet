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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            // $table->unsignedBigInteger('role_id')->nullable();
            $table->string('role')->default('student');
            $table->date('date_de_naissance')->nullable();
            $table->string('lieu_de_naissance')->nullable();
            $table->string('sexe')->nullable(); // 'homme', 'femme', 'autre'
            $table->integer('age')->nullable(); // Vous pouvez le calculer plus tard
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
};
