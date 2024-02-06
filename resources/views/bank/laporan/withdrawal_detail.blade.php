<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Monsterlite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Monster admin lite design, Monster admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Monster Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>{{$title}} - Kantin</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/monster-admin-lite/" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/assets/images/favicon.png') }}">
    <!-- Custom CSS -->
    <link href="{{ asset('/assets/plugins/chartist/dist/chartist.min.css" rel="stylesheet') }}">
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
    
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            {{-- <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-0 p-0" style="colo">{{$title}}</h3>
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
            </div> --}}
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
                    <!-- Isiiiii -->
                    <div class="sales-report-area sales-style-two">
                        <div class="row">
                            <!-- data table start -->
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title" style="color: black; text-align:center">Detail Laporan Top Up</h4>
                                        <div class="data-tables">
                                            <table id="table1" class="table table-bordered table-hover">
                                                <thead class="bg-light text-capitalize">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Tanggal</th>
                                                        <th>Rekening</th>
                                                        <th>Nama</th>
                                                        <th>Nominal</th>
                                                        <th>Kode Unik</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($withdrawals as $i => $withdraw)
                                                        <tr>
                                                            <td>{{ $i + 1 }}</td>
                                                            <td>{{ $withdraw->created_at }}</td>
                                                            <td>{{ $withdraw->wallet->rekening }}</td>
                                                            <td>{{ $withdraw->wallet->user->nama }}</td>
                                                            <td>Rp. {{ number_format($withdraw->nominal, 0, ',', '.') }}</td>
                                                            <td>{{ $withdraw->kode_unik }}</td>
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
                
                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    window.print();
            
                    window.addEventListener('afterprint', function() {
            
                        window.location.href = '{{ url()->previous() }}';
                    });
                });
            </script>
</body> 