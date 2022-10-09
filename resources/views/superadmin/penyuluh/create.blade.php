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
            <form role="form" method="post" action="/m/penyuluh/create">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Penyuluh</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jenis Kelamin</label>
                        <select name="jkel" class="form-control">
                            <option value='L'>Laki-Laki</option>
                            <option value='P'>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alamat</label>
                        <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Telp</label>
                        <input type="text" name="telp" class="form-control" placeholder="Telp" required>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="/m/penyuluh" class="btn btn-danger">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')


@endpush