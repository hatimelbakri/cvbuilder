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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('cv_id')->constrained('cvs')->onDelete('cascade');
            $table->string('name');
            $table->string('company_name');
            $table->string('type_employment');
            $table->text('description')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->boolean('current_position')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
