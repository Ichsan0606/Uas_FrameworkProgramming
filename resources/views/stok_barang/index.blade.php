@extends('stok_barang.layout')
 
@section('content')
    <div class="row" style="margin-top: 1rem;">
        <div class="col-lg-12 margin-tb">
                <center><h2>STOK BARANG</h2></center>
                <br>
                <br>
            <div class="pull-left">
                <h5>Selamat datang di halaman dashboard, <strong>{{ Auth::user()->name }}</strong></h5>
            </div>
            <br>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('stok_barang.create') }}"> Tambah</a>
                <a href="/exportpdf" class="btn btn-warning">Export PDF</a>
            </div>
            <br>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
      text-align: center;
    }
    </style>
    <table class="table table-bordered">

        <tr style="background-color: blue;">
            <th>No</th>
            <th>Image</th>
            <th>Katagori barang</th>
            <th>Nama Barang</th>
            <th>Jumlah Stok</th>
            <th width="200px">Aksi</th>
        </tr>
        @foreach ($data as $key => $barang)
        <tr style="background-color: grey;">
            <td>{{ ++$i }}</td>
            <td><img src="/image/{{ $barang->image }}" width="50px"></td>
            <td>{{ $barang->katagori_barang }}</td>
            <td>{{ $barang->nama_barang }}</td>
            <td>{{ $barang->jml_stok }}</td>
            <td>
                <form action="{{ route('stok_barang.destroy',$barang->id) }}" method="POST">      
                    <a class="btn btn-primary" href="{{ route('stok_barang.edit',$barang->id) }}">Update</a>   
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>
            
        </tr>
        @endforeach
    </table>  
    <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
    {!! $data->links() !!}    
    <nav class="navbar fixed-bottom navbar-light bg-primary  text-white">
    <a class="navbar-brand">@Copyright Moh.Ichsan Maulana | 2021</a>
</nav>  
@endsection