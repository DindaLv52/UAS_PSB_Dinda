<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Pendaftaran PSB</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
            color: #000;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
            font-size: 16px;
            letter-spacing: 1px;
        }

        .header p {
            margin: 4px 0 0;
            font-size: 11px;
        }

        hr {
            border: 0;
            border-top: 2px solid #000;
            margin: 12px 0 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background-color: #f2f2f2;
            text-align: center;
            font-weight: bold;
        }

        th, td {
            border: 1px solid #000;
            padding: 7px;
        }

        td {
            vertical-align: middle;
        }

        .text-center {
            text-align: center;
        }

        .footer {
            margin-top: 30px;
            width: 100%;
        }

        .ttd {
            width: 35%;
            float: right;
            text-align: center;
        }

        .clear {
            clear: both;
        }
    </style>
</head>
<body>

<div class="header">
    <h2>LAPORAN PENDAFTARAN SISWA BARU</h2>
    <p>PSB SMK GEMILANG</p>
</div>

<hr>

<table>
    <thead>
        <tr>
            <th width="5%">No</th>
            <th width="25%">Nama Siswa</th>
            <th width="25%">Asal Sekolah</th>
            <th width="25%">Jurusan</th>
            <th width="20%">Status</th>
        </tr>
    </thead>
    <tbody>
        @forelse($data as $d)
        <tr>
            <td class="text-center">{{ $loop->iteration }}</td>
            <td>{{ $d->calonSiswa->nama_lengkap }}</td>
            <td>{{ $d->calonSiswa->asal_sekolah }}</td>
            <td>{{ $d->jurusan->nama_jurusan }}</td>
            <td class="text-center">{{ strtoupper($d->status_lulus) }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">
                Data pendaftaran belum tersedia
            </td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="footer">
    <div class="ttd">
        <p>
            {{ now()->format('d F Y') }}<br>
            Panitia PSB
        </p>
        <br><br><br>
        <p><strong>(___________________)</strong></p>
    </div>
    <div class="clear"></div>
</div>

</body>
</html>
