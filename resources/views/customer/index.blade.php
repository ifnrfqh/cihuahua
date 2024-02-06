@extends('layout.main')

@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Dashboard</h3>
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
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Sales chart -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- Column -->
            <div class="col-sm-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><a class="" href="#" aria-expanded="false"
                                style="color: black">Saldo</a></h4>
                        <div class="text-end">
                            <h2 class="font-light mb-0"> Rp. {{number_format($wallets->saldo)}}</h2>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%; height: 6px;"
                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="float-right">
                            <button class="btn btn-light my-3 mr-3" data-bs-toggle="modal" data-bs-target="#topupModal">Top Up</button>
                            {{-- <button class="btn btn-light my-3 mr-3" data-bs-toggle="modal" data-bs-target="#tariktunaiModal">Tarik Tunai</button> --}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <div class="modal fade" id="topupModal" tabindex="-1" role="dialog" aria-labelledby="topupModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="topupModalLabel">Top Up</h4>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>
                <form action="{{ route('topup.request') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="rekening">Rekening</label>
                            <input id="rekening" name="rekening" type="text" placeholder="" class="form-control"
                                required value="{{ $wallets->rekening }}">
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

    {{-- <div class="modal fade" id="tariktunaiModal" tabindex="-1" role="dialog" aria-labelledby="tariktunaiModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="tariktunaiModalLabel">Tarik Tunai</h4>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>
                <form action="{{ route('withdrawal.request') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input id="rekening" name="rekening" type="hidden" placeholder="" class="form-control"
                                required value="{{ $wallets->rekening }}">
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
                            <span class="d-none d-sm-block">Tarik Tunai</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
    
@endsection
