@extends('layout.main')

@section('content')
    
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">{{$title}}</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('customer.index')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- column -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{$title}} </h4>
                        <div class="table-responsive">
                            <table class="table user-table no-wrap">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">#</th>
                                        <th class="border-top-0">Nama Produk</th>
                                        <th class="border-top-0">Harga</th>
                                        <th class="border-top-0">Qty</th>
                                        <th class="border-top-0">Total Harga</th>
                                        <th class="border-top-0">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($keranjangs as $keranjang)
                                    <tr>
                                        <td style="vertical-align: middle;"> <img width="100px"
                                            src="{{ asset('storage/produk/' . $keranjang->produk->foto) }}"
                                            alt=""></td>
                                        <td style="vertical-align: middle;">
                                            {{ $keranjang->produk->nama_produk }}</td>
                                        <td style="vertical-align: middle;">
                                            Rp. {{ number_format($keranjang->produk->harga, 0, ',', '.') }},00
                                        </td>
                                        <td style="vertical-align: middle;">{{ $keranjang->jumlah_produk }}
                                        </td>
                                        <td style="vertical-align: middle;">
                                            Rp. {{ number_format($keranjang->total_harga, 0, ',', '.') }},00
                                        </td>
                                        <!-- Tombol Delete -->
                                        <td style="vertical-align: middle;"> 
                                            <form action="{{ route('keranjang.destroy', $keranjang->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Ingin Menghapus Produk Ini?')">Delete</button>
                                            </form>
                                        </td>                                
                                    </tr>
                                    @endforeach 
                                </tbody>
                                <tfoot>
                                    <tr class="font-weight-bold">
                                        <td colspan="4" class="text-right">TOTAL SELURUH HARGA :
                                        </td>
                                        <td>Rp. {{ number_format($totalharga, 0, ',', '.') }},00</td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="text-end">
                                <form action="{{ route('checkout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger col-2" onclick="return confirm('Yakin Ingin Membeli Produk Ini?')">Beli</button>
                                </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const CheckoutForm =document.getElementById("checkoutForm");
            const submitButton =document.getElementById("submitButton");

            submitButton.addEventListener("click", function() {
                // Lakukan submit form secara manual
                CheckoutForm.submit();
            });
        });
    </script>
    @endsection
   