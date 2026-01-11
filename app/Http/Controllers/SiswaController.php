<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalonSiswa;
use App\Models\Pendaftaran;
use App\Models\Jurusan;
use App\Models\BerkasPendaftaran;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    /* ======================
     | DASHBOARD SISWA
     ====================== */
    public function dashboard()
    {
        $pendaftaran = Pendaftaran::with('jurusan','nilaiSeleksi')
            ->whereHas('calonSiswa', function ($q) {
                $q->where('user_id', Auth::id());
            })
            ->first();

        return view('/siswa/dashboard', compact('pendaftaran'));
    }

    /* ======================
     | FORM PENDAFTARAN
     ====================== */
    public function form()
    {
        $jurusans = Jurusan::all();
        return view('siswa.form', compact('jurusans'));
    }

    /* ======================
     | SIMPAN PENDAFTARAN
     ====================== */
    public function simpan(Request $request)
    {
        $request->validate([
            'nisn'           => 'required|unique:calon_siswas,nisn',
            'nama'           => 'required|string|max:100',
            'jenis_kelamin'  => 'required|in:L,P',
            'tanggal_lahir'  => 'required|date',
            'alamat'         => 'required',
            'asal'           => 'required|string|max:100',
            'jurusan'        => 'required|exists:jurusans,id',
        ]);

        $calonSiswa = CalonSiswa::create([
            'user_id'        => Auth::id(),
            'nisn'           => $request->nisn,
            'nama_lengkap'   => $request->nama,
            'jenis_kelamin'  => $request->jenis_kelamin,
            'tanggal_lahir'  => $request->tanggal_lahir,
            'alamat'         => $request->alamat,
            'asal_sekolah'   => $request->asal,
        ]);

        Pendaftaran::create([
            'calon_siswa_id'     => $calonSiswa->id,
            'jurusan_id'         => $request->jurusan,
            'tanggal_daftar'     => now(),
            'status_pendaftaran' => 'pending',
        ]);

        return redirect('/siswa/dashboard')
            ->with('success', 'Pendaftaran berhasil disimpan');
    }

    /* ======================
     | FORM UPLOAD BERKAS
     ====================== */
    public function uploadForm()
    {
        return view('siswa.upload-berkas');
    }

    /* ======================
     | PROSES UPLOAD BERKAS
     ====================== */
    public function uploadBerkas(Request $request)
    {
        $request->validate([
            'jenis_berkas' => 'required|in:ijazah,rapor,kk,foto',
            'file'         => 'required|file|max:2048',
        ]);

        $pendaftaran = Pendaftaran::whereHas('calonSiswa', function ($q) {
            $q->where('user_id', Auth::id());
        })->firstOrFail();

        $filePath = $request->file('file')->store('berkas', 'public');

        BerkasPendaftaran::create([
            'pendaftaran_id'    => $pendaftaran->id,
            'jenis_berkas'      => $request->jenis_berkas,
            'file_path'         => $filePath,
            'status_verifikasi' => 'menunggu',
            'catatan'           => null,
        ]);

        return redirect('/siswa/dashboard')
            ->with('success', 'Berkas berhasil diupload');
    }

    /* ======================
     | EDIT FORM PENDAFTARAN
     ====================== */
    public function edit()
    {
        $pendaftaran = Pendaftaran::with('berkas','calonSiswa')
            ->whereHas('calonSiswa', function ($q) {
                $q->where('user_id', Auth::id());
            })
            ->firstOrFail();

        $jurusans = Jurusan::all();

        return view('siswa.form-edit', compact('pendaftaran', 'jurusans'));
    }

    /* ======================
     | UPDATE PENDAFTARAN
     ====================== */
    public function update(Request $request)
    {
        $request->validate([
            'nama'          => 'required|string|max:100',
            'asal'          => 'required|string|max:100',
            'alamat'        => 'required',
            'jurusan'       => 'required|exists:jurusans,id',
        ]);

        $pendaftaran = Pendaftaran::whereHas('calonSiswa', function ($q) {
            $q->where('user_id', Auth::id());
        })->firstOrFail();

        $pendaftaran->calonSiswa->update([
            'nama_lengkap' => $request->nama,
            'asal_sekolah' => $request->asal,
            'alamat'       => $request->alamat,
        ]);

        $pendaftaran->update([
            'jurusan_id' => $request->jurusan,
        ]);

        return redirect('/siswa/dashboard')
            ->with('success', 'Data pendaftaran berhasil diperbarui');
    }

    /* ======================
     | HAPUS BERKAS
     ====================== */
    public function hapusBerkas($id)
    {
        $berkas = BerkasPendaftaran::findOrFail($id);

        if (Storage::disk('public')->exists($berkas->file_path)) {
            Storage::disk('public')->delete($berkas->file_path);
        }

        $berkas->delete();

        return back()->with('success', 'Berkas berhasil dihapus. Silakan upload ulang.');
    }
}
