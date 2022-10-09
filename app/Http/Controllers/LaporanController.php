<?php

namespace App\Http\Controllers;

use App\Kelompok;
use App\Penyuluh;
use App\Permohonan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class LaporanController extends Controller
{
    public function index()
    {
        return view('superadmin.laporan.index');
    }

    public function permohonan()
    {
        $data = Permohonan::get();
        $pdf = PDF::loadView('superadmin.laporan.pdf_permohonan', compact('data'))->setPaper('legal');
        return $pdf->stream();
    }
    public function kelompok()
    {
        $data = Kelompok::get();
        $pdf = PDF::loadView('superadmin.laporan.pdf_kelompok', compact('data'))->setPaper('legal');
        return $pdf->stream();
    }
    public function penyuluh()
    {
        $data = Penyuluh::get();
        $pdf = PDF::loadView('superadmin.laporan.pdf_penyuluh', compact('data'))->setPaper('legal');
        return $pdf->stream();
    }
}
