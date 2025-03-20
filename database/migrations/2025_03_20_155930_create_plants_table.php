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
        Schema::create('plants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('binomial_name');
            $table->decimal('price', 8, 2);
            $table->string('img_url');
            $table->integer('waterings_per_week');
            $table->enum('fertilizer_type', ['nitrogen', 'phosphorus']);
            $table->integer('height_in_cm');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plants');
    }
};
