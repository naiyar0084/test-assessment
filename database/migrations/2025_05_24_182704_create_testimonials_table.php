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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('post')->nullable(); // e.g., CEO, Manager
            $table->string('location')->nullable();
            $table->unsignedTinyInteger('star')->default(5); // 1 to 5
            $table->text('review');
            $table->string('image')->nullable(); // path to image
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->integer('display_order')->default(0); // for sorting
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
