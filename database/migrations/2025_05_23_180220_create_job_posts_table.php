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
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id(); // bigint unsigned auto-increment
            $table->string('title');
            $table->longText('content');
            $table->string('slug')->unique();
            $table->string('image');
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->date('publish_date')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('author_name')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_desc')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_posts');
    }
};
