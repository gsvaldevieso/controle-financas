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

    public function movementsByMonth($month)
    {
        $movements = Movement::where('account_id', $this->id)
                             ->whereMonth('date', '=', str_pad($month, 2, "0", STR_PAD_LEFT))
                             ->orderBy('date', 'desc')
                             ->get();
        return $movements;
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

    public function balanceInMonth($month)
    {
        $movements = $this->movements;
        $balance = 0.0;

        foreach($movements as $movement)
        {
            $movementMonth = date('m', strtotime($movement->date));
            $movementYear = date('Y', strtotime($movement->date));
            if($movementMonth != $month || $movementYear != date('Y'))
                continue;

            if($movement->type === 'EN'){
                $balance += $movement->value;
                continue;
            }
            
            $balance -= $movement->value;
        }

        return $balance;
    }
}
