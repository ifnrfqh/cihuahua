<?php

namespace App\Http\Controllers;

use App\Models\TopUp;
use App\Models\Wallet;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function topupIndex()
    {
        $wallets = Wallet::all();
        return view('customer.topup', compact('wallets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function bankTopupIndex()
    {
        $title = 'Top Up';
        $topups =TopUp::all();
        return view('bank.topup', compact('title', 'topups'));
    }   

    /**
     * Store a newly created resource in storage.
     */
    public function bankWithdrawIndex()
    {
        $title = 'Tarik Tunai';
        $withdrawals = Withdraw::all();
        return view('bank.withdrawal', compact('title', 'withdrawals'));
    }

    /**
     * Display the specified resource.
     */
    public function topup(Request $request)
    {
        $request->validate([
            'nominal' => 'required|integer',
            'rekening' => 'required|string|exists:wallets,rekening',
        ]);

        if(auth()->user()->role === 'bank'){
            $status = 'dikonfirmasi';
            $wallet = Wallet::where('rekening', $request->rekening)->first();
            $wallet->saldo += $request->nominal;
            $wallet->save();
        }else{
            $status = 'menunggu';
        }

        $kodeUnik = "TOP" . auth()->user()->id . now()->format('dmYHis');
        $topup = TopUp::create([
            'rekening' => $request->rekening,
            'nominal' => $request->nominal,
            'kode_unik' => $kodeUnik,
            'status' => $status,
        ]);

        return redirect()->back()->with('success', 'Permintaan Top Up berhasil');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function konfirmasiTopup($id)
    {
        $topup = TopUp::findOrFail($id);

        $topup->status = 'dikonfirmasi';
        $topup->save();

        $wallet = Wallet::where('rekening', $topup->rekening)->first();
        $wallet->saldo += $topup->nominal;
        $wallet->save();

        return redirect()->route('bank.index')->with('success', 'Top Up dikonfirmasi');
    }

    /**
     * Update the specified resource in storage.
     */
    public function tolakTopup($id)
    {
        $topup =TopUp::findOrFail($id);

        $topup->status = 'ditolak';
        $topup->save();

        return redirect()->route('bank.index')->with('error', 'Top Up telah ditolak');
    }

    public function withdrawal(Request $request)
    {
        $request->validate([
            'nominal' => 'required|integer',
            'rekening' => 'required|string|exists:wallets,rekening',
        ]);

        $wallet = Wallet::where('rekening', $request->rekening)->first();
        if ($wallet->saldo < $request->nominal) {
            return redirect()->back()->with('error', 'Saldo tidak mencukupi.');
        }
        if(auth()->user()->role === 'bank'){
            $status = 'dikonfirmasi';
            $wallet = Wallet::where('rekening', $request->rekening)->first();
            $wallet->saldo -= $request->nominal;
            $wallet->save();
        }else{
            $status = 'menunggu';
        }

        $kodeUnik = "WD" . auth()->user()->id . now()->format('dmYHis');
        $withdrawal = Withdraw::create([
            'rekening' => $request->rekening,
            'nominal' => $request->nominal,
            'kode_unik' => $kodeUnik,
            'status' => $status,
        ]);



        return redirect()->back()->with('success', 'Permintaan Withdrawal berhasil');
    }

    public function konfirmasiWithdrawal($id)
    {
        $withdrawal = Withdraw::findOrFail($id);

        $withdrawal->status = 'dikonfirmasi';
        $withdrawal->save();

        $wallet = Wallet::where('rekening', $withdrawal->rekening)->first();
        $wallet->saldo -= $withdrawal->nominal;
        $wallet->save();

        return redirect()->route('bank.index')->with('success', 'Withdrawal dikonfirmasi');
    }

    public function tolakWithdrawal($id)
    {
        $withdrawal = Withdraw::findOrFail($id);

        $withdrawal->status = 'ditolak';
        $withdrawal->save();

        return redirect()->route('bank.index')->with('error', 'Withdrawal ditolak');
    }

    public function laporanTopupHarian()
    {
        $title = 'Laporan Top Up Harian';

        // $today = now()->toDateString();
        $topups = TopUp::select(DB::raw('DATE(created_at) as tanggal'), DB::raw('SUM(nominal) as nominal'))
        ->groupBy('tanggal')
        ->orderBy('tanggal', 'desc')
        ->get();
        $totalNominal = $topups->sum('nominal');

        return view('bank.laporan.topup-harian', compact('topups', 'totalNominal', 'title'));
    }
    public function printLaporan()
    {
        $title = 'Laporan Top Up Harian';

        // $today = now()->toDateString();
        $topups = TopUp::select(DB::raw('DATE(created_at) as tanggal'), DB::raw('SUM(nominal) as nominal'))
        ->groupBy('tanggal')
        ->orderBy('tanggal', 'desc')
        ->get();
        $totalNominal = $topups->sum('nominal');

        return view('bank.laporan.topup-cetak', compact('topups', 'totalNominal', 'title'));
    }

    public function laporanTopup($tanggal)
    {
        $title = 'Laporan TopUp';

        $tanggal = date('Y-m-d', strtotime($tanggal));
        $topups = TopUp::where(DB::raw('DATE(created_at)'), $tanggal)->get();
        $totalNominal = $topups->sum('nominal');

        return view('bank.laporan.topup_detail', compact('topups', 'totalNominal', 'title'));
    }

    public function laporanWithdrawalHarian()
    {
        $title = 'Laporan Withdrawal Harian';

        // $today = now()->toDateString();
        $withdrawals = Withdraw::select(DB::raw('DATE(created_at) as tanggal'), DB::raw('SUM(nominal) as nominal'))
        ->groupBy('tanggal')
        ->orderBy('tanggal', 'desc')
        ->get();
        $totalNominal = $withdrawals->sum('nominal');

        return view('bank.laporan.withdrawal-harian', compact('withdrawals', 'totalNominal', 'title'));
    }
    public function printWithdrawal()
    {
        $title = 'Laporan Withdrawal Harian';

        // $today = now()->toDateString();
        $withdrawals = Withdraw::select(DB::raw('DATE(created_at) as tanggal'), DB::raw('SUM(nominal) as nominal'))
        ->groupBy('tanggal')
        ->orderBy('tanggal', 'desc')
        ->get();
        $totalNominal = $withdrawals->sum('nominal');

        return view('bank.laporan.withdrawal-cetak', compact('withdrawals', 'totalNominal', 'title'));
    }

    public function laporanWithdrawal($tanggal)
    {
        $title = 'Laporan Withdrawal';

        $tanggal = date('Y-m-d', strtotime($tanggal));
        $withdrawals = Withdraw::all();
        $totalNominal = $withdrawals->sum('nominal');

        return view('bank.laporan.withdrawal_detail', compact('withdrawals', 'totalNominal', 'title'));
    }

    public function riwayatTopup()
    {
        $title = 'Riwayat Topup';

        $wallet = Wallet::where('id_user', auth()->id())->first();
        $topups = TopUp::select(DB::raw('DATE(created_at) as tanggal'), DB::raw('SUM(nominal)as nominal'))
        ->where('rekening', $wallet->rekening)
        ->groupBy('tanggal')
        ->orderBy('tanggal', 'desc')
        ->get();

        return view('customer.riwayat.topup', compact('title', 'topups', 'wallet'));
    }

    public function riwayatWithdrawal()
    {
        $title = 'Riwayat Withdrawal';

        $wallet = Wallet::where('id_user', auth()->id())->first();
        $withdrawals = Withdraw::select(DB::raw('DATE(created_at) as tanggal'), DB::raw('SUM(nominal)as nominal'))
        ->where('rekening', $wallet->rekening)
        ->groupBy('tanggal')
        ->orderBy('tanggal', 'desc')
        ->get();

        return view('customer.riwayat.withdrawal', compact('title', 'wallet', 'withdrawals'));
    }

    public function cetakTopUp($tanggal) {
        $tanggal = date('Y-m-d', strtotime($tanggal));
        $topups = TopUp::where(DB::raw('DATE(created_at)'), $tanggal,)
        ->get();
        $totalNominal = $topups->sum('nominal');

        return view('cetak.cetak-topup', compact('tanggal', 'topups', 'totalNominal'));
    }

    public function cetakTopupAll() {
        $title = 'Cetak Laporan';
        $topups = TopUp::select(DB::raw('DATE(created_at) as tanggal'), DB::raw('SUM(nominal) as nominal'))
        ->groupBy('tanggal')
        ->orderBy('tanggal', 'desc')
        ->get();
        $totalNominal = $topups->sum('nominal');

        return view('cetak.cetak-topup-all', compact('title', 'topups','totalNominal'));
    }

    public function cetakWithdrawal($tanggal) {
        $tanggal = date('Y-m-d', strtotime($tanggal));
        $withdrawals = Withdraw::where(DB::raw('DATE(created_at)'), $tanggal,)
        ->get();
        $totalNominal = $withdrawals->sum('nominal');

        return view('cetak.cetak-withdrawal', compact('tanggal', 'withdrawals', 'totalNominal'));
    }

    public function cetakWithdrawalAll() {
        $title = 'Cetak Laporan';
        $withdrawals = Withdraw::select(DB::raw('DATE(created_at) as tanggal'), DB::raw('SUM(nominal) as nominal'))
        ->groupBy('tanggal')
        ->orderBy('tanggal', 'desc')
        ->get();
        $totalNominal = $withdrawals->sum('nominal');

        return view('cetak.cetak-withdrawal-all', compact('title', 'withdrawals','totalNominal'));
    }

}