<?php

use Illuminate\Database\Seeder;
use App\Order;
use App\Product;

class OrderProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # First, create an array of all the books we want to associate tags with
        # The *key* will be the book title, and the *value* will be an array of tags.
        # Note: purposefully omitting the Harry Potter books to demonstrate untagged books

        $products =[
            'Frigidaire FG7TC' => [1,2],
            'Goodman GMEC96' => [3],
            'Frigidaire FG7MQ' => [1]
        ];

        # Now loop through the above array, creating a new pivot for each book to tag
        foreach ($products as $name => $orders) {
            # First get the product
            $product = Product::where('name', 'like', $name)->first();

            # Now loop through each tag for this book, adding the pivot
            foreach ($orders as $orderId) {
                $order = Order::find($orderId);
                dump($product->name. 'connect to '. $orderId);

                # Connect this order to this product
                $product->orders()->save($order);
            }
        }
    }
}
