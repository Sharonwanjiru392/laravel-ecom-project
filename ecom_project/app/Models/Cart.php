<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->hasOne('App\models\User','id','user_id');
    }

    public function product()
    {
        return $this->hasOne('App\models\product','id','product_id');
    }
}
