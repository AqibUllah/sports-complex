<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('membership_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('facility_id')->constrained('facilities')->cascadeOnDelete();
            $table->decimal('price',10,2);
            $table->enum('duration_type',['per_visit','monthly','yearly','custom'])->nullable();
            $table->integer('duration_value')->nullable(); // (NULL if per_visit, else number of days/months)
            $table->text('details')->nullable();
            $table->integer('max_visits')->nullable();
            $table->integer('max_visits_per_day')->nullable();
            $table->integer('max_visits_per_month')->nullable();
            $table->integer('max_visits_per_year')->nullable();
            $table->boolean('status');
            $table->timestamps();

            // column indexes for better query performance:
            $table->index('duration_type');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('membership_plans');
    }
};
