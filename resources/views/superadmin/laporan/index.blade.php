@extends('layouts.app')
@push('css')
@endpush
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Laporan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <a href="/laporan/kelompok" class="btn btn-primary" target="_blank">DATA KELOMPOK TANI</a>
                <a href="/laporan/penyuluh" class="btn btn-primary" target="_blank">DATA PENYULUH</a>
                <a href="/laporan/permohonan" class="btn btn-primary" target="_blank">DATA PERMOHONAN</a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')

@endpush