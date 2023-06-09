<?php

namespace Database\Seeders;
use App\Models\Sendmessage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SendmessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sendmessage::factory()->count(500)->create();
    }
}
