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
            $table->string('title', 200);
            $table->decimal('price', 12, 2);
            $table->string('property_type', 50);
            $table->string('listing_type', 20);
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->decimal('area', 10, 2)->nullable();
            $table->string('city', 100);
            $table->string('address', 255)->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('status', 20)->default('available');
            $table->timestamps();

            // Indexes
            $table->index('status');
            $table->index('city');
            $table->index('price');
            $table->index('property_type');
            $table->index('listing_type');
            $table->index('user_id');
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
