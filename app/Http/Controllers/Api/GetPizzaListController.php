<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Pizza;
use Illuminate\Http\Request;

class GetPizzaListController extends Controller
{
    public function __invoke()
    {
        return response()->json(Pizza::with('sizes', 'ingredients', 'sizes.price')->get()->toArray());
    }
}
