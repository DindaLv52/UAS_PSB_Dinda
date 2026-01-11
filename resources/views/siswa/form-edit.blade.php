@extends('layouts.app')

@section('content')

<div class="mb-4">
    <h4 class="fw-semibold text-primary mb-1">Edit Data Pendaftaran</h4>
    <p class="text-muted mb-0">
        Periksa kembali data diri dan jurusan pilihan Anda
    </p>
</div>

<div class="row g-4">

    <!-- FORM DATA SISWA -->
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">

                <h6 class="fw-semibold mb-4 text-secondary">
                    Informasi Calon Siswa
                </h6>

                <form method="POST" action="/form-pendaftaran/update">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-medium">Nama Lengkap</label>
                        <input type="text"
                               name="nama"
                               class="form-control"
                               value="{{ $pendaftaran->calonSiswa->nama_lengkap }}"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-medium">Asal Sekolah</label>
                        <input type="text"
                               name="asal"
                               class="form-control"
                               value="{{ $pendaftaran->calonSiswa->asal_sekolah }}"
                               required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-medium">Pilihan Jurusan</label>
                        <select name="jurusan" class="form-select" required>
                            @foreach($jurusans as $j)
                                <option value="{{ $j->id }}"
                                    {{ $pendaftaran->jurusan_id == $j->id ? 'selected' : '' }}>
                                    {{ $j->nama_jurusan }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="/siswa/dashboard" class="btn btn-outline-secondary">
                            ← Kembali
                        </a>

                        <button class="btn btn-primary px-4">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- BERKAS -->
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">

                <h6 class="fw-semibold mb-3 text-secondary">
                    Berkas Pendaftaran
                </h6>

                @if($pendaftaran->berkas->count() > 0)

                    <div class="list-group list-group-flush">
                        @foreach($pendaftaran->berkas as $b)
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="fw-medium">
                                        {{ ucfirst($b->jenis_berkas) }}
                                    </div>
                                    <small class="text-muted">
                                        File telah diunggah
                                    </small>
                                </div>

                                <div class="d-flex gap-2">
                                    <a href="{{ asset('storage/'.$b->file) }}"
                                       target="_blank"
                                       class="btn btn-sm btn-outline-primary">
                                        Lihat
                                    </a>

                                    <form action="/hapus-berkas/{{ $b->id }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus berkas ini?')">
                                        @csrf
                                        <button class="btn btn-sm btn-outline-danger">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>

                @else
                    <div class="alert alert-light border mt-3">
                        <span class="text-muted">
                            Belum ada berkas yang diupload.
                        </span>
                    </div>
                @endif

            </div>
        </div>
    </div>

</div>

@endsection
