<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//Route Registrasi
Route::get('/registrasi', [AuthController::class, 'create']);
Route::post('/registrasi', [AuthController::class, 'register'])->name('regist');    
//Route Authentication                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
Route::get('/', [AuthController::class, 'index'])->name('auth');
Route::post('/', [AuthController::class, 'login']);
//Logout
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

//Topup & Withdraw
Route::post('/topup', [BankController::class, 'topup'])->name('topup');
Route::post('/withdrawal', [BankController::class, 'withdrawal'])->name('withdrawal');

//cetak transaksi
Route::get('/transaksi/cetak', [TransaksiController::class, 'cetakTransaksi'])->name('cetak.transaksi');


//Route Admin
Route::middleware(['auth', 'userAkses:admin'])->group(function(){
    Route::get('/admin', [DashboardController::class, 'adminIndex'])->name('admin.index');
    Route::resource('/admin/data', UserController::class);
});

//Route Kantin
Route::middleware(['auth', 'userAkses:kantin'])->group(function(){
    Route::get('/kantin', [DashboardController::class, 'kantinIndex'])->name('kantin.index');
    Route::resource('/kantin/produk', ProdukController::class);
    Route::resource('/kantin/kategori', KategoriController::class);
    Route::get('/kantin/laporan-harian', [TransaksiController::class, 'laporanTransaksiHarian'])->name('kantin.laporan');
    Route::get('/kantin/transaksi/{tanggal}', [TransaksiController::class, 'laporanTransaksi'])->name('transaksi.detail');

    Route::get('/kantin/invoice/', [TransaksiController::class, 'laporanTransaksiCetak'])->name('kantin.invoice');
});

//Route Customer
Route::middleware(['auth', 'userAkses:customer'])->group(function(){
    Route::get('/customer', [DashboardController::class, 'customerIndex'])->name('customer.index');

    //TopUp & Withdraw
    Route::post('/customer/topup', [BankController::class, 'topup'])->name('topup.request');
    Route::post('/customer/withdrawal', [BankController::class, 'withdrawal'])->name('withdrawal.request');
    //Beli
    Route::get('/customer/kantin', [TransaksiController::class, 'customerIndexKantin'])->name('customer.kantin');
    Route::post('/customer/tambahKeranjang/{id}', [TransaksiController::class, 'addToCart'])->name('addToCart');
    Route::get('/customer/keranjang', [TransaksiController::class, 'keranjangIndex'])->name('customer.keranjang');
    Route::post('/customer/checkout', [TransaksiController::class, 'checkout'])->name('checkout');
    Route::delete('/customer/keranjang/destroy/{id}', [TransaksiController::class, 'keranjangDestroy'])->name('keranjang.destroy');
    // Route::get('/customer/cetakStruk', [TransaksiController::class, 'cetakTransaksi'])->name('cetak.struk');
    
    // riwayat
    Route::get('/customer/riwayat/transaksi', [TransaksiController::class, 'riwayatTransaksi'])->name('customer.riwayat.transaksi');
    Route::get('/customer/riwayat/transaksi/{invoice}', [TransaksiController::class, 'detailRiwayatTransaksi'])->name('customer.transaksi.detail');
    Route::get('/customer/riwayat/topup', [BankController::class, 'riwayatTopup'])->name('customer.riwayat.topup');
    Route::get('/customer/riwayat/withdrawal', [BankController::class, 'riwayatWithdrawal'])->name('customer.riwayat.withdrawal');
    Route::get('/laporan/topup/{tanggal}', [BankController::class, 'cetakTopUp'])->name('cetak.topup');
    Route::get('/laporan/withdrawal/{tanggal}', [BankController::class, 'cetakWithdrawal'])->name('cetak.withdrawal');
    Route::get('/laporan/topupAll', [BankController::class, 'cetakTopupAll'])->name('cetak.topup.all');
    Route::get('/laporan/withdrawalAll', [BankController::class, 'cetakWithdrawalAll'])->name('cetak.withdrawal.all');
});

//Route Bank
Route::middleware(['auth', 'userAkses:bank'])->group(function(){
    Route::get('/bank', [DashboardController::class, 'bankIndex'])->name('bank.index');

    //TopUp
    Route::get('/bank/topup/', [BankController::class, 'bankTopupIndex'])->name('bank.topup');
    Route::put('/bank/konfirmasiTopup/{id}', [BankController::class, 'konfirmasiTopup'])->name('konfirmasi.topup');
    Route::put('/bank/tolakTopup/{id}', [BankController::class, 'tolakTopup'])->name('tolak.topup');

    //Tarik Tunai
    Route::get('/bank/withdrawal', [BankController::class, 'bankWithdrawIndex'])->name('bank.withdrawal');
    Route::put('/bank/konfirmasiWithdrawal/{id}', [BankController::class, 'konfirmasiWithdrawal'])->name('konfirmasi.withdrawal');
    Route::put('/bank/tolakWithdrawal/{id}', [BankController::class, 'tolakWithdrawal'])->name('tolak.withdrawal');

    //Laporan
    Route::get('/bank/laporan-withdrawal', [BankController::class, 'laporanWithdrawalHarian'])->name('withdrawal.harian');
    Route::get('/bank/withdrawal/cetak', [BankController::class, 'printWithdrawal'])->name('withdrawal.cetak');
    Route::get('/bank/laporan-withdrawal/{tanggal}', [BankController::class, 'laporanWithdrawal'])->name('withdrawal.detail');
    Route::get('/bank/laporan-topup', [BankController::class, 'laporanTopupHarian'])->name('topup.harian');
    Route::get('/bank/topup/cetak', [BankController::class, 'printLaporan'])->name('topup.cetak');
    Route::get('/bank/laporan-topup/{tanggal}', [BankController::class, 'laporanTopup'])->name('topup.detail');

});
