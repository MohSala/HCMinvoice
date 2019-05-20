<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $invoice = \App\Item::where('id','')->get();
        // return Item::where('invoice_id',$request->id)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'quantity' => 'required|integer',
            'unitcost' => 'required|decimal',
            'discount' => 'required|decimal'
        ]);

        return Item::create([
            'name' => $request['name'],
            'currency' => $request['currency'],
            'quantity' => $request['quantity'],
            'unitcost' => $request['unitcost'],
            'discount' => $request['discount'],
            // 'org_id' => $request['org_id'],
            'invoice_id' => $request['invoice_id'],

        ]);
        // return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Item::where('invoice_id', $id)->get();
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
