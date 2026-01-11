@extends('layouts.app')

@section('content')

<div class="mb-4">
    <h4 class="fw-semibold text-primary mb-1">
        Upload Berkas Pendaftaran
    </h4>
    <p class="text-muted mb-0">
        Unggah dokumen pendukung sesuai ketentuan sekolah
    </p>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-4">

        <form method="POST" action="/upload-berkas" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-medium">
                    Jenis Berkas
                </label>
                <select name="jenis_berkas" class="form-select" required>
                    <option value="">-- Pilih Jenis Berkas --</option>
                    <option value="Ijazah">Ijazah / SKL</option>
                    <option value="Rapor">Rapor</option>
                    <option value="KK">Kartu Keluarga</option>
                    <option value="Foto">Pas Foto</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="form-label fw-medium">
                    File Berkas
                </label>
                <input type="file"
                       name="file"
                       class="form-control"
                       required>
                <small class="text-muted">
                    Format file yang diperbolehkan: PDF / JPG / PNG
                </small>
            </div>

            <div class="d-flex justify-content-between">
                <a href="/siswa/dashboard" class="btn btn-outline-secondary">
                    ← Kembali
                </a>

                <button class="btn btn-primary px-4">
                    Upload Berkas
                </button>
            </div>

        </form>

    </div>
</div>

@endsection
