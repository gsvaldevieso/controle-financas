<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\City;

class CitiesController extends Controller
{
    public function getState($state)
    {
    	$cities = City::where('state_id', $state)->get();
    	return $cities->toJson();
    }
}
