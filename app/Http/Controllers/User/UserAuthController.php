<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator, Redirect, Response;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Session;

class UserAuthController extends Controller
{
    public function index()
    {
        return \view('user.auth.login'); //view login
    }
    public function register()
    {
        return \view('user.auth.register'); //view register
    }
    public function postLogin(Request $request)
    {
        \request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();
        // // dd(Hash::check($request->password, $player->password));
        // if (Auth::guard('player')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
        //   // return \response()->json($player);
        //   return \view('player.dashboard');
        // } else {
        //   return Redirect::to("login") //routing login jika user tidak ada
        //     ->withSuccess('Oppes! You have entered invalid credentials');
        // }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return \redirect('dashboard'); //redirect to url link dashboard
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
        if (Auth::check()) {
            // $game = Game::all();
            return view('user.dashboard'); //view dashboard
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }
    public function create(array $data)
    {
        return User::create([
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
