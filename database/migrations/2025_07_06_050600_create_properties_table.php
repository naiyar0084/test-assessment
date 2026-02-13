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
        Schema::create('properties', function (Blueprint $table) {

            $table->id();
            // Basic Info
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();

            // Property Type & Classification
            $table->enum('label', ['For Sell', 'For Rent', 'For Purchase'])->default('For Sell');
            $table->enum('segment', ['Residential', 'Commercial'])->default('Residential'); // Main category
            $table->enum('type', [
                'DDA Flats', 'Builder Floors', 'Farmhouse', 'Kothi', 'Villa', 'Flats',
                'Hotels', 'Office Space', 'Warehouses', 'Shops', 'Showrooms'
            ])->default('Villa'); // Sub-type

            // Price & Area
            $table->decimal('price', 15, 2)->nullable();
            $table->string('area')->nullable(); // e.g., "1000 Sqft" or "2 Acres"

            // Location
            $table->text('location')->nullable();

            // Room Details
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->integer('balconies')->nullable();
            $table->integer('kitchen')->nullable();
            $table->boolean('dining_hall')->default(false);    
            // Floor Info
            $table->integer('floor_no')->nullable();
            $table->integer('total_floors')->nullable();
            // Furnishing & Parking
            $table->enum('furnishing', ['Unfurnished', 'Semi-Furnished', 'Fully Furnished'])->nullable();
            $table->boolean('parking')->default(false);

            // Main Image
            $table->string('image')->nullable(); // Main image
            // Optional: gallery_images can be stored as JSON or in a separate table

            // Status
            $table->enum('status', ['draft', 'published'])->default('draft');

            // Timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
