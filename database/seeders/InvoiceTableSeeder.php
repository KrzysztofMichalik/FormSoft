<?php

namespace Database\Seeders;

use App\Models\Invoice;
use Illuminate\Database\Seeder;

class InvoiceTableSeeder extends Seeder
{
    public function run(): void
    {
        Invoice::factory()
            ->count(1000)
            ->create();
    }
}
