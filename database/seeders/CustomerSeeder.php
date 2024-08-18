<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\User;
class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User:factory()->create([
            'name'=> 'Test User',
            'email' => 'test@example.com',
        ]);

        Customer::factory(20)->create();
    }
}
