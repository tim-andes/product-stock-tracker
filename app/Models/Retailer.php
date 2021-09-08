<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Facades\App\Clients\ClientFactory;

class Retailer extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function addStock(Product $product, Stock $stock)
    {
        $stock->product_id = $product->id;
        
        $this->stock()->save($stock); // will add retailer_id due to eloquent hasMany relationship below
    }

    /**
     * Get the stock associated with the retailer.
     */
    public function stock()
    {
        return $this->hasMany(Stock::class);
    }

    public function client()
    {
        return ClientFactory::make($this);
    }
}
