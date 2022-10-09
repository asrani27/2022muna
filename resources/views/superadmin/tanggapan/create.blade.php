@extends('layouts.app')
@push('css')

@endpush
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="/m/tanggapan/create">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Tanggapan</label>
                        <input type="date" name="tgl" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Keluhan</label>
                        <select name="keluhan_id" class="form-control" required>
                            <option value="">-pilih-</option>
                            @foreach ($keluhan as $item)
                                <option value="{{$item->id}}">{{$item->isi}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Penyuluh</label>
                        <select name="penyuluh_id" class="form-control" required>
                            <option value="">-pilih-</option>
                            @foreach ($penyuluh as $item)
                                <option value="{{$item->id}}">{{$item->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tindak Lanjut</label>
                        <input type="text" name="tindaklanjut" class="form-control" required>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="/m/tanggapan" class="btn btn-danger">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')


@endpush