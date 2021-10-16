<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $test = Test::all();

        return response($test, 200);
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
            'year' => 'required',
     ]);

     $test = Test::create($data);

     return response($test, 200);
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
            'year' => 'required',
     ]);

     $test = Test::where('id',$id)->update($data, $id);

     return response($test, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $test = Test::find($id);
        $test->delete();
        return response('bank deleted', 200);
    }

    public function get_test_by_year($year)
    {
        $test = Test::where('year', $year)->get();
        return response($test, 200);
    }

    public function get_login(Request $request)
    {
        $login_details = $request->only('name' , 'password');

        // return $login_details;

        if(Auth::attempt($login_details))
        {
           return response()->json(['message' => 'login is ok', 'code' => 200]);
        }
        else
        {
            return response()->json(['message' => 'login is wrong', 'code' => 501]);
        }
    }
}
