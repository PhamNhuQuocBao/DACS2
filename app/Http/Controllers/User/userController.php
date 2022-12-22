<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $list = DB::table('typelists')->get();
        return view('UI.home_User', [
            'list' => $list
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        //
        $results = DB::table('books')->where('id', $id)->first();
        $select = DB::select('SELECT * FROM sachtonkho WHERE id = ' . $id);
        $lists = DB::table('typelists')->get();
        return view('UI.details_User', [
            'results' => $results,
            'amount' => $select[0],
            'lists' => $lists
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function types(Request $request)
    {
        //
        $results = DB::table('books')->Where('idtype', $request->type)->paginate(15);
        // dd($results);
        return view('UI.list_User', [
            'results' => $results
        ]);
    }

    public function books(Request $request)
    {
        //
        // $sql = $request->search;
        // $results = DB::select($sql);
        $results = DB::table('books')->orWhere('name', 'LIKE', '%' . $request->search . '%')->paginate(15);
        // dd($results);
        return view('UI.list_User', [
            'results' => $results
        ]);
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
