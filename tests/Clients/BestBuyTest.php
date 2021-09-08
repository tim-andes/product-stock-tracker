<?php

namespace Tests\Clients;

use Tests\TestCase;
use App\Clients\BestBuy;
use App\Models\Stock;
use Illuminate\Support\Facades\Http; 
use Database\Seeders\RetailerWithProductSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * @group api
 */
class BestBuyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_tracks_a_product()
    {
        // given I have a product
        $this->seed(RetailerWithProductSeeder::class);
        
        // with stock at bestbuy
        $stock = tap(Stock::first())->update([
            'sku' => '6364253', // Nintendo Switch SKU
            'url' => 'https://www.bestbuy.com/site/nintendo-switch-32gb-console-gray-joy-con/6364253.p?skuId=6364253'
        ]);

        // if I use the BestBuy client to track that stock
        try {
            (new BestBuy())->checkAvailability($stock);
        } catch (\Exception $e) {
            $this->fail('Failed to track the BestBuy API properly: ' . $e->getMessage());
        }
        // just to force test to function
        $this->assertTrue(true);
        }

        /** @test */
        function it_creates_the_proper_stock_status_response() {
            Http::fake(fn() => ['salePrice' => 299.99, 'onlineAvailability' => true]);

            $stockStatus = (new BestBuy())->checkAvailability(new Stock);

            $this->assertEquals(29999, $stockStatus->price);
            $this->assertTrue($stockStatus->available);        
    }
}
