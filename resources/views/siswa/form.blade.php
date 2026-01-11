@extends('layouts.app')

@section('content')

<div class="mb-4">
    <h4 class="fw-semibold text-primary mb-1">
        Form Pendaftaran Siswa
    </h4>
    <p class="text-muted mb-0">
        Lengkapi data diri dengan benar sebelum mengirim pendaftaran
    </p>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/form-pendaftaran" enctype="multipart/form-data">
            @csrf

            <!-- DATA SISWA -->
            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label fw-medium">NISN</label>
                    <input type="text"
                           name="nisn"
                           class="form-control"
                           placeholder="Masukkan NISN"
                           required>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-medium">Nama Lengkap</label>
                    <input type="text"
                           name="nama"
                           class="form-control"
                           placeholder="Nama sesuai ijazah"
                           required>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-medium">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-select" required>
                        <option value="">-- Pilih --</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-medium">Tanggal Lahir</label>
                    <input type="date"
                        name="tanggal_lahir"
                        class="form-control"
                        required>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-medium">Asal Sekolah</label>
                    <input type="text"
                           name="asal"
                           class="form-control"
                           placeholder="SMP / MTs"
                           required>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-medium">Alamat</label>
                    <input type="text"
                           name="alamat"
                           class="form-control"
                           placeholder="Alamat tempat tinggal"
                           required>
                </div>

                <div class="col-12">
                    <label class="form-label fw-medium">Pilih Jurusan</label>
                    <select name="jurusan" class="form-select" required>
                        <option value="">-- Pilih Jurusan --</option>
                        @foreach($jurusans as $j)
                            <option value="{{ $j->id }}">
                                {{ $j->nama_jurusan }}
                            </option>
                        @endforeach
                    </select>
                </div>

            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-end">
                <button class="btn btn-primary px-4">
                    Simpan Pendaftaran
                </button>
            </div>

        </form>

    </div>
</div>

@endsection
