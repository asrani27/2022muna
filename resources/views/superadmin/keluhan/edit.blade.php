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
            <form role="form" method="post" action="/m/keluhan/edit/{{$data->id}}">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Keluhan</label>
                        <input type="date" name="tgl" class="form-control" value="{{$data->tgl}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kelompok Tani</label>
                        <select name="kelompok_id" class="form-control" required>
                            <option value="">-pilih-</option>
                            @foreach ($kelompok as $item)
                                <option value="{{$item->id}}" {{$data->kelompok_id == $item->id ? 'selected':''}}>{{$item->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Isi Keluhan</label>
                        <input type="text" name="isi" class="form-control" required value="{{$data->isi}}">
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="/m/keluhan" class="btn btn-danger">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')


@endpush