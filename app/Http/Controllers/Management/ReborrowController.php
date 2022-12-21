<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReborrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $result = DB::table('reborrows')->paginate(6);

        return view('Management.managementReborrow', [
            'result' => $result,
            'title' => 'Quản lí thẻ mượn trả'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Management.ReborrowForm.addReborrow', [
            'title' => 'Thêm thẻ mượn trả'
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
        // $borrowAmount = DB::table('books')->where('id', $request->idBook)->value('amount');
        // $borrowName = DB::table('books')->where('id', $request->idBook)->value('name');
        $sql = 'SELECT * FROM sachtonkho WHERE id =' . $request->idBook;
        $result = DB::select($sql);


        if ($request->validate([
            'id'  => 'required|string',
            'idBook' => 'required|string|max:30',
            'deadline' => 'required|date',
        ])) {
            $checkIdBook = DB::table('books')->where('id', $request->idBook)->value('id');
            $checkIdReader = DB::table('readers')->where('id', $request->idReader)->value('id');
            if ($checkIdBook == $request->idBook) {
                if ($checkIdReader == $request->idReader) {
                    if ($result[0]->store >= $request->amount) {

                        DB::table('reborrows')->insert([
                            'id' => $request->id,
                            'idReader' => $request->idReader,
                            'idBook' => $request->idBook,
                            'deadline' => $request->deadline,
                            'dateBorrow' => $request->dateBorrow,
                            'amount' => $request->amount,
                            'returned' => 0
                        ]);
                    } else {
                        session()->flash('error', 'Số sách trong kho chỉ còn ' . $result[0]->store . '-không đủ!!!');
                        return redirect()->back();
                    }
                } else {
                    session()->flash('error', 'Mã độc giả này không tồn tại');
                    return redirect()->back();
                }
            } else {
                session()->flash('error', 'Mã sách này không tồn tại');
                return redirect()->back();
            }
            session()->flash('status', 'Thêm thành công!');
            return redirect()->route('managementReborrow.index');
        }
        session()->flash('error', 'Yêu cầu nhập đầy đủ thông tin');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function returned($id)
    {
        //
        DB::table('reborrows')->where('id', $id)->update([
            // 'id' => $id,
            // 'idReader' => $request->idReader,
            // 'idBook' => $request->idBook,
            // 'deadline' => $request->deadline,
            // 'dateBorrow' => $request->dateBorrow,
            // 'amount' => $request->amount,
            'returned' => 1
        ]);

        return redirect()->route('managementReborrow.index');
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
        // $card = DB::table('reborrows')->where('id', $id)->get();
        $card = DB::table('reborrows')->where('id', $id)->first();

        return view('Management.ReborrowForm.updateReborrow', [
            'reborrow' => $card,
            'tittle' => 'Chỉnh sửa thẻ mượn trả'
        ]);
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
        if ($request->validate([
            'id'  => 'required|string',
            'idBook' => 'required|string|max:30',
            'deadline' => 'required|date',
        ])) {
            $checkIdBook = DB::table('books')->where('id', $request->idBook)->value('id');
            if ($checkIdBook == $request->idBook) {
                //update reborrow
                DB::table('reborrows')->where('id', $id)->update([
                    'id' => $id,
                    'idReader' => $request->idReader,
                    'idBook' => $request->idBook,
                    'deadline' => $request->deadline,
                    'dateBorrow' => $request->dateBorrow,
                    'amount' => $request->amount,
                ]);
            } else {
                session()->flash('error', 'Mã sách này không tồn tại');
                return redirect()->back();
            }
            return redirect()->route('managementReborrow.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
        DB::table('reborrows')->where('id', $id)->delete();
        return redirect()->route('managementReborrow.index');
    }
}
