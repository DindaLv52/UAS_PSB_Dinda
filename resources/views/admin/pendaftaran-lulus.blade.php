@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-0">Daftar Siswa Lulus</h4>
        <small class="text-muted">Siswa yang dinyatakan lulus seleksi PSB</small>
    </div>

    <a href="/admin/dashboard" class="btn btn-sm btn-outline-secondary">
        ← Kembali
    </a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama Siswa</th>
                        <th>Jurusan</th>
                        <th class="text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $i => $d)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td class="fw-semibold">
                            {{ $d->calonSiswa->nama_lengkap }}
                        </td>
                        <td>{{ $d->jurusan->nama_jurusan }}</td>
                        <td class="text-center">
                            <span class="badge bg-success px-3 py-2">
                                Lulus
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted py-4">
                            Belum ada siswa yang lulus
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection
