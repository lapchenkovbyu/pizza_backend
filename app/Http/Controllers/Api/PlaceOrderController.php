<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Order;
use App\Size;
use Carbon\Carbon;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlaceOrderController extends Controller
{
    public function __invoke(Request $request)
    {
        $ordered_pizzas = collect($request->get('sizes'))->map(function ($value) {
            $size = Size::findOrFail($value['size']);
            $quantity = $value['quantity'];
            $pizza = $size->pizza;

            return [
                'size' => $size,
                'pizza' => $pizza,
                'quantity'=>$quantity
            ];
        });
//        return \response()->json(json_encode($request->name));

        $order = Order::create([
            'full_name'=>$request->name,
            'address'=>$request->address,
            'delivery_date'=>(new Carbon())->parse($request->date)
        ]);

        foreach ($ordered_pizzas as $pizza) {
            DB::table('pizza_order_pivot')->insert(
                ['pizza_id' => $pizza['pizza']->id, 'size_id' => $pizza['size']->id, 'quantity' => $pizza['quantity'], 'order_id'=> $order->id]
            );
        }

    }
}
