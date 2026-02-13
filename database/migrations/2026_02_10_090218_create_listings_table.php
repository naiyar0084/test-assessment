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
        
    Schema::create('listings', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->cascadeOnDelete();

    $table->string('title')->index();
    $table->text('description');

    $table->string('category')->index();
    $table->string('city')->index();
    $table->string('suburb')->index();

    $table->enum('pricing_model', ['hourly', 'fixed'])->index();
    $table->decimal('price', 10, 2);

    $table->enum('status', [
        'draft',
        'pending',
        'approved',
        'suspended'
    ])->index();

    $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
