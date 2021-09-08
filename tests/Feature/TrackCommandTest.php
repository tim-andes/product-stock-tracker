<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use RetailerWithProductSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TrackCommandTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_tracks_product_stock()
    {
        $this->seed(RetailerWithProductSeeder::class);

        $this->assertFalse(Product::first()->inStock());

        $this->mockClientRequest();

        // When I trigger the php artisan track command
        // And assuming the stock is available now
        $this->artisan('track');

        // Then
        // The stock details should be refreshed
        $this->assertTrue(Product::first()->inStock());
    }
}
