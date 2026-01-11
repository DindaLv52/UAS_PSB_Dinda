<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\NilaiSeleksi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /* =======================
       DASHBOARD
    ======================= */
    public function dashboard()
    {
        return view('admin.dashboard', [
            'pendingCount'  => Pendaftaran::where('status_pendaftaran', 'pending')->count(),
            'lulusCount'    => Pendaftaran::where('status_pendaftaran', 'lulus')->count(),
            'cadanganCount' => Pendaftaran::where('status_pendaftaran', 'cadangan')->count(),
            'ditolakCount'  => Pendaftaran::where('status_pendaftaran', 'ditolak')->count(),
        ]);
    }

    /* =======================
       DATA PENDAFTAR
    ======================= */
    public function pending()
    {
        $data = Pendaftaran::with(['calonSiswa', 'jurusan'])
            ->where('status_pendaftaran', 'pending')
            ->latest()
            ->get();

        return view('admin.pendaftaran-pending', compact('data'));
    }

    public function lulus()
    {
        $data = Pendaftaran::with(['calonSiswa', 'jurusan'])
            ->where('status_pendaftaran', 'lulus')
            ->latest()
            ->get();

        return view('admin.pendaftaran-lulus', compact('data'));
    }

    public function cadangan()
    {
        $data = Pendaftaran::with(['calonSiswa', 'jurusan'])
            ->where('status_pendaftaran', 'cadangan')
            ->latest()
            ->get();

        return view('admin.pendaftaran-cadangan', compact('data'));
    }

    public function ditolak()
    {
        $data = Pendaftaran::with(['calonSiswa', 'jurusan'])
            ->where('status_pendaftaran', 'ditolak')
            ->latest()
            ->get();

        return view('admin.pendaftaran-ditolak', compact('data'));
    }

    /* =======================
       DETAIL PENDAFTAR
    ======================= */
    public function detail($id)
    {
        $pendaftaran = Pendaftaran::with([
            'calonSiswa',
            'jurusan',
            'berkas',
            'nilaiSeleksi'
        ])->findOrFail($id);

        return view('admin.detail-pendaftaran', compact('pendaftaran'));
    }

    /* =======================
       VERIFIKASI MANUAL
    ======================= */
    public function verifikasi(Request $request, $id)
    {
        $request->validate([
            'status_pendaftaran' => 'required|in:lulus,cadangan,ditolak'
        ]);

        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->update([
            'status_pendaftaran' => $request->status_pendaftaran
        ]);

        return redirect('/admin/pendaftar/pending')
            ->with('success', 'Status pendaftaran berhasil diperbarui');
    }

    /* =======================
       INPUT NILAI SELEKSI
    ======================= */
    public function nilai(Request $request)
    {
        $request->validate([
            'id'    => 'required|exists:pendaftarans,id',
            'rapor' => 'required|numeric|min:0|max:100',
            'tes'   => 'required|numeric|min:0|max:100',
        ]);

        $nilaiAkhir = ($request->rapor + $request->tes) / 2;

        // simpan / update nilai seleksi
        NilaiSeleksi::updateOrCreate(
            ['pendaftaran_id' => $request->id],
            [
                'nilai_rapor' => $request->rapor,
                'nilai_tes'   => $request->tes,
                'nilai_akhir' => $nilaiAkhir
            ]
        );

        // tentukan status otomatis
        $status_lulus = match (true) {
            $nilaiAkhir >= 80 => 'lulus',
            $nilaiAkhir >= 65 => 'cadangan',
            default           => 'ditolak',
        };

        NilaiSeleksi::where('id', $request->id)->update([
            'status_lulus' => $status_lulus
        ]);

        return back()->with('success', 'Nilai seleksi & status berhasil diperbarui');
    }

    /* =======================
       LAPORAN
    ======================= */
    public function laporan()
    {
        $data = Pendaftaran::with([
            'calonSiswa',
            'jurusan',
            'nilaiSeleksi'
        ])->latest()->get();

        return view('admin.laporan.index', compact('data'));
    }

    public function laporanStatus($status)
    {
        $data = Pendaftaran::with([
            'calonSiswa',
            'jurusan',
            'nilaiSeleksi'
        ])
        ->where('status_pendaftaran', $status)
        ->latest()
        ->get();

        return view('admin.laporan.index', compact('data', 'status'));
    }

    /* =======================
       CETAK PDF
    ======================= */
    public function cetakLaporan()
    {
        $data = Pendaftaran::with([
            'calonSiswa',
            'jurusan',
            'nilaiSeleksi'
        ])->get();

        $pdf = Pdf::loadView('admin.laporan.pdf', compact('data'))
                  ->setPaper('A4', 'portrait');

        return $pdf->download('laporan_psb.pdf');
    }
}
