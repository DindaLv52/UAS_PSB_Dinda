@extends('layouts.app')

@section('content')
<div class="container py-4">

    {{-- JUDUL --}}
    <div class="mb-4 d-flex justify-content-between align-items-center">
        <div>
            <h4 class="fw-bold mb-1">Laporan Pendaftaran Siswa</h4>
            <small class="text-muted">Data rekap pendaftaran siswa baru</small>
        </div>

        <a href="/admin/laporan/cetak" class="btn btn-outline-danger">
            <i class="bi bi-file-earmark-pdf"></i> Cetak PDF
        </a>
    </div>

    {{-- CARD --}}
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="text-center" style="width:60px">#</th>
                            <th>Nama Siswa</th>
                            <th>Asal Sekolah</th>
                            <th>Jurusan</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $i => $d)
                        <tr>
                            <td class="text-center fw-semibold">
                                {{ $i + 1 }}
                            </td>

                            <td>
                                <div class="fw-semibold">
                                    {{ $d->calonSiswa->nama_lengkap }}
                                </div>
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
                                @if($d->status_pendaftaran == 'diterima')
                                    <span class="badge rounded-pill bg-success">
                                        DITERIMA
                                    </span>
                                @elseif($d->status_pendaftaran == 'ditolak')
                                    <span class="badge rounded-pill bg-danger">
                                        DITOLAK
                                    </span>
                                @else
                                    <span class="badge rounded-pill bg-secondary">
                                        {{ strtoupper($d->status_pendaftaran) }}
                                    </span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">
                                <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                                Data pendaftaran belum tersedia
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>
@endsection
