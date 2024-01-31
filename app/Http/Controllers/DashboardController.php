<?php

namespace App\Http\Controllers;


use App\Models\TopUp;
use App\Models\Produk;
use App\Models\Wallet;
use App\Models\Kategori;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function adminIndex()
    {
        $title = 'Dashboard Admin';
        $users = User::all();
        return view('admin.index', compact('title', 'users'));
    }

    
    public function kantinIndex()
    {
        $title = 'Dashboard Kantin';
        $kategoris = Kategori::all();
        $produks = Produk::all();
        return view('kantin.index', compact('title', 'produks', 'kategoris'));
    }

    public function bankIndex()
    {
        $title = 'Dashboard Bank';
        $customers = User::where('role', 'customer')->get();
        $wallets = Wallet::all();
        $reqTU = TopUp::all();
        $reqTT = Withdraw::all();
        $requestTopups = TopUp::where('status', 'menunggu')->get();
        $requestWithdraws = Withdraw::where('status', 'menunggu')->get();
        return view('bank.index', compact('title', 'customers', 'wallets', 'requestTopups', 'requestWithdraws', 'reqTU', 'reqTT'));
    }

    public function customerIndex()
    {
        $title = 'Dashboard Customer';
        $kimak = 'Customer';
        $wallets = Wallet::where('id_user', auth()->user()->id)->first();
        return view('customer.index', compact('title', 'wallets'));
    }

}
