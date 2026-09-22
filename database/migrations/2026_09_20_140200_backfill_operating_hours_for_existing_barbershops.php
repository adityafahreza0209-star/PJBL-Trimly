<?php

use App\Models\Barbershop;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Backfill all existing barbershops with default operating hours
        $barbershops = Barbershop::all();

        foreach ($barbershops as $barbershop) {
            $barbershop->generateDefaultOperatingHours();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No-op or optional cleanup
    }
};
