<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin;
use Illuminate\Http\Request;
use Validator, Redirect, Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Session;

class AdminAuthController extends Controller
{
    public function login()
    {
        return \view('admin.auth.login');
    }
    public function postLogin(Request $request)
    {
        \request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $admin = Admin::where('email', $request->email)->first();

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return \redirect('super-dashboard'); //redirect to url link dashboard
        } else {
            return Redirect::to("login"); //routing login jika user tidak ada
        }
    }
    public function dashboard()
    {
        if (Auth::guard('admin')->check()) {
            $komoditas = DB::table('komoditas')
                ->join('surveyors', 'surveyors.id', '=', 'komoditas.id_surveyor')
                ->select('komoditas.*', 'surveyors.name')
                ->get();
            return view('admin.dashboard', \compact('komoditas')); //view dashboard
        } else {
            // return view('admin.atuh.login'); //view dashboard
            return Redirect::to("super-login")->withSuccess('Opps! You do not have access'); //routing login
        }
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('super-login'); //routing login
    }
}
