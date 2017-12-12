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
        $order->user_id = $request->user()->id;
        $order->save();

        # Note: You have to sync the tags *after* the book as been added to the database
        # This is because you need a `book_id` to create a relationship with a tag in the
        # `book_tag` pivot table, and the `book_id` will not exist until after the book is added
        $order->products()->sync($product_ids);
        $order->user_id = $request->user()->id;
        Cart::destroy();
        return redirect('order')->with('alert', 'Your order has been placed.');

    }

    public function index(Request $request)
    {
        $user = $request->user();

        # Note: We're getting the user from the request, but you can also get it like this:
        //$user = Auth::user();

        if ($user) {
            # Approach 1)
            //$books = Book::where('user_id', '=', $user->id)->orderBy('title')->get();

            # Approach 2) Take advantage of Model relationships
            $orders = $user->orders()->get();

            # Get 3 most recently added books
        }
        else {
            $orders = [];

        }

        return view('order.index')->with([
            'orders' => $orders,
        ]);
    }



}
