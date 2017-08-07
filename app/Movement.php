<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Account;

class Movement extends Model
{
    public static function lastMovementsInCurrentMonth()
    {
    	$accounts = Account::where('user_id', Auth::id())->get();
    	$lastMovements = [];

    	foreach ($accounts as $account) {
    		$lastMovements[] = Movement::where('account_id', $account->id)
    			->orderBy('created_at', 'desc')
    			->first();
    	}
    	
    	return $lastMovements;
    }

    public static function biggerDebitsInAccounts()
    {
    	$accounts = Account::where('user_id', Auth::id())->get();
    	$biggerDebits = [];
    	foreach ($accounts as $account) {
    		$biggerDebits[] = Movement::where('account_id', $account->id)
    			->where('type', 'SA')
    			->orderBy('value', 'desc')
    			->first();
    	}
    	
    	return $biggerDebits;
    }

    public static function biggerCreditsInAccounts()
    {
    	$accounts = Account::where('user_id', Auth::id())->get();
		$biggerCredits = [];
		
    	foreach ($accounts as $account) {
    		$biggerCredits[] = Movement::where('account_id', $account->id)
    			->where('type', 'EN')
    			->orderBy('value', 'desc')
    			->first();
    	}

    	return $biggerCredits;
    }
}
