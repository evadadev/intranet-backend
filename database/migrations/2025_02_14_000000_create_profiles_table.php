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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('surname')->nullable();
            $table->string('dni')->nullable()->unique();
            $table->enum('identification', ['dni', 'nie', 'passport'])->nullable();
            $table->string('nationality')->nullable();
            $table->enum('maritalStatus', ['single', 'married', 'divorced', 'widower', 'other'])->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->date('birthDate')->nullable();
            $table->string('phone')->nullable();
            $table->string('residence')->nullable();
            $table->string('zipCode')->nullable();
            $table->string('province')->nullable();
            $table->string('locality')->nullable();
            $table->string('country')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
