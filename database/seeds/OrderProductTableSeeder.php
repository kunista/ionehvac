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
        $products =[
            'Frigidaire FG7TC' => [1,2],
            'Goodman GMEC96' => [3],
            'Frigidaire FG7MQ' => [1]
        ];

        foreach ($products as $name => $orders) {
            $product = Product::where('name', 'like', $name)->first();

            foreach ($orders as $orderId) {
                $order = Order::find($orderId);

                $product->orders()->save($order);
            }
        }
    }
}
