<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Invoice;


class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Invoice::latest()->with('organ')->paginate(10);
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
            'org_id' => 'required'
        ]);

        return Invoice::create([
            'name' => $request['name'],
            'org_id' => $request['org_id'],
            'currency' => $request['currency']
        ]);   
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $invoice = Invoice::findOrFail($id);
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'org_id' => 'required'
        ]);
        $invoice->update($request->all());
        return ['message' => 'Invoice Updated Successfully'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);

        //Delete invoice
        $invoice->delete();

        return ["message" => "invoice deleted"];
    }

    public function search()
    {
        if ($search = \Request::get('q')) {
            $invoices = Invoice::where(function($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%");
            })->paginate(10);
        }
        else {
            $invoices = Invoice::latest()->paginate(10);
        }
        return $invoices;
    }
}
