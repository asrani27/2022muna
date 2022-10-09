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
            <form role="form" method="post" action="/m/permohonan/create">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Permohonan</label>
                        <input type="date" name="tgl" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kelompok Tani Pemohon</label>
                        <select name="kelompok_id" class="form-control" required>
                            <option value="">-pilih-</option>
                            @foreach ($kelompok as $item)
                                <option value="{{$item->id}}">{{$item->nama}}</option>
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
                        <label for="exampleInputEmail1">Bantuan</label>
                        <select name="bantuan_id" class="form-control" required>
                            <option value="">-pilih-</option>
                            @foreach ($bantuan as $item)
                                <option value="{{$item->id}}">{{$item->nama}} - {{$item->jumlah}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="/m/permohonan" class="btn btn-danger">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')


@endpush