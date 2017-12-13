<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /*
    * Dump the essential details of products to the page
    * Used when practicing queries and you want to quickly see the products in the database
    * Can accept a Collection of products, or if none is provided, will default to all products
    */
    public static function dump($products = null)
    {
        $data = [];

        if (is_null($products)) {
            $products = self::all();
        }

        foreach ($products as $product) {
            $data[] = $product->name.' by '.$product->description;
        }

        dump($data);
    }

    public function orders()
    {
        return $this->belongsToMany('App\Order')->withTimestamps();
    }

    public function priceFormatted()
    {
        return number_format($this->price, 2);


    }
}
