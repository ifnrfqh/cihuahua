<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Invoice</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="">
        <div class="card-body m-5">
            <div class="mt-3">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-capitalize">
                                        <th scope="col">#</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Rekening</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Nominal</th>
                                        <th scope="col">Kode Unik</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($topups as $i => $topup)
                                        <tr>
                                            <td style="vertical-align: middle;">
                                                {{ $i + 1 }}</td>
                                            <td style="vertical-align: middle;">
                                                {{ $topup->created_at }}</td>
                                            <td style="vertical-align: middle;">
                                                {{$topup->wallet->rekening}}</td>
                                            <td style="vertical-align: middle;">
                                                {{$topup->wallet->user->nama}}</td>
                                            <td style="vertical-align: middle;">
                                                Rp.{{ number_format($topup->nominal, 0, ',', '.') }}</td>
                                                <td style="vertical-align: middle;">
                                                    {{$topup->kode_unik}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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

                window.location.href = '{{ url()->previous() }}';
            });

        });
    </script>

</body>

</html>
