@extends('layout.admin')
@section('title','TambahProject')
@section('content-title','tambahkan project ' . $siswa->nama)
@section('content')
    
<div class="card shadow-lg p-3 mb-5 bg-white rounded">
    <div class="card-body">
        <form action="{{route ('masterproject.store')}}" method="post">
            @csrf
            <div class="form-group">
                <input type="hidden"  name="id_siswa" value="{{ $siswa->id }}">
                <label>Nama Project</label>
                <input type="text" class="form-control" id="nama_project" name="nama_project">
            </div>
            <div class="form-group">
                <label>Deskripsi Proyek</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
            </div>
            <div class="form-group">
                <label>Tanggal Project</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success">
                <a href="{{ route('masterproject.index') }}" class="btn btn-danger">Batal</a>
            </div>
        </form>
    </div>
</div>


@endsection