<?php

namespace Database\Seeders;

use App\Models\Barbershop;
use Illuminate\Database\Seeder;

class OperatingHourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $barbershops = Barbershop::all();

        foreach ($barbershops as $barbershop) {
            $barbershop->generateDefaultOperatingHours();
        }
    }
}
