<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Statistical extends Controller
{
    public function index()
    {
        $sql = "select * from v_soluongtheloai";
        $datas = DB::select($sql);
        // dd($datas);
        return view('management.typeBooks.index', [
            'datas' => $datas,
            'title' => 'Thống kê số lượng sản phẩm theo danh mục'
        ]);
    }
}
