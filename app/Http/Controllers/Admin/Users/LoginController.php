<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PharIo\Manifest\Email;

use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\Input;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.users.login');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|Email:filter',
            'password' => 'required'
        ]);

        $level = DB::table('Users')->where('email', $request->email)->first();

        if (Auth::attempt(
            [
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            ],
            $request->input('remember')
        )) {
            if ($level->level == 1) {
                return redirect()->route('admin', ['name' => Auth::user()]);
            } else {
                return redirect()->route('user.home', ['name' => Auth::user()]);
            }

            // $hashed = Hash::make($request->password);
        }
        Session::flash('error', 'Tài khoản hoặc mật khẩu không đúng');
        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();
        return view('admin.users.login');
    }
}
