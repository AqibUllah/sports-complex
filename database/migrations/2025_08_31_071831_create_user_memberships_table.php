<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('user_memberships', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('membership_plan_id');
            $table->decimal('price_paid');
            $table->timestamp('valid_from');
            $table->timestamp('valid_until');
            $table->json('custom_details')->nullable();
            $table->enum('status',['active', 'expired', 'cancelled']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_memberships');
    }
};
