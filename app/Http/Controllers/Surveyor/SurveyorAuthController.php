<?php

namespace App\Http\Controllers\Surveyor;

use App\Http\Controllers\Controller;
use App\Model\Komoditas;
use App\Model\Surveyor;
use Illuminate\Http\Request;
use Validator, Redirect, Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class SurveyorAuthController extends Controller
{
    public function index()
    {
        return \view('surveyor.auth.login'); //view login
    }
    public function register()
    {
        return \view('surveyor.auth.register'); //view register
    }
    public function postLogin(Request $request)
    {
        \request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = Surveyor::where('email', $request->email)->first();
        // // dd(Hash::check($request->password, $player->password));
        // if (Auth::guard('player')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
        //   // return \response()->json($player);
        //   return \view('player.dashboard');
        // } else {
        //   return Redirect::to("login") //routing login jika user tidak ada
        //     ->withSuccess('Oppes! You have entered invalid credentials');
        // }

        if (Auth::guard('surveyor')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return \redirect('surveyor-dashboard'); //redirect to url link dashboard
        } else {
            return Redirect::to("login"); //routing login jika user tidak ada
        }
    }
    public function postRegister(Request $request)
    {
        \request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // $player = Auth::user();
        // $ava_name = $player->id . '_avatar' . time() . '.' . \request()->ava_url->getClientOriginalExtension();
        // $ava_url = \request()->file('ava_url');
        // $ava_name = $ava_url->getClientOriginalName() . '_avatar' . \time();
        // $ava_folder = \storage_path('ava_player');
        // $ava_url->move($ava_folder, $ava_name);

        $data = $request->all();
        $check = $this->create($data);
        return Redirect::to("dashboard")->withSuccess('Great! U have successfully loggedin'); //routing dashboard
    }
    public function dashboard()
    {
        if (Auth::guard('surveyor')->check()) {
            $komoditas = Komoditas::select('id', 'name', 'jenis', 'harga', 'img')->get();
            return view('surveyor.dashboard', \compact('komoditas')); //view dashboard
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }
    public function create(array $data)
    {
        return Surveyor::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('login'); //routing login
    }
}
