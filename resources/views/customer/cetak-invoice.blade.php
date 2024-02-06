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
                <div class="row d-flex align-items-baseline">
                    <div class="col-xl-9">
                        <p style="color: #7e8d9f; font-size: 20px">Kantin64</p>
                    </div>
                </div>

                <div class="border-top">
                    <div class="col-md-12 pt-3">
                        <div class="text-center">
                            <i class="fab fa-mdb fa-4x ms-0" style="color: #5d9fc5"></i>
                            <h4 class="pt-0">Kespa Shop.</h4>
                        </div>
                    </div>

                    <div class="row mb-5">
                        <div class="col-xl-8">
                            <ul class="list-unstyled">
                                <li class="text-muted">
                                    Nama : {{ auth()->user()->nama }}
                                </li>
                                <li class="text-muted">{{ now()->format('d F Y') }}</li>
                                <li class="text-muted">{{ $invoice }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-capitalize">
                                        <th scope="col">Produk</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Total Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($selectedProducts as $selectedProduct)
                                        <tr>
                                            <td style="vertical-align: middle;">
                                                {{ $selectedProduct['produk']->nama_produk }}</td>
                                            <td style="vertical-align: middle;">
                                                Rp.{{ number_format($selectedProduct['produk']->harga, 0, ',', '.') }},00
                                            </td>
                                            <td style="vertical-align: middle;">
                                                {{ $selectedProduct['kuantitas'] }}
                                            </td>
                                            <td style="vertical-align: middle;">
                                                Rp.{{ number_format($selectedProduct['total_harga'], 0, ',', '.') }},00
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3"><b>Total Seluruh Harga :</b></td>
                                        <td>Rp.{{ number_format($totalHarga, 0, ',', '.') }},00</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="fixed-bottom">
                    <hr class="mt-5" />
                        <div class="col-12 text-center">
                            <p>Terimakasih telah berbelanja di Kantin64!!!</p>
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

                window.location.href = '{{ route('customer.index') }}';
            });

        });
    </script>

</body>

</html>
