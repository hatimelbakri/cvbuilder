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
        Schema::create('infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('cv_id')->constrained('cvs')->onDelete('cascade');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('adress');
            $table->string('city');
            $table->string('codepostal');
            $table->string('image')->nullable();
            $table->string('edit')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infos');
    }
};
