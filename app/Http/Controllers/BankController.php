<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bank;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data =Bank::all();
        // $hello =Bank::where('id',3)->get();
        // return $hello;

        // $data = Bank::get();
        // return response($data);

        $banks = Bank::all();

        return response($banks, 200);

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
            $data = $request->validate([
                   'name' => 'required',
                   'title' => 'required',
            ]);

            $bank = Bank::create($data);

            return response($bank, 200);
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
        $data = $request->validate([
            'name' => 'required',
            'title' => 'required',
     ]);

     $bank = Bank::where('id',$id)->update($data, $id);

     return response($bank, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    //    $data = Bank::where('id',$id)->delete();
    //    return $data;

       $bank = Bank::find($id);
       $bank->delete();
       return response('bank deleted', 200);
    }

    public function get_bank_by_name($name)
    {
        $banks = Bank::where('name', $name)->get();
        return response($banks, 200);
    }
}

