<?php

namespace App\Clients;

use App\Models\Stock;
use App\Clients\StockStatus;
use Illuminate\Support\Facades\Http;

class Target implements Client
{
    public function checkAvailability(Stock $stock): StockStatus
    {
        //
    }
}