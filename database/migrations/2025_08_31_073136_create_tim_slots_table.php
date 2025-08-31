<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tim_slots', function (Blueprint $table) {
            $table->id();
            $table->foreignId('facility_id')->constrained('facilities', 'facility_id')->onDelete('cascade');

            // Timing of the slot
            $table->dateTime('start_time');
            $table->dateTime('end_time');

            // Capacity Management
            $table->unsignedBigInteger('max_capacity');
            $table->unsignedBigInteger('available_spots'); // This will be updated by your application logic

            // Pricing
            $table->string('price'); // 10 total digits, 2 after the decimal

            // Availability Flag
            $table->boolean('is_available');

            // timestamps
            $table->timestamps();


            // Indexes for better query performance
            $table->index(['facility_id', 'start_time']);
            $table->index('is_available');
            $table->index('available_spots');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tim_slots');
    }
};
