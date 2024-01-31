@extends('layout.main')

@section('content')
    

<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">{{ $title }}</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

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
                    <h4 class="card-title">Riwayat Transaksi</h4>
                    <div class="list-group list-group-flush">
                        @foreach($transaksis as $transaksi)
                            <h6 class="bg-body-tertary p-2 border-top border-bottom">{{ $transaksi->tanggal}}
                            </h6>
                            @php
                                $transaksiList = App\Models\Transaksi::select('invoice', 'tgl_transaksi')
                                ->where(DB::raw('DATE(tgl_transaksi)'), $transaksi->tanggal)
                                ->where('id_user', auth()->id())
                                ->groupBy('invoice', 'tgl_transaksi')
                                ->get();
                            @endphp

                            <ul class="list-group list-group-light mb-4">
                                @foreach ($transaksiList as $list)
                                    @php
                                      $totalHarga = App\Models\Transaksi::where('invoice', $list->invoice)->sum('total_harga');  
                                    @endphp
                                    <a href="{{ route('customer.transaksi.detail', $list->invoice)}}">
                                        <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center col-12">
                                                <div class="ms-3 col-12">
                                                    <p class="fw-bold mb-1 me-3">{{ $list->invoice}}<span class="float-end">{{ $list->tgl_transaksi}}</span>
                                                    </p>
                                                    <p class="text-muted mb-0">Rp.
                                                        {{ number_format($totalHarga, 2, ',', '.')}}
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    </a>
                                @endforeach
                            </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection