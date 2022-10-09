@extends('layouts.app')
@push('css')
@endpush
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Permohonan</h3>
                <div class="pull-right box-tools">
                    <a href="/m/permohonan/create" type="button" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i> Tambah Data</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tgl Permohonan</th>
                            <th>Kelompok Tani Pemohon</th>
                            <th>Nama Penyuluh</th>
                            <th>Bantuan</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no=1;
                        @endphp
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$item->tgl}}</td>
                            <td>{{$item->kelompok->nama}}</td>
                            <td>{{$item->penyuluh->nama}}</td>
                            <td>{{$item->bantuan->nama}}, {{number_format($item->bantuan->jumlah)}}, {{$item->bantuan->jenis}}</td>
                            <td>
                                <a href="/m/permohonan/edit/{{$item->id}}" class="btn btn-sm btn-success">Edit</a>
                                <a href="/m/permohonan/delete/{{$item->id}}" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Yakin ingin di hapus?');">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')

@endpush