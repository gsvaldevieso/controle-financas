<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public function movements()
    {
        return $this->hasMany('App\Movement');
    }
}
