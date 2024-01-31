@extends('layout.main')

@section('content')
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">{{ $title }}</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('customer.index') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
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
                <!-- DataTables Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Tabel Invoice</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-capitalize">
                                        <th scope="col">Produk</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Total Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($selectedProducts as $selectedProduct)
                                        <tr>
                                            <td style="vertical-align: middle;">
                                                {{ $selectedProduct->produk->nama_produk }}</td>
                                            <td style="vertical-align: middle;">
                                                Rp.{{ number_format($selectedProduct->produk->harga, 0, ',', '.') }},00
                                            </td>
                                            <td style="vertical-align: middle;">
                                               @if( $selectedProduct->jumlah_produk !== null ) 
                                                {{$selectedProduct->jumlah_produk}}
                                               @else
                                               {{$selectedProduct->kuantitas}}
                                               @endif
                                            </td>
                                            <td style="vertical-align: middle;">
                                                Rp.{{ number_format($selectedProduct->total_harga, 0, ',', '.') }},00
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3">Total Seluruh Harga :</td>
                                        <td>Rp.{{ number_format($totalHarga, 0, ',', '.') }},00</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="invoice-buttons text-right">
                        <button type="submit" id="printInvoiceBtn" class="btn btn-primary col-2">Cetak Invoice</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var printBtn = document.getElementById('printInvoiceBtn');

            printBtn.addEventListener('click', function() {
                window.location.href = '{{ route('cetak.transaksi') }}';
            });
        });
    </script>
@endsection
