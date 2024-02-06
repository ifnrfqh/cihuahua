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
                            <li class="breadcrumb-item"><a href="{{route('kantin.index')}}">Home</a></li>
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
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Produk</h4>
                        <span><button type="submit" class="btn btn-sm btn-success col-1 ml-3 mt-2" data-bs-toggle="modal" data-bs-target="#tambahModal" >
                            Tambah
                        </button></span>
                        <div class="table-responsive">
                            <table class="table user-table no-wrap">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">#</th>
                                        <th class="border-top-0">Produk</th>
                                        <th class="border-top-0">Nama Produk</th>
                                        <th class="border-top-0">Harga</th>
                                        <th class="border-top-0">Stok</th>
                                        <th class="border-top-0">Kategori</th>
                                        <th class="border-top-0">Deskripsi</th>
                                        <th class="border-top-0">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($produks as $i => $produk)
                                        <tr>
                                            <td class="align-middle">{{ $i + 1 }}</td>
                                            <td class="align-middle"><img src="{{ asset('./storage/produk/' . $produk->foto) }}"
                                                    alt="{{ $produk->nama_produk }}" style="max-width: 100px;"></td>
                                            <td class="align-middle">{{ $produk->nama_produk }}</td>
                                            <td class="align-middle">{{ $produk->harga }}</td>
                                            <td class="align-middle">{{ $produk->stok }}</td>
                                            <td class="align-middle">{{ $produk->kategori->nama_kategori }}</td>
                                            <td class="align-middle">{{ $produk->desc }}</td>
                                            <td>
                                                <!-- Tombol Edit untuk setiap baris -->
                                                <button type="submit" class="btn btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#editModal{{ $produk->id }}">
                                                    Edit
                                                </button>
                                                <form action="{{ route('produk.destroy', $produk->id) }}" method="POST"
                                                    style="display: inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" href=""
                                                        class="btn btn-danger" onclick="return confirm('Yakin Ingin Menghapus Produk Ini?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    @foreach ($produks as $produk)
        <!-- Modal untuk Edit -->
        <div class="modal fade" id="editModal{{ $produk->id }}" tabindex="-1" role="dialog"
            aria-labelledby="editModalLabel{{ $produk->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModal{{ $produk->id }}Label">Edit produk</h5>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Formulir Edit -->
                        <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf 
                            @method('PUT')
                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <input type="file" class="form-control-file" id="foto" name="foto">
                            </div>
                            <div class="form-group">
                                <label for="nama_produk">Nama produk</label>
                                <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                    value="{{ $produk->nama_produk }}">
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="number" class="form-control" id="harga" name="harga"
                                    value="{{ $produk->harga }}">
                            </div>
                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input type="number" class="form-control" id="stok" name="stok"
                                    value="{{ $produk->stok }}">
                            </div>
                            <div class="form-group">
                                <label for="id_kategori">Kategori</label>
                                <select class="form-control" name="id_kategori">
                                    @foreach ($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}">
                                            {{ $kategori->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="desc">Deskripsi</label>
                                <input type="text" class="form-control" id="desc" name="desc"
                                    value="{{ $produk->desc }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal untuk Tambah -->
    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahModalLabel">Tambah produk</h5>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulir Tambah -->
                    <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama_produk">Nama produk</label>
                            <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga" required>
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="number" class="form-control" id="stok" name="stok" required>
                        </div>
                        <div class="form-gorup mb-3" >
                            <label for="nama_kategori">Kategori</label>
                            <select class="form-control" name="id_kategori">
                                @foreach ($kategoris as $kategori)
                                    <option  value="{{ $kategori->id }}">
                                        {{ $kategori->nama_kategori}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="desc">Deskripsi</label>
                            <input type="text" class="form-control" id="desc" name="desc" required>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control-file" id="foto" name="foto">
                        </div>
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
