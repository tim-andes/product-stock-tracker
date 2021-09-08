<?php

namespace Database\Seeders;
use App\Models\Product;
use App\Models\Stock;
use App\Models\User;
use App\Models\Retailer;
use Illuminate\Database\Seeder;

class RetailerWithProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Given 
        // Create Product
        $switch = Product::create(['name' => 'Nintendo Switch']);

        // Create Retailer
        $bestBuy = Retailer::create(['name' => 'Best Buy']);

        // Create Supply
        $bestBuy->addStock($switch, New Stock([
            'price' => 10000,
            'url' => 'http://foo.com',
            'sku' => '12345',
            'in_stock' => false
        ]));

        User::factory()->create(['email' => 'jeffrey@example.com']);
    }
}
