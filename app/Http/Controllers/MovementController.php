<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movement;
use Auth;

class MovementController extends Controller
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
        //
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
            'description' => 'required',
            'value' => 'required',
            'type' => 'required',
            'date' => 'required'
        ]);

        $newMovement = new Movement();
        $newMovement->description = $request->input('description');
        $newMovement->value = $request->input('value');
        $newMovement->type = $request->input('type');
        $newMovement->date = $request->input('date');
        $newMovement->account_id = $request->input('account');
        $newMovement->user_id = Auth::user()->id;        
        $newMovement->save();

        $parsedDate = date_parse_from_format("Y-m-d", $newMovement->date);

        return redirect()->action(
            'AccountController@show', 
            [
                'id' => $request->input('account'),
                'month' => $parsedDate['month']
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        Movement::find($id)->delete();
    }
}
