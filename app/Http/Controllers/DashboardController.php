<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movement;
use App\User;

class DashboardController extends Controller
{
    public function index()
    {
    	$movements = Movement::lastMovementsInCurrentMonth();
    	$accounts = User::getAllAccounts();
    	$biggerDebits = Movement::biggerDebitsInAccounts();
    	$biggerCredits = Movement::biggerCreditsInAccounts();

    	return view('dashboard.index')->with('movements', $movements)
    		->with('accounts', $accounts)
    		->with('debits', $biggerDebits)
    		->with('credits', $biggerCredits);
    }		
}
