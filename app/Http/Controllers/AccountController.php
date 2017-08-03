<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use Auth;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('account.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'agency' => 'required',
            'number' => 'required',
            'bank' => 'required',
            'owner' => 'required'
        ]);

        $newAccount = new Account();
        $newAccount->agency = $request->input('agency');
        $newAccount->number = $request->input('number');
        $newAccount->bank = $request->input('bank');
        $newAccount->owner = $request->input('owner');
        $newAccount->user_id = Auth::user()->id;
        $newAccount->save();

        return redirect()->action('HomeController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $account = Account::find($id);

        $monthDescriptions = array(
            1 => "Janeiro",
            2 => "Fevereiro",
            3 => "Março",
            4 => "Abril",
            5 => "Maio",
            6 => "Junho",
            7 => "Julho",
            8 => "Agosto",
            9 => "Setembro",
            10 => "Outubro",
            11 => "Novembro",
            12 => "Dezembro"
        );

        $mes = $request->input('mes');

        if ($mes) {
            $movements = $account->movementsByMonth($mes);
            $monthDescription = $monthDescriptions[$mes];
        }else{
            $movements = $account->movements;
            $monthDescription = $monthDescriptions[intval(date('m'))];
        }
        
        return view('account.manage')->with('account', $account)
                                     ->with('movements', $movements)
                                     ->with('monthDescription', $monthDescription);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
