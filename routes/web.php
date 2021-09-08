<?php

use App\Notifications\ImportantStockUpdate;
use Illuminate\Support\Facades\Route;
use Facades\App\Clients\ClientFactory;
use App\Models\User;
use App\Models\Stock;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/mail-preview', function () {
    $user = User::factory()->create();

    return (new ImportantStockUpdate(Stock::first()))->toMail($user);
});
