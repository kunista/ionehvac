<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function products()
    {
        return $this->belongsToMany('App\Product')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function subtotalFormatted()
    {
        return number_format($this->subtotal, 2);


    }
}
