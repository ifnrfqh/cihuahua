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
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- column -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title" style="text-align: center">Laporan Riwayat Withdrawal</h4>
                    <div class="list-group list-group-flush">
                        @foreach($withdrawals as $withdraw)
                            <h6 class="bg-body-tertary p-2 border-top border-bottom">{{ $withdraw->tanggal}}
                                <span class="float-end">Rp. {{number_format($withdraw->nominal,0,',','.')}}</span>
                            </h6>
                            @php
                                $withdrawalList = App\Models\Withdraw::where(DB::raw('DATE(created_at)'), $withdraw->tanggal)
                                // ->where('rekening', $wallet->rekening)
                                ->orderBy('created_at', 'desc')
                                ->get();
                            @endphp

                            <ul class="list-group list-group-light mb-4">
                                @foreach ($withdrawalList as $list)
                                <a href="{{ route('withdrawal.detail', $withdraw->tanggal) }}">
                                        <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center col-12">
                                                <div class="ms-3 col-12">
                                                    <p class="fw-bold mb-1 me-3">{{ $list->kode_unik}}<span class="float-end">{{ $list->created_at}}</span>
                                                    </p>
                                                    <p class="text-muted mb-0">Rp.
                                                        {{ number_format($list->nominal, 2, ',', '.')}}
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        window.print();

        window.addEventListener('afterprint', function() {

            window.location.href = '{{ route('withdrawal.harian') }}';
        });

    });
</script>
</body>