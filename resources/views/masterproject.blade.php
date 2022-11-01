@extends('layout.admin')
@section('title','masterproject')
@section('content-title', 'masterproject')
@section('content')

@if($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert"></button>
    <strong>{{$message}}</strong>
</div>
@endif

<div class ="row">
    <div class ="col-lg-6">
        <div class="card shadow-mb-4">
            <div class="card-header bg-info">
                <h6 class="m-0 font-weight-bold text-white">Data Siswa</h6>
            </div>
            <div class ="card-body ">
                
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">NISN</th>
                            <th scope="col">NAMA</th>
                            <th scope="col">ACTION</th>
                            </tr>
                        </thead>
                        @foreach ($data as  $item)
                        <tbody>
                            <tr>
                           <th>{{$item -> nisn }}</th>
                           <th>{{$item -> nama }}</th>

                           <td class="text-center">
                            <a class="btn-success" onclick="show({{ $item->id }})"><i class="btn-sm info fas fa-folder-open" ></i></a>
                            <a class="btn-success" href="{{ route('masterproject.tambah', $item->id) }}"><i class="btn-sm success fas fa-plus"></i></a>
                           </td>
                        </tr>
                        </tbody>
                        @endforeach    
                    </table>

                    <div class="card-footer d-flex justify-content-center">
                        {{$data->links()}}
                    </div>
            </div>
        </div>
    </div>

    <div class ="col-lg-6">
        <div class="card shadow-mb-4">
            <div class="card-header bg-info">
                <h6 class="m-0 font-weight-bold text-white">Project Siswa</h6>
            </div>
            <div class ="card-body " id="project">
                <div class="text-center">
                    <h6>Pilih siswa terlebih dahulu</h6>
            </div>
            </div>
        </div>
    </div>
</div>
<script>
    function show(id){
        $.get('masterproject/'+id, function (data){
            $('#project').html(data);
        })

    }
</script>


@endsection