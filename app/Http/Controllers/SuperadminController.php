<?php

namespace App\Http\Controllers;

use App\PKG;
use App\Spt;
use App\Role;
use App\Skpd;
use App\Sppd;
use App\User;
use App\Biaya;
use App\Sekda;
use App\Bantuan;
use App\Keluhan;
use App\Pegawai;
use App\Periode;
use App\Kelompok;
use App\Penyuluh;
use App\Bendahara;
use App\Tanggapan;
use App\Pembayaran;
use App\Permohonan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class SuperadminController extends Controller
{
    public function beranda()
    {
        return view('superadmin.beranda');
    }

    public function periode()
    {
        $data = Periode::orderBy('id', 'DESC')->get();
        return view('superadmin.periode.index', compact('data'));
    }
    public function periodecreate()
    {
        return view('superadmin.periode.create');
    }
    public function periodestore(Request $req)
    {
        $attr = $req->all();

        $check = Periode::where('tahun', $req->tahun)->where('semester', $req->semester)->first();
        if ($check == null) {
            Periode::create($attr);
            toastr()->success('Berhasil disimpan');
            return redirect('/m/periode');
        } else {
            toastr()->error('Sudah Ada');
            return back();
        }
    }
    public function periodeedit($id)
    {
        $data = Periode::find($id);
        return view('superadmin.periode.edit', compact('data'));
    }
    public function periodeupdate(Request $req, $id)
    {
        $attr = $req->all();
        $check = Periode::where('tahun', $req->tahun)->where('semester', $req->semester)->first();
        if ($check == null) {
            //simpan
            Periode::find($id)->update($attr);
            toastr()->success('Berhasil disimpan');
            return redirect('/m/periode');
        } else {
            if ($id == $check->id) {
                Periode::find($id)->update($attr);
                toastr()->success('Berhasil diupdate');
                return redirect('/m/periode');
            } else {
                toastr()->error('Sudah ada');
                return back();
            }
        }
    }
    public function periodedelete($id)
    {
        Periode::find($id)->delete();
        toastr()->success('Berhasil dihapus');
        return back();
    }


    public function jabatan()
    {
        $data = Jabatan::orderBy('id', 'DESC')->get();
        return view('superadmin.jabatan.index', compact('data'));
    }
    public function jabatancreate()
    {
        return view('superadmin.jabatan.create');
    }
    public function jabatanstore(Request $req)
    {
        $attr = $req->all();

        $check = Jabatan::where('kode', $req->kode)->first();
        if ($check == null) {
            Jabatan::create($attr);
            toastr()->success('Berhasil disimpan');
            return redirect('/m/jabatan');
        } else {
            toastr()->error('Sudah Ada');
            return back();
        }
    }
    public function jabatanedit($id)
    {
        $data = Jabatan::find($id);
        return view('superadmin.jabatan.edit', compact('data'));
    }
    public function jabatanupdate(Request $req, $id)
    {
        $attr = $req->all();
        $check = Jabatan::where('kode', $req->kode)->first();
        if ($check == null) {
            //simpan
            Jabatan::find($id)->update($attr);
            toastr()->success('Berhasil disimpan');
            return redirect('/m/jabatan');
        } else {
            if ($id == $check->id) {
                Jabatan::find($id)->update($attr);
                toastr()->success('Berhasil diupdate');
                return redirect('/m/jabatan');
            } else {
                toastr()->error('Sudah ada');
                return back();
            }
        }
    }
    public function jabatandelete($id)
    {
        Jabatan::find($id)->delete();
        toastr()->success('Berhasil dihapus');
        return back();
    }

    public function sekda()
    {
        $data = Sekda::orderBy('id', 'DESC')->get();
        return view('superadmin.sekda.index', compact('data'));
    }
    public function sekdacreate()
    {
        $jabatan = Jabatan::get();
        return view('superadmin.sekda.create', compact('jabatan'));
    }
    public function sekdastore(Request $req)
    {
        $attr = $req->all();

        $check = Sekda::where('nip', $req->nip)->first();
        if ($check == null) {
            Sekda::create($attr);
            toastr()->success('Berhasil disimpan');
            return redirect('/m/sekda');
        } else {
            toastr()->error('nip Sudah Ada');
            return back();
        }
    }
    public function sekdaedit($id)
    {
        $data = Sekda::find($id);
        $jabatan = Jabatan::get();
        return view('superadmin.sekda.edit', compact('data', 'jabatan'));
    }
    public function sekdaupdate(Request $req, $id)
    {
        $attr = $req->all();
        $check = Sekda::where('nip', $req->nip)->first();
        if ($check == null) {
            //simpan
            Sekda::find($id)->update($attr);
            toastr()->success('Berhasil disimpan');
            return redirect('/m/sekda');
        } else {
            if ($id == $check->id) {
                Sekda::find($id)->update($attr);
                toastr()->success('Berhasil diupdate');
                return redirect('/m/sekda');
            } else {
                toastr()->error('nip sekda Sudah ada');
                return back();
            }
        }
    }
    public function sekdadelete($id)
    {
        Sekda::find($id)->delete();
        toastr()->success('Berhasil dihapus');
        return back();
    }


    public function bendahara()
    {
        $data = Bendahara::orderBy('id', 'DESC')->get();
        return view('superadmin.bendahara.index', compact('data'));
    }
    public function bendaharacreate()
    {
        $jabatan = Jabatan::get();
        return view('superadmin.bendahara.create', compact('jabatan'));
    }
    public function bendaharastore(Request $req)
    {
        $attr = $req->all();

        $check = Bendahara::where('nip', $req->nip)->first();
        if ($check == null) {
            Bendahara::create($attr);
            toastr()->success('Berhasil disimpan');
            return redirect('/m/bendahara');
        } else {
            toastr()->error('nip Sudah Ada');
            return back();
        }
    }
    public function bendaharaedit($id)
    {
        $data = Bendahara::find($id);
        $jabatan = Jabatan::get();
        return view('superadmin.bendahara.edit', compact('data', 'jabatan'));
    }
    public function bendaharaupdate(Request $req, $id)
    {
        $attr = $req->all();
        $check = Bendahara::where('nip', $req->nip)->first();
        if ($check == null) {
            //simpan
            Bendahara::find($id)->update($attr);
            toastr()->success('Berhasil disimpan');
            return redirect('/m/bendahara');
        } else {
            if ($id == $check->id) {
                Bendahara::find($id)->update($attr);
                toastr()->success('Berhasil diupdate');
                return redirect('/m/bendahara');
            } else {
                toastr()->error('nip bendahara Sudah ada');
                return back();
            }
        }
    }
    public function bendaharadelete($id)
    {
        Bendahara::find($id)->delete();
        toastr()->success('Berhasil dihapus');
        return back();
    }

    public function skpd()
    {
        $data = Skpd::orderBy('id', 'DESC')->get();
        return view('superadmin.skpd.index', compact('data'));
    }
    public function skpdcreate()
    {
        return view('superadmin.skpd.create');
    }
    public function skpdstore(Request $req)
    {
        $attr = $req->all();

        $check = Skpd::where('kode', $req->kode)->first();
        if ($check == null) {
            Skpd::create($attr);
            toastr()->success('Berhasil disimpan');
            return redirect('/m/skpd');
        } else {
            toastr()->error('kode Sudah Ada');
            return back();
        }
    }
    public function skpdedit($id)
    {
        $data = Skpd::find($id);
        return view('superadmin.skpd.edit', compact('data'));
    }
    public function skpdupdate(Request $req, $id)
    {
        $attr = $req->all();
        $check = Skpd::where('kode', $req->kode)->first();
        if ($check == null) {
            //simpan
            Skpd::find($id)->update($attr);
            toastr()->success('Berhasil disimpan');
            return redirect('/m/skpd');
        } else {
            if ($id == $check->id) {
                Skpd::find($id)->update($attr);
                toastr()->success('Berhasil diupdate');
                return redirect('/m/skpd');
            } else {
                toastr()->error('kode skpd Sudah ada');
                return back();
            }
        }
    }
    public function skpddelete($id)
    {
        Skpd::find($id)->delete();
        toastr()->success('Berhasil dihapus');
        return back();
    }

    public function biaya()
    {
        $data = Biaya::orderBy('id', 'DESC')->get();
        return view('superadmin.biaya.index', compact('data'));
    }
    public function biayacreate()
    {
        $jabatan = Jabatan::get();
        return view('superadmin.biaya.create', compact('jabatan'));
    }
    public function biayastore(Request $req)
    {
        $attr = $req->all();

        $check = Biaya::where('kode', $req->kode)->first();
        if ($check == null) {
            Biaya::create($attr);
            toastr()->success('Berhasil disimpan');
            return redirect('/m/biaya');
        } else {
            toastr()->error('kode Sudah Ada');
            return back();
        }
    }
    public function biayaedit($id)
    {
        $data = Biaya::find($id);
        $jabatan = Jabatan::get();
        return view('superadmin.biaya.edit', compact('data', 'jabatan'));
    }
    public function biayaupdate(Request $req, $id)
    {
        $attr = $req->all();
        $check = Biaya::where('kode', $req->kode)->first();
        if ($check == null) {
            //simpan
            Biaya::find($id)->update($attr);
            toastr()->success('Berhasil disimpan');
            return redirect('/m/biaya');
        } else {
            if ($id == $check->id) {
                Biaya::find($id)->update($attr);
                toastr()->success('Berhasil diupdate');
                return redirect('/m/biaya');
            } else {
                toastr()->error('kode biaya Sudah ada');
                return back();
            }
        }
    }
    public function biayadelete($id)
    {
        Biaya::find($id)->delete();
        toastr()->success('Berhasil dihapus');
        return back();
    }

    public function spt()
    {
        $data = Spt::orderBy('id', 'DESC')->get();
        return view('superadmin.spt.index', compact('data'));
    }
    public function sptcreate()
    {
        $biaya = Biaya::get();
        $skpd = Skpd::get();
        $pegawai = Pegawai::get();
        return view('superadmin.spt.create', compact('biaya', 'skpd', 'pegawai'));
    }
    public function sptstore(Request $req)
    {
        $attr = $req->all();

        $check = Spt::where('kode_spt', $req->kode_spt)->first();

        if ($check == null) {
            Spt::create($attr);
            toastr()->success('Berhasil disimpan');
            return redirect('/m/spt');
        } else {
            toastr()->error('kode Sudah Ada');
            return back();
        }
    }
    public function sptedit($id)
    {
        $data = Spt::find($id);
        $biaya = Biaya::get();
        $skpd = Skpd::get();
        $pegawai = Pegawai::get();
        return view('superadmin.spt.edit', compact('data', 'biaya', 'skpd', 'pegawai'));
    }
    public function sptupdate(Request $req, $id)
    {
        $attr = $req->all();
        $check = Spt::where('kode_spt', $req->kode_spt)->first();
        if ($check == null) {
            //simpan
            Spt::find($id)->update($attr);
            toastr()->success('Berhasil disimpan');
            return redirect('/m/spt');
        } else {
            if ($id == $check->id) {
                Spt::find($id)->update($attr);
                toastr()->success('Berhasil diupdate');
                return redirect('/m/spt');
            } else {
                toastr()->error('kode spt Sudah ada');
                return back();
            }
        }
    }
    public function sptdelete($id)
    {
        Spt::find($id)->delete();
        toastr()->success('Berhasil dihapus');
        return back();
    }


    public function sppd()
    {
        $data = Sppd::orderBy('id', 'DESC')->get();
        return view('superadmin.sppd.index', compact('data'));
    }
    public function sppdcreate()
    {
        $biaya = Biaya::get();
        $spt = Spt::get();
        $sekda = Sekda::get();
        return view('superadmin.sppd.create', compact('biaya', 'spt', 'sekda'));
    }
    public function sppdstore(Request $req)
    {
        $attr = $req->all();

        $check = Sppd::where('nomor', $req->nomor)->first();

        if ($check == null) {
            Sppd::create($attr);
            toastr()->success('Berhasil disimpan');
            return redirect('/m/sppd');
        } else {
            toastr()->error('nomor sppd Sudah Ada');
            return back();
        }
    }
    public function sppdedit($id)
    {
        $data = Sppd::find($id);
        $biaya = Biaya::get();
        $spt = Spt::get();
        $sekda = Sekda::get();
        return view('superadmin.sppd.edit', compact('data', 'biaya', 'spt', 'sekda'));
    }
    public function sppdupdate(Request $req, $id)
    {
        $attr = $req->all();
        $check = Sppd::where('nomor', $req->nomor)->first();
        if ($check == null) {
            //simpan
            Sppd::find($id)->update($attr);
            toastr()->success('Berhasil disimpan');
            return redirect('/m/sppd');
        } else {
            if ($id == $check->id) {
                Sppd::find($id)->update($attr);
                toastr()->success('Berhasil diupdate');
                return redirect('/m/sppd');
            } else {
                toastr()->error('nomor sppd Sudah ada');
                return back();
            }
        }
    }
    public function sppddelete($id)
    {
        Sppd::find($id)->delete();
        toastr()->success('Berhasil dihapus');
        return back();
    }


    public function pembayaran()
    {
        $data = Pembayaran::orderBy('id', 'DESC')->get();
        return view('superadmin.pembayaran.index', compact('data'));
    }
    public function pembayarancreate()
    {
        $sppd = Sppd::get();
        $pegawai = Pegawai::get();
        $bendahara = Bendahara::get();
        return view('superadmin.pembayaran.create', compact('pegawai', 'bendahara', 'sppd'));
    }
    public function pembayaranstore(Request $req)
    {
        $attr = $req->all();

        $check = Pembayaran::where('nomor', $req->nomor)->first();

        if ($check == null) {
            Pembayaran::create($attr);
            toastr()->success('Berhasil disimpan');
            return redirect('/m/pembayaran');
        } else {
            toastr()->error('nomor pembayaran Sudah Ada');
            return back();
        }
    }
    public function pembayaranedit($id)
    {
        $data = Pembayaran::find($id);
        $sppd = Sppd::get();
        $pegawai = Pegawai::get();
        $bendahara = Bendahara::get();
        return view('superadmin.pembayaran.edit', compact('data', 'sppd', 'pegawai', 'bendahara'));
    }
    public function pembayaranupdate(Request $req, $id)
    {
        $attr = $req->all();
        $check = Pembayaran::where('nomor', $req->nomor)->first();
        if ($check == null) {
            //simpan
            Pembayaran::find($id)->update($attr);
            toastr()->success('Berhasil disimpan');
            return redirect('/m/pembayaran');
        } else {
            if ($id == $check->id) {
                Pembayaran::find($id)->update($attr);
                toastr()->success('Berhasil diupdate');
                return redirect('/m/pembayaran');
            } else {
                toastr()->error('nomor pembayaran Sudah ada');
                return back();
            }
        }
    }
    public function pembayarandelete($id)
    {
        Pembayaran::find($id)->delete();
        toastr()->success('Berhasil dihapus');
        return back();
    }

    public function kelompok()
    {
        $data = kelompok::orderBy('id', 'DESC')->get();
        return view('superadmin.kelompok.index', compact('data'));
    }
    public function kelompokcreate()
    {
        return view('superadmin.kelompok.create');
    }

    public function kelompokstore(Request $req)
    {
        $attr = $req->all();

        $check = Kelompok::where('nama', $req->nama)->first();
        if ($check == null) {
            Kelompok::create($attr);
            toastr()->success('Berhasil disimpan');
            return redirect('/m/kelompok');
        } else {
            toastr()->error('nama Sudah Ada');
            return back();
        }
    }
    public function kelompokedit($id)
    {
        $data = Kelompok::find($id);
        return view('superadmin.kelompok.edit', compact('data'));
    }
    public function kelompokupdate(Request $req, $id)
    {
        $attr = $req->all();
        $check = Kelompok::where('nama', $req->nama)->first();
        if ($check == null) {
            //simpan
            Kelompok::find($id)->update($attr);
            toastr()->success('Berhasil disimpan');
            return redirect('/m/kelompok');
        } else {
            if ($id == $check->id) {
                Kelompok::find($id)->update($attr);
                toastr()->success('Berhasil diupdate');
                return redirect('/m/kelompok');
            } else {
                toastr()->error('nama kelompok Sudah ada');
                return back();
            }
        }
    }
    public function kelompokdelete($id)
    {
        Kelompok::find($id)->delete();
        toastr()->success('Berhasil dihapus');
        return back();
    }

    public function penyuluh()
    {
        $data = Penyuluh::orderBy('id', 'DESC')->get();
        return view('superadmin.penyuluh.index', compact('data'));
    }
    public function penyuluhcreate()
    {
        return view('superadmin.penyuluh.create');
    }

    public function penyuluhstore(Request $req)
    {
        $attr = $req->all();

        $check = Penyuluh::where('nama', $req->nama)->first();
        if ($check == null) {
            Penyuluh::create($attr);
            toastr()->success('Berhasil disimpan');
            return redirect('/m/penyuluh');
        } else {
            toastr()->error('nama Sudah Ada');
            return back();
        }
    }
    public function penyuluhedit($id)
    {
        $data = Penyuluh::find($id);
        return view('superadmin.penyuluh.edit', compact('data'));
    }
    public function penyuluhupdate(Request $req, $id)
    {
        $attr = $req->all();
        $check = Penyuluh::where('nama', $req->nama)->first();
        if ($check == null) {
            //simpan
            Penyuluh::find($id)->update($attr);
            toastr()->success('Berhasil disimpan');
            return redirect('/m/penyuluh');
        } else {
            if ($id == $check->id) {
                Penyuluh::find($id)->update($attr);
                toastr()->success('Berhasil diupdate');
                return redirect('/m/penyuluh');
            } else {
                toastr()->error('nama penyuluh Sudah ada');
                return back();
            }
        }
    }
    public function penyuluhdelete($id)
    {
        Penyuluh::find($id)->delete();
        toastr()->success('Berhasil dihapus');
        return back();
    }

    public function bantuan()
    {
        $data = Bantuan::orderBy('id', 'DESC')->get();
        return view('superadmin.bantuan.index', compact('data'));
    }
    public function bantuancreate()
    {
        return view('superadmin.bantuan.create');
    }

    public function bantuanstore(Request $req)
    {
        $attr = $req->all();

        $check = Bantuan::where('nama', $req->nama)->first();
        if ($check == null) {
            Bantuan::create($attr);
            toastr()->success('Berhasil disimpan');
            return redirect('/m/bantuan');
        } else {
            toastr()->error('nama bantuan Sudah Ada');
            return back();
        }
    }
    public function bantuanedit($id)
    {
        $data = Bantuan::find($id);
        return view('superadmin.bantuan.edit', compact('data'));
    }
    public function bantuanupdate(Request $req, $id)
    {
        $attr = $req->all();
        $check = Bantuan::where('nama', $req->nama)->first();
        if ($check == null) {
            //simpan
            Bantuan::find($id)->update($attr);
            toastr()->success('Berhasil disimpan');
            return redirect('/m/bantuan');
        } else {
            if ($id == $check->id) {
                Bantuan::find($id)->update($attr);
                toastr()->success('Berhasil diupdate');
                return redirect('/m/bantuan');
            } else {
                toastr()->error('nama bantuan Sudah ada');
                return back();
            }
        }
    }
    public function bantuandelete($id)
    {
        Bantuan::find($id)->delete();
        toastr()->success('Berhasil dihapus');
        return back();
    }

    public function permohonan()
    {
        $data = Permohonan::orderBy('id', 'DESC')->get();
        return view('superadmin.permohonan.index', compact('data'));
    }
    public function permohonancreate()
    {
        $kelompok = Kelompok::get();
        $penyuluh = Penyuluh::get();
        $bantuan = Bantuan::get();
        return view('superadmin.permohonan.create', compact('kelompok', 'penyuluh', 'bantuan'));
    }

    public function permohonanstore(Request $req)
    {
        $attr = $req->all();

        $check = null;
        if ($check == null) {
            Permohonan::create($attr);
            toastr()->success('Berhasil disimpan');
            return redirect('/m/permohonan');
        } else {
            toastr()->error('nama permohonan Sudah Ada');
            return back();
        }
    }
    public function permohonanedit($id)
    {
        $data = Permohonan::find($id);
        $kelompok = Kelompok::get();
        $penyuluh = Penyuluh::get();
        $bantuan = Bantuan::get();
        return view('superadmin.permohonan.edit', compact('data', 'kelompok', 'penyuluh', 'bantuan'));
    }
    public function permohonanupdate(Request $req, $id)
    {
        $attr = $req->all();
        $check = null;
        if ($check == null) {
            //simpan
            Permohonan::find($id)->update($attr);
            toastr()->success('Berhasil disimpan');
            return redirect('/m/permohonan');
        } else {
            if ($id == $check->id) {
                Permohonan::find($id)->update($attr);
                toastr()->success('Berhasil diupdate');
                return redirect('/m/permohonan');
            } else {
                toastr()->error('nama permohonan Sudah ada');
                return back();
            }
        }
    }
    public function permohonandelete($id)
    {
        Permohonan::find($id)->delete();
        toastr()->success('Berhasil dihapus');
        return back();
    }

    public function keluhan()
    {
        $data = Keluhan::orderBy('id', 'DESC')->get();
        return view('superadmin.keluhan.index', compact('data'));
    }
    public function keluhancreate()
    {
        $kelompok = Kelompok::get();
        return view('superadmin.keluhan.create', compact('kelompok'));
    }

    public function keluhanstore(Request $req)
    {
        $attr = $req->all();

        $check = null;
        if ($check == null) {
            Keluhan::create($attr);
            toastr()->success('Berhasil disimpan');
            return redirect('/m/keluhan');
        } else {
            toastr()->error('nama keluhan Sudah Ada');
            return back();
        }
    }
    public function keluhanedit($id)
    {
        $data = Keluhan::find($id);
        $kelompok = Kelompok::get();
        return view('superadmin.keluhan.edit', compact('data', 'kelompok'));
    }
    public function keluhanupdate(Request $req, $id)
    {
        $attr = $req->all();
        $check = null;
        if ($check == null) {
            //simpan
            Keluhan::find($id)->update($attr);
            toastr()->success('Berhasil disimpan');
            return redirect('/m/keluhan');
        } else {
            if ($id == $check->id) {
                Keluhan::find($id)->update($attr);
                toastr()->success('Berhasil diupdate');
                return redirect('/m/keluhan');
            } else {
                toastr()->error('nama keluhan Sudah ada');
                return back();
            }
        }
    }
    public function keluhandelete($id)
    {
        Keluhan::find($id)->delete();
        toastr()->success('Berhasil dihapus');
        return back();
    }


    public function tanggapan()
    {
        $data = Tanggapan::orderBy('id', 'DESC')->get();
        return view('superadmin.tanggapan.index', compact('data'));
    }
    public function tanggapancreate()
    {
        $keluhan = Keluhan::get();
        $penyuluh = Penyuluh::get();
        return view('superadmin.tanggapan.create', compact('keluhan', 'penyuluh'));
    }

    public function tanggapanstore(Request $req)
    {
        $attr = $req->all();

        $check = null;
        if ($check == null) {
            Tanggapan::create($attr);
            toastr()->success('Berhasil disimpan');
            return redirect('/m/tanggapan');
        } else {
            toastr()->error('nama tanggapan Sudah Ada');
            return back();
        }
    }
    public function tanggapanedit($id)
    {
        $data = Tanggapan::find($id);
        $keluhan = Keluhan::get();
        $penyuluh = Penyuluh::get();
        return view('superadmin.tanggapan.edit', compact('data', 'keluhan', 'penyuluh'));
    }
    public function tanggapanupdate(Request $req, $id)
    {
        $attr = $req->all();
        $check = null;
        if ($check == null) {
            //simpan
            Tanggapan::find($id)->update($attr);
            toastr()->success('Berhasil disimpan');
            return redirect('/m/tanggapan');
        } else {
            if ($id == $check->id) {
                Tanggapan::find($id)->update($attr);
                toastr()->success('Berhasil diupdate');
                return redirect('/m/tanggapan');
            } else {
                toastr()->error('nama tanggapan Sudah ada');
                return back();
            }
        }
    }
    public function tanggapandelete($id)
    {
        Tanggapan::find($id)->delete();
        toastr()->success('Berhasil dihapus');
        return back();
    }
}
