@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">Laporan Pendaftaran Siswa</h4>
            <p class="text-muted mb-0">Rekap hasil pendaftaran dan seleksi siswa</p>
        </div>

        <div class="d-flex gap-2">
            <a href="/admin/laporan/cetak" class="btn btn-outline-danger">
                <i class="bi bi-file-earmark-pdf"></i> Cetak PDF
            </a>
        </div>
    </div>

    {{-- CARD TABLE --}}
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center" style="width:60px">#</th>
                            <th>Nama Siswa</th>
                            <th>Asal Sekolah</th>
                            <th>Jurusan</th>
                            <th class="text-center">Status Seleksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($data as $d)
                        <tr>
                            <td class="text-center fw-semibold">
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                <div class="fw-semibold">
                                    {{ $d->calonSiswa->nama_lengkap }}
                                </div>
                                <small class="text-muted">
                                    NISN: {{ $d->calonSiswa->nisn }}
                                </small>
                            </td>

                            <td>
                                {{ $d->calonSiswa->asal_sekolah }}
                            </td>

                            <td>
                                <span class="badge bg-light text-dark border">
                                    {{ $d->jurusan->nama_jurusan }}
                                </span>
                            </td>

                            <td class="text-center">
                                @php
                                    $status_lulus = optional($d->nilaiSeleksi)->status_lulus;
                                @endphp

                                @if($status_lulus === 'lulus')
                                    <span class="badge rounded-pill bg-success">
                                        LULUS
                                    </span>
                                @elseif($status_lulus === 'cadangan')
                                    <span class="badge rounded-pill bg-warning text-dark">
                                        CADANGAN
                                    </span>
                                @elseif($status_lulus === 'tidak lulus')
                                    <span class="badge rounded-pill bg-danger">
                                        TIDAK LULUS
                                    </span>
                                @else
                                    <span class="badge rounded-pill bg-secondary">
                                        BELUM DINILAI
                                    </span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                                Belum ada data pendaftaran
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    {{-- FOOTER ACTION --}}
    <div class="mt-4">
        <a href="/admin/dashboard" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Kembali ke Dashboard
        </a>
    </div>

</div>
@endsection
