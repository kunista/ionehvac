<?php

use Illuminate\Database\Seeder;
use App\Order;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = [
            [200],
            [300],
            [400],
        ];

        $count = count($orders);

        foreach ($orders as $key => $order) {
            Order::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'subtotal' => $order[0]
            ]);
            $count--;
        }
    }
}
