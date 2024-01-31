<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="bg-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h2 class="h4 text-gray-900 mb-4">Selamat Datang di Kantin</h2>
                                        <p>Silahkan Masukan Akun Anda</p>
                                        <hr>
                                    </div>
                                    <form action="" method="post" class="login100-form validate-form">
                                        @csrf
                                        <span class="login100-form-title p-b-43">
                                        </span>
                                        @if($errors->any())
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
                                                <li>{{Session::get('success')}}</li>
                                            </ul>
                                        </div>
                                        @endif

                                        <div class="form-group mb-3">
                                            <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="Email">
                                        </div>
                                        <div class="form-group mb-3">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                        </div>
                                        <button type="submit" class="btn btn-primary col-12">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <!-- <div class="text-center">
                                        <a href="forgot-password.php" class="small">Lupa Password?</a>
                                    </div> -->
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>