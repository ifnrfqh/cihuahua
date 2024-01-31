<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="bg-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- -- Nested Row within Card body -- -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Buat Akun!</h1>
                                    </div>
                                    <form method="post" action="{{ route('registrasi') }}"
                                        class="login100-form-title p-b-43">
                                        @csrf
                                        <span class="login100-form-title p-b-43">
                                        </span>
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $item)
                                                        <li>{{ $item }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        @if (Session::get('success'))
                                            <div class="alert alert-success alert-dismissible fade show">
                                                <ul>
                                                    <li>{{ Session::get('success') }}</li>
                                                </ul>
                                            </div>
                                        @endif

                                        <div class="form-group mb-3">
                                            <input type="text" class="form-control" id="name" name="fullname"
                                                 placeholder="Nama Lengkap" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <input type="text" class="form-control" id="email" name="email"
                                                placeholder="Email" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <div class="col">
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Password" required>
                                        </div>
                                    </div>
                                        <button type="submit" class="btn btn-primary col-12">Register</button>
                                    </form>
                                    <hr>
                                    <div class="text-center mt-2">
                                        Sudah punya akun? <a href="{{route('auth')}}" class="text-primary">Login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootsrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7CBIVInixGAoxmlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>