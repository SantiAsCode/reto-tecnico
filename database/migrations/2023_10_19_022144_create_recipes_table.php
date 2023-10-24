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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedFloat('tomato', 2, 1)->default(0);
            $table->unsignedFloat('lemon', 2, 1)->default(0);
            $table->unsignedFloat('potato', 2, 1)->default(0);
            $table->unsignedFloat('rice', 2, 1)->default(0);
            $table->unsignedFloat('ketchup', 2, 1)->default(0);
            $table->unsignedFloat('lettuce', 2, 1)->default(0);
            $table->unsignedFloat('onion', 2, 1)->default(0);
            $table->unsignedFloat('cheese', 2, 1)->default(0);
            $table->unsignedFloat('meat', 2, 1)->default(0);
            $table->unsignedFloat('chicken', 2, 1)->default(0);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
