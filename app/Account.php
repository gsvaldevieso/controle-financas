<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Movement;

class Account extends Model
{
    public function movements()
    {
        return $this->hasMany('App\Movement');
    }

    public function balance()
    {
        $movements = $this->movements;
        $balance = 0.0;

        foreach($movements as $movement)
        {
            if($movement->type === 'EN'){
                $balance += $movement->value;
                continue;
            }
            
            $balance -= $movement->value;
        }

        return $balance;
    }
}
