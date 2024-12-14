<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            'customer_name' => 'Test Customer',
            'address' => 'Test Address',
            'phone' => '123456789',
            'email' => 'test@example.com',
        ]);
    }
}
