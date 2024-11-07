<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Siswa</title>
    <style>
        /* Bisa menambahkan Tailwind CSS jika ingin menggunakannya */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>

    <h1>Profil Siswa: {{ $siswa->user->name }}</h1>

    <table>
        <tr>
            <th>Nama</th>
            <td>{{ $siswa->user->name }}</td>
        </tr>
        <tr>
            <th>Kelas</th>
            <td>{{ $siswa->classes->name ?? 'Tidak ada data' }}</td>
        </tr>
        <tr>
            <th>Jurusan</th>
            <td>{{ $siswa->major->name ?? 'Tidak ada data' }}</td>
        </tr>
    </table>

    <h2>Tabungan Siswa</h2>
    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Setoran</th>
                <th>Saldo</th>
                <th>Catatan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($siswa->savings as $saving)
                <tr>
                    <td>{{ $saving->date }}</td>
                    <td>Rp. {{ number_format($saving->deebit, 2) }}</td>
                    <td>Rp. {{ number_format($saving->saldo, 2) }}</td>
                    <td>{{ $saving->note }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Belum ada tabungan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>