<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Stock;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function track()
    {
        $this->stock->each->track();
    }

    public function inStock()
    {
        return $this->stock()->where('in_stock', true)->exists();
    }

    public function history()
    {
        return $this->hasMany(History::class);
    }
    
    public function stock()
    {
        return $this->hasMany(Stock::class);
    }
}
