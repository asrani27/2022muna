@extends('layouts.app')
@push('css')

@endpush
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="/m/penyuluh/edit/{{$data->id}}">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Penyuluh</label>
                        <input type="text" name="nama" class="form-control" value="{{$data->nama}}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jenis Kelamin</label>
                        <select name="jkel" class="form-control">
                            <option value='L' {{$data->jkel == 'L' ? 'selected':''}}>Laki-Laki</option>
                            <option value='P' {{$data->jkel == 'P' ? 'selected':''}}>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alamat</label>
                        <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="{{$data->alamat}}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Telp</label>
                        <input type="text" name="telp" class="form-control" placeholder="Telp" value="{{$data->telp}}" required>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="/m/penyuluh" class="btn btn-danger">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')


@endpush