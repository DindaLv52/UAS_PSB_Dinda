@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-semibold text-primary">Dashboard Calon Siswa</h4>
</div>

<div class="row">

    <!-- KARTU STATUS -->
    <div class="col-md-4">
        <div class="card shadow-sm mb-3
            @if(empty($pendaftaran))
                border-secondary
            @elseif($pendaftaran->status_pendaftaran == 'pending')
                border-primary
            @elseif($pendaftaran->status_pendaftaran == 'lulus')
                border-success
            @elseif($pendaftaran->status_pendaftaran == 'cadangan')
                border-info
            @elseif($pendaftaran->status_pendaftaran == 'ditolak')
                border-danger
            @endif
        ">
            <div class="card-body">
                <h6 class="fw-semibold mb-3">Status Pendaftaran</h6>

                @if(empty($pendaftaran))
                    <span class="badge bg-secondary">
                        Belum Mendaftar
                    </span>

                @elseif($pendaftaran->status_pendaftaran == 'pending')
                    <span class="badge bg-primary">
                        Menunggu Verifikasi
                    </span>
                    <p class="mt-2 text-muted small">
                        Data Anda sedang diperiksa oleh admin.
                    </p>

                @elseif($pendaftaran->status_pendaftaran == 'lulus')
                    <span class="badge bg-success">
                        LULUS
                    </span>
                    <p class="mt-2 text-success small">
                        Silakan menunggu informasi daftar ulang.
                    </p>

                @elseif($pendaftaran->status_pendaftaran == 'cadangan')
                    <span class="badge bg-info text-dark">
                        CADANGAN
                    </span>
                    <p class="mt-2 text-muted small">
                        Menunggu keputusan lanjutan dari sekolah.
                    </p>

                @elseif($pendaftaran->status_pendaftaran == 'ditolak')
                    <span class="badge bg-danger">
                        DITOLAK
                    </span>
                    <p class="mt-2 text-danger small">
                        Terima kasih telah mengikuti proses pendaftaran.
                    </p>
                @endif
            </div>
        </div>
    </div>

    <!-- KARTU AKSI -->
    <div class="col-md-8">
        <div class="card shadow-sm mb-3">
            <div class="card-body">
                <h6 class="fw-semibold mb-3">Aksi</h6>

                @if(empty($pendaftaran))
                    <!-- BELUM DAFTAR -->
                    <a href="/form-pendaftaran" class="btn btn-primary">
                        Isi Formulir Pendaftaran
                    </a>
                @else
                    <!-- SUDAH DAFTAR -->
                    <a href="/form-pendaftaran/edit" class="btn btn-outline-primary me-2">
                        Lihat / Edit Formulir
                    </a>

                    <a href="/upload-berkas" class="btn btn-outline-info">
                        Upload Berkas
                    </a>
                @endif
            </div>
        </div>
    </div>

</div>

@endsection
