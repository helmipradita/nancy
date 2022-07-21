@extends('dashboard.layouts.base')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">Produk</h1>
                    @if(session('sukses'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('sukses') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif
                    @if(session('edit'))
                      <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ session('edit') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif
                    @if(session('delete'))
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('delete') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                            <span><i class="nav-icon fa fa-plus"></i>  Tambah data produk</span>
                          </button>
                        </div>
                        <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>Kode Barang</th>
                              <th>Nama</th>
                              <th>Stok</th>
                              <th>Harga</th>
                              <th>Gambar</th>
                              <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                              @foreach($products as $data)
                                <tr>
                                    <td>{{ $data->kodebrg }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->stok }}</td>
                                    <td>{{ $data->harga }}</td>
                                    <td>{{ $data->gambar }}</td>
                                    <td>
                                      <button type="button" class="btn btn-info"
                                      data-id="{{$data->id}}"
                                      data-kodebrg="{{$data->kodebrg}}"
                                      data-nama="{{$data->nama}}"
                                      data-stok="{{$data->stok}}"
                                      data-harga="{{$data->harga}}"
                                      data-gambar="{{$data->gambar}}"
                                      data-toggle="modal" data-target="#editModal">
                                        <span><i class="nav-icon fa fa-edit"></i>  Edit</span>
                                      </button>
                                      <button type="button" class="btn btn-danger" 
                                      data-id="{{$data->id}}"
                                      data-kodebrg="{{$data->kodebrg}}"
                                      data-nama="{{$data->nama}}"
                                      data-stok="{{$data->stok}}"
                                      data-harga="{{$data->harga}}"
                                      data-gambar="{{$data->gambar}}"
                                      data-toggle="modal" data-target="#deleteModal">
                                        <span><i class="nav-icon fa fa-trash"></i>  Hapus</span>
                                      </button>
                                    </td>
                                </tr>
                              @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                              <th>Kode Barang</th>
                              <th>Nama</th>
                              <th>Stok</th>
                              <th>Harga</th>
                              <th>Gambar</th>
                            </tr>
                            </tfoot>
                          </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Tambah --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Form Data Produk</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="/dashboard/products/tambah" method="post" enctype="multipart/form-data">
              @csrf
              @method('POST')
              <div class="form-group">
                <label for="kodebrg">Kode Barang</label>
                <input type="text" class="form-control" id="kodebrg" name="kodebrg">
              </div>
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama">
              </div>
              <div class="form-group">
                <label for="stok">Stok</label>
                <input type="text" class="form-control" id="stok" name="stok">
              </div>
              <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga">
              </div>
              <div class="form-group">
                <label for="gambar">gambar</label>
                <input type="text" class="form-control" id="gambar" name="gambar">
              </div>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    {{-- Modal Edit --}}
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Data Produk</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="/dashboard/products/edit" method="post" enctype="multipart/form-data">
              @csrf
              @method('POST')
              <div class="form-group">
                <input type="hidden" class="form-control" id="id" name="id">
              </div>
              <div class="form-group">
                <label for="kodebrg">Kode Barang</label>
                <input type="text" class="form-control" id="kodebrg" name="kodebrg" readonly>
              </div>
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama">
              </div>
              <div class="form-group">
                <label for="stok">Stok</label>
                <input type="text" class="form-control" id="stok" name="stok">
              </div>
              <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga">
              </div>
              <div class="form-group">
                <label for="gambar">gambar</label>
                <input type="text" class="form-control" id="gambar" name="gambar">
              </div>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-info">Edit</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    {{-- Modal Delete --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Data Produk</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="/dashboard/products/delete" method="post" enctype="multipart/form-data">
              @csrf
              @method('POST')
              <div class="form-group">
                <input type="hidden" class="form-control" id="id" name="id">
              </div>
              <div class="form-group">
                <label for="kodebrg">Kode Barang</label>
                <input type="text" class="form-control" id="kodebrg" name="kodebrg" readonly>
              </div>
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" readonly>
              </div>
              <div class="form-group">
                <label for="stok">Stok</label>
                <input type="text" class="form-control" id="stok" name="stok" readonly>
              </div>
              <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga" readonly>
              </div>
              <div class="form-group">
                <label for="gambar">gambar</label>
                <input type="text" class="form-control" id="gambar" name="gambar" readonly>
              </div>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    {{-- File Script untuk cek validasi dari modal ada di dashboard.layouts.base --}}
@endsection