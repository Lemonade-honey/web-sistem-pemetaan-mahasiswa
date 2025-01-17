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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('nim');
            $table->text('massage')->nullable();
            $table->text('transkip_scores')->nullable();
            $table->text('statistik_scores')->nullable();
            $table->text('path_transkip')->nullable();
            $table->text('transkip_badge')->nullable();
            $table->string('transkip_point')->nullable()->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
