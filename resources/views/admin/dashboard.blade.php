@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-0">Dashboard Admin PSB</h4>
        <small class="text-muted">Ringkasan status pendaftaran siswa</small>
    </div>
</div>

<div class="row g-4 mb-4">

    <!-- PENDING -->
    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <small class="text-muted">Pending</small>
                    <h3 class="fw-bold text-warning mb-0">{{ $pendingCount }}</h3>
                </div>
                <div class="fs-1 text-warning">⏳</div>
            </div>
            <div class="card-footer bg-transparent border-0 text-end">
                <a href="/admin/pendaftar/pending" class="btn btn-sm btn-outline-warning">
                    Detail →
                </a>
            </div>
        </div>
    </div>

    <!-- LULUS -->
    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <small class="text-muted">Lulus</small>
                    <h3 class="fw-bold text-success mb-0">{{ $lulusCount }}</h3>
                </div>
                <div class="fs-1 text-success">✅</div>
            </div>
            <div class="card-footer bg-transparent border-0 text-end">
                <a href="/admin/pendaftar/lulus" class="btn btn-sm btn-outline-success">
                    Detail →
                </a>
            </div>
        </div>
    </div>

    <!-- CADANGAN -->
    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <small class="text-muted">Cadangan</small>
                    <h3 class="fw-bold text-primary mb-0">{{ $cadanganCount }}</h3>
                </div>
                <div class="fs-1 text-primary">📌</div>
            </div>
            <div class="card-footer bg-transparent border-0 text-end">
                <a href="/admin/pendaftar/cadangan" class="btn btn-sm btn-outline-primary">
                    Detail →
                </a>
            </div>
        </div>
    </div>

    <!-- DITOLAK -->
    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <small class="text-muted">Ditolak</small>
                    <h3 class="fw-bold text-danger mb-0">{{ $ditolakCount }}</h3>
                </div>
                <div class="fs-1 text-danger">❌</div>
            </div>
            <div class="card-footer bg-transparent border-0 text-end">
                <a href="/admin/pendaftar/ditolak" class="btn btn-sm btn-outline-danger">
                    Detail →
                </a>
            </div>
        </div>
    </div>

</div>

<!-- SECTION LAPORAN -->
<div class="card shadow-sm border-0">
    <div class="card-body d-flex justify-content-between align-items-center">
        <div>
            <h5 class="fw-bold mb-1">Laporan & Rekapitulasi</h5>
            <small class="text-muted">
                Data lengkap hasil seleksi penerimaan siswa baru
            </small>
        </div>

        <a href="/admin/laporan" class="btn btn-dark">
            📄 Buka Laporan
        </a>
    </div>
</div>

@endsection
