<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Product;
use \Cart as Cart;

class OrderController extends Controller
{
    public function store()
    {
        /*$this->validate($request, [
            'title' => 'required|min:3',
            'author' => 'required',
            'published' => 'required|min:4|numeric',
            'purchase_link' => 'required|url',
            'cover' => 'required|url',
        ]);*/

        $cartItems = Cart::content();



        # Add new order to the database

        $CartSubTotal = Cart::subtotal(0, null , "");
        $product_ids = array();
        foreach ($cartItems as $item) {
            $product_ids[] = $item->id;
        }


        $order = new Order();
        $order->subtotal= $CartSubTotal;

        # Note: Not using the Eloquent `associate` method to connect book to authors
        # Why: because it would require an additional query to get the Author object
        # We already know the author id (it's in the request) so we just use that and
        # "manually" set the `author_id` for this book

        $order->save();

        # Note: You have to sync the tags *after* the book as been added to the database
        # This is because you need a `book_id` to create a relationship with a tag in the
        # `book_tag` pivot table, and the `book_id` will not exist until after the book is added
        $order->products()->sync($product_ids);

        Cart::destroy();
        return redirect('cart')->withSuccessMessage('Your order has been placed and cart has been cleared!');

    }
}
