<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Product;
use \Cart as Cart;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $cartItems = Cart::content();



        # Add new order to the database

        $cartSubTotal = Cart::subtotal(0, null , "");
        $product_ids = array();
        foreach ($cartItems as $item) {
            $product_ids[] = $item->id;
        }


        $order = new Order();
        $order->subtotal= $cartSubTotal;

        $order->user_id = $request->user()->id;
        $order->save();

        $order->products()->sync($product_ids);
        $order->user_id = $request->user()->id;
        Cart::destroy();
        return redirect('order')->with('alert', 'Your order has been placed.');

    }

    public function index(Request $request)
    {
        $user = $request->user();

        if ($user) {
            $orders = $user->orders()->get();


        }
        else {
            $orders = [];

        }

        return view('order.index')->with([
            'orders' => $orders,
        ]);
    }



}
