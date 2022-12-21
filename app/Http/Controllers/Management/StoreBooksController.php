<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreBooksController extends Controller
{
    public function index()
    {
        $sql = 'SELECT * FROM sachtonkho';
        $result = DB::select($sql);
        return view('Management.inventory', [
            'results' => $result
        ]);
    }
}
