
@extends('layout/main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Semua Data</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Semua Data</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">
              <a href="{{route('create')}}" class="btn btn-primary mb-5">Tambah Data</a>
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Tabel Semua Produk</h3>
  
                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($data as $item)
                          <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->nama_produk}}</td>
                            <td>Rp.{{$item->harga}}</td>
                            <td>{{$item->nama_kategori}}</td>
                            <td>{{$item->nama_status}}</td>
                            <td>
                              <a href="{{route('edit',['id' => $item->id_produk])}}" class="btn btn-primary"><i class="fa fa-pen"></i>Edit</a>
                              <a data-toggle="modal" data-target="#modal-hapus{{$item->id_produk}}" class="btn btn-danger"><i class="fa fa-trash-alt"></i>Hapus</a>
                            </td>
                          </tr>
                          <div class="modal fade" id="modal-hapus{{$item->id_produk}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Konfirmasi Hapus Produk</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah Kamu Yakin Ingin Menghapus Produk <b>{{$item->nama_produk}}</b>?</p>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-between">
                                        <button type="button" class="btn btn-defaul" data-dismiss="modal">Tidak</button>
                                        <form action="{{route('delete',['id' => $item->id_produk])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-primary">Ya, Hapus Produk</button>
                                        </form>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        
                        @endforeach    
                                          
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection