@extends('layout.main')

@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">{{ $title }}</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('bank.index') }}">Home</a></li>
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
        <!-- Content -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- Isiiiii -->
            <div class="sales-report-area sales-style-two">
                <div class="row">
                    <!-- data table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Permintaan Top Up</h4>
                                <span class="float-end mb-3">
                                    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#topupModal">Top Up</button>
                                </span>
                                <div class="data-tables">
                                    <table id="table1" class="table table-bordered table-hover">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                                <th>No.</th>
                                                <th>Customer</th>
                                                <th>Rekening</th>
                                                <th>Nominal</th>
                                                <th>Kode Unik</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($topups as $i => $topup)
                                                <tr>
                                                    <td>{{ $i + 1 }}</td>
                                                    <td>{{ $topup->wallet->user->nama }}</td>
                                                    <td>{{ $topup->rekening }}</td>
                                                    <td>Rp. {{ number_format($topup->nominal, 0, ',', '.') }},00</td>
                                                    <td>{{ $topup->kode_unik }}</td>
                                                    <td>{{ $topup->status }}</td>
                                                    <td class="col-2">
                                                        @if ($topup->status === 'menunggu')
                                                            <form action="{{ route('konfirmasi.topup', $topup->id) }}"
                                                                method="post" style="display: inline;">
                                                                @csrf
                                                                @method('PUT')
                                                                <button type="submit"
                                                                    class="btn btn-primary btn-sm">Konfirmasi</button>
                                                            </form>

                                                            <form action="{{ route('tolak.topup', $topup->id) }}"
                                                                method="post" style="display: inline;">
                                                                @csrf
                                                                @method('PUT')
                                                                <button type="submit"
                                                                    class="btn btn-danger btn-sm">Tolak</button>
                                                            </form>
                                                        @elseif($topup->status === 'dikonfirmasi')
                                                            <button type="submit"
                                                                class="btn btn-success btn-sm col-12">{{ $topup->status }}</button>
                                                        @else
                                                            <button type="submit"
                                                                class="btn btn-danger btn-sm col-12">{{ $topup->status }}</button>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- data table end -->
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->

    {{-- TopUp Modal --}}
    <div class="modal fade" id="topupModal" tabindex="-1" role="dialog" aria-labelledby="topupModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="topupModalLabel">Top Up</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>
                <form action="{{ route('topup') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="rekening">Rekening</label>
                            <input id="rekening" name="rekening" type="text" placeholder="" class="form-control"
                                required value="">
                        </div>

                        <div class="form-group">
                            <label for="nominal">Nominal</label>
                            <input type="text" id="nominal" class="form-control" placeholder="" name="nominal"
                                required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Batal</span>
                        </button>
                        <button type="submit" class="btn btn-primary ms-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Top Up</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection