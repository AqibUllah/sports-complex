<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('tim_slot_id')->constrained('time_slots')->onDelete('cascade');
            $table->foreignId('user_membership_id')->nullable()->constrained('user_memberships')->onDelete('set null');
            $table->unsignedBigInteger('number_of_people')->default(1);
            $table->enum('status',['confirmed', 'cancelled', 'completed', 'no_show']);
            $table->decimal('total_amount',10,2);
            $table->text('special_requests')->nullable();
            $table->text('cancellation_reason')->nullable();
            $table->timestamps();

            // Indexes for performance
            $table->index('status');
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
