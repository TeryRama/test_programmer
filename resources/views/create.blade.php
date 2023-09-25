
@extends('layout/main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Data</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Data</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{route('store')}}" method="POST">
                @csrf
                <div class="row">
                  <!-- left column -->
                  <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Tambah Produk</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form>
                        <div class="card-body">
                          <div class="form-group">
                            <label for="nama_produk">Nama Produk</label>
                            <input type="text" class="form-control" name="nama_produk" id="nama_produk" placeholder="Nama Produk">
                            @error('nama_produk')
                                <small>{{$message}}</small>
                            @enderror  
                        </div>
                          <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" class="form-control" name="harga" id="harga" placeholder="Rp.00">
                            @error('harga')
                                <small>{{$message}}</small>
                            @enderror 
                          </div>
                          <div class="form-group">
                            <label for="kategori">Kategori</label>
                           <select class="custom-select form-control-border border-width-2" name="kategori" id="kategori">
                               <option value="">-pilih-</option>
                               @foreach ($data['kategori'] as $item)
                               <option value="{{$item->id_kategori}}">{{$item->nama_kategori}}</option>
                              @endforeach
                              </select>
                            @error('kategori')
                                <small>{{$message}}</small>
                            @enderror 
                          </div>
                          <div class="form-group">
                            <label for="status">Status</label>
                           <select class="custom-select form-control-border border-width-2" name="status" id="status">
                               <option value="">-pilih-</option>
                               @foreach ($data['status'] as $item)
                               <option value="{{$item->id_status}}">{{$item->nama_status}}</option>
                              @endforeach
                              </select>
                              @error('status')
                                  <small>{{$message}}</small>
                              @enderror 
                          </div>
                          
                        </div>
                        <!-- /.card-body -->
        
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </form>
                    </div>
                    <!-- /.card -->
        
                  </div>
                  <!--/.col (left) -->
                  <!-- right column -->
                  
                </div>
            </form>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
    <!-- /.content -->
  </div>
@endsection