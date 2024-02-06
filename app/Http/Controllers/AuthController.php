<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function login(Request $request)
    {
        //
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ],
            [
                'email.required' => 'Email Harus Diisi',
                'password.required' => 'Password Harus Diisi',
            ]
        );
        
        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            if (Auth::user()->role == "admin") {
                return redirect()->route('admin.index');
            } else if  (Auth::user()->role == "customer") {
                return redirect()->route('customer.index'); 
            } else if (Auth::user()->role == "bank") {
                return redirect()->route('bank.index'); 
            } else if (Auth::user()->role == "kantin") {
                return redirect()->route('kantin.index');   
            }
        } else {
            return redirect(route('auth'))->withErrors('Email dan Password yang dimasukan tidak sesuai')->withInput();
        }
    }   

    function create(){
        return view('auth.register');
    }
    function register(Request $request){
        $request->validate(
            [
            'nama' => 'required|min:5',
            'email'=> 'required|unique:users|email',
            'password' => 'required|min:6',
            ]
        );

        $inforegister=[
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'customer',
        ];

        $userRegist = User::create($inforegister);
        $rek = '55' . auth()->id() . now()->format('YmdHis');
        $wallet = Wallet::create([
            'id_user' => $userRegist->id,
            'rekening' => $rek,
            'saldo' => 10000,
            'status' => 'aktif',
        ]);
        
        return redirect()->route('auth')->with('success' , 'Registrasi Berhasil');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('');
    }
}
