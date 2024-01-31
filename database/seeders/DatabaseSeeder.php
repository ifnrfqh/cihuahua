<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Produk;
use App\Models\Wallet;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       // User Seeder

       $dataUser = [
        [
            'nama' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('admin'),
            'email_verified_at' => now(),
            'remember_token' => Str::Random(10),
        ],
        [
            'nama' => 'bank',
            'email' => 'bank@gmail.com',
            'role' => 'bank',
            'password' => bcrypt('bank'),
            'email_verified_at' => now(),
            'remember_token' => Str::Random(10),
        ],
        [
            'nama' => 'kantin',
            'email' => 'kantin@gmail.com',
            'role' => 'kantin',
            'password' => bcrypt('kantin'),
            'email_verified_at' => now(),
            'remember_token' => Str::Random(10),
        ],
        [
            'nama' => 'customer',
            'email' => 'customer@gmail.com',
            'role' => 'customer',
            'password' => bcrypt('customer'),
            'email_verified_at' => now(),
            'remember_token' => Str::Random(10),
        ],
    ];

    foreach ($dataUser as $key => $val) {
        User::create($val);
    }

    // Kategori Seeder

    $dataKategori = [
        [
            'nama_kategori' => 'Makanan',
        ],
        [
            'nama_kategori' => 'Minuman',
        ],
    ];

    foreach ($dataKategori as $key => $val) {
        Kategori::create($val);
    }

    //Produk Seeder

    $dataProduk = [
        [
            'nama_produk' => 'Aqua',
            'harga' => 4500,
            'stok' => 10,
            'foto' => 'default.png',
            'desc' => 'Minuman mineral pesaing Lee Minerale',
            'id_kategori' => 1,
        ],
        [
            'nama_produk' => 'Bakso',
            'harga' => 10000,
            'stok' => 10,
            'foto' => 'default.png',
            'desc' => 'Bakso Tanpa Tepung',
            'id_kategori' => 2,
        ],
    ];

    foreach ($dataProduk as $key => $val) {
        Produk::create($val);
    }   

    //Wallet Seeder

    $dataWallet = [
        [
            'rekening' => '559876789006',
            'id_user' => 1,
            'saldo' => 100000,
            'status' => 'aktif',
        ],
        [
            'rekening' => '558899776688',
            'id_user' => 2,
            'saldo' => 100000,
            'status' => 'aktif',
        ],
        [
            'rekening' => '556754535367',
            'id_user' => 3,
            'saldo' => 100000,
            'status' => 'aktif',
        ],
        [
            'rekening' => '552134578867',
            'id_user' => 4,
            'saldo' => 100000,
            'status' => 'aktif',
        ],
    ];

    foreach ($dataWallet as $key => $val) {
        Wallet::create($val);
    }  

    }
}
