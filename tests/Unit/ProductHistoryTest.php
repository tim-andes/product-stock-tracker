<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Product;
use App\Models\History;
use Facades\App\Clients\ClientFactory;
use App\Clients\StockStatus;
use Database\Seeders\RetailerWithProductSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductHistoryTest extends TestCase
{
    use RefreshDatabase;

    /** 
     * @test
     * @group Product
     *  */
    function it_records_history_each_time_stock_is_tracked()
    {
        // given i have stock at retailer
        $this->seed(RetailerWithProductSeeder::class);

        $this->mockClientRequest($available = True, $price = 9900);

        $product = tap(Product::first(), function ($product) {
            $this->assertCount(0, $product->history);

            $product->track();
    
            $this->assertCount(1, $product->refresh()->history);
        });

        $history = $product->history->first();

        $this->assertEquals($price, $history->price);
        $this->assertEquals($available, $history->in_stock);
        $this->assertEquals($product->id, $history->product_id);
        $this->assertEquals($product->stock[0]->id, $history->stock_id);

    }
}
