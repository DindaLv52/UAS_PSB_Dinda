@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-0">Detail Calon Siswa</h4>
        <small class="text-muted">Informasi lengkap pendaftaran siswa</small>
    </div>
    <a href="/admin/pendaftar/pending" class="btn btn-sm btn-outline-secondary">
        ← Kembali
    </a>
</div>

<!-- PROFIL SISWA -->
<div class="card shadow-sm border-0 mb-4">
    <div class="card-body">
        <h6 class="fw-bold mb-3">👤 Data Siswa</h6>

        <div class="row">
            <div class="col-md-4">
                <small class="text-muted">Nama Lengkap</small>
                <p class="fw-semibold">{{ $pendaftaran->calonSiswa->nama_lengkap }}</p>
            </div>
            <div class="col-md-4">
                <small class="text-muted">Asal Sekolah</small>
                <p class="fw-semibold">{{ $pendaftaran->calonSiswa->asal_sekolah }}</p>
            </div>
            <div class="col-md-4">
                <small class="text-muted">Jurusan Pilihan</small>
                <p class="fw-semibold">{{ $pendaftaran->jurusan->nama_jurusan }}</p>
            </div>
        </div>
    </div>
</div>

<!-- BERKAS -->
<div class="card shadow-sm border-0 mb-4">
    <div class="card-body">
        <h6 class="fw-bold mb-3">📁 Berkas Pendaftaran</h6>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Jenis Berkas</th>
                        <th class="text-center">File</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pendaftaran->berkas as $b)
                    <tr>
                        <td>{{ $b->jenis_berkas }}</td>
                        <td class="text-center">
                            <a href="{{ asset('storage/'.$b->file) }}"
                               target="_blank"
                               class="btn btn-sm btn-outline-primary">
                                Lihat Berkas
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="2" class="text-center text-muted">
                            Belum ada berkas diupload
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- NILAI SELEKSI -->
<div class="card shadow-sm border-0 mb-4">
    <div class="card-body">
        <h6 class="fw-bold mb-3">📝 Nilai Seleksi</h6>

        <form method="POST" action="/admin/nilai">
            @csrf
            <input type="hidden" name="id" value="{{ $pendaftaran->id }}">

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nilai Rapor</label>
                    <input type="number"
                           name="rapor"
                           class="form-control"
                           min="0"
                           max="100"
                           required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Nilai Tes</label>
                    <input type="number"
                           name="tes"
                           class="form-control"
                           min="0"
                           max="100"
                           required>
                </div>
            </div>

            <button class="btn btn-primary">
                💾 Simpan Nilai & Proses Seleksi
            </button>
        </form>
    </div>
</div>

<!-- AKSI STATUS -->
<div class="card shadow-sm border-0">
    <div class="card-body">
        <h6 class="fw-bold mb-3">⚙️ Aksi Status Pendaftaran</h6>

        <form method="POST" action="/admin/verifikasi/{{ $pendaftaran->id }}">
            @csrf

            <div class="d-flex flex-wrap gap-2">
                <button name="status_lulus" value="lulus" class="btn btn-success">
                    ✅ Terima (Lulus)
                </button>

                <button name="status_lulus" value="cadangan" class="btn btn-primary">
                    📌 Jadikan Cadangan
                </button>

                <button name="status_lulus" value="ditolak" class="btn btn-danger">
                    ❌ Tolak
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
