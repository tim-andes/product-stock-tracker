<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;

class TrackCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'track';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Track all product stock.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $products = Product::all();

        $this->output->progressStart(count($products));

        // track each product while ticking progress bar
        $products->each(function ($product) {
            $product->track();

            $this->output->progressAdvance();
        });

        // output the results as a table
        $this->showResults();
    }

    protected function showResults(): void
    {
        $this->output->progressFinish();

        $data = Product::query()
            ->leftJoin('stock', 'stock.product_id', '=', 'products.id')
            ->get($this->keys());

    $this->table(
        array_map('ucwords', $this->keys()),
        $data
    );            
    }

    protected function keys(): array
    {
        return ['name', 'price', 'url', 'in_stock'];    
    }
}
