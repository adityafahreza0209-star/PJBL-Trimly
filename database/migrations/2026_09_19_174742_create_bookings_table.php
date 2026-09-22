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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_code')->unique();
            $table->foreignId('barbershop_id')->constrained()->cascadeOnDelete();
            $table->foreignId('customer_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('capster_id')->nullable()->constrained('capsters')->nullOnDelete();
            $table->foreignId('service_id')->constrained()->restrictOnDelete();
            $table->date('booking_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->unsignedBigInteger('total_amount');
            $table->unsignedBigInteger('dp_amount');
            $table->enum('payment_status', ['unpaid', 'dp_paid', 'paid', 'refunded'])->default('unpaid');
            $table->enum('booking_status', ['pending', 'confirmed', 'completed', 'cancelled'])->default('pending');
            $table->integer('reschedule_count')->default(0);
            $table->text('cancellation_reason')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};