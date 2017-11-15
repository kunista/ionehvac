<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            ['Frigidaire FG7TC', "Frigidaire's FG7TC gas furnace offers two-stage performance with a variable-speed motor designed for precise comfort control and quiet airflow. The blower's insulated compartment contributes to the overall quiet performance, while the blower's 30-second delay provides warm duct temperature.", 632],
            ['Goodman GMEC96', "The Goodman GMEC96 provides two-stage heat with a multi-speed ECM blower. Its multi-position configuration, along with optional side venting and left or right connection for gas and electrical service, provides increased installation options." , 1222],
            ['Frigidaire FG7MQ', "The Frigidaire FG7MQ is an iQ Drive modulating gas furnace which analyzes the temperature every 60 seconds and adjusts itself accordingly. The unit's iQ Drive controller offers fully programmable comfort along with as well as maintenance and troubleshooting diagnostics.", 1128],
            ];

        $count = count($products);

        foreach ($products as $key => $product) {
            Product::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'name' => $product[0],
                'description' => $product[1],
                'price' => $product[2]
            ]);
            $count--;
        }
    }
}
