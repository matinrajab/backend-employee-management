<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Daftar Pegawai</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ddd;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 6px 8px;
            text-align: left;
        }

        th {
            background-color: #f3f3f3;
            font-weight: normal;
            font-size: 11px;
        }

        tr:nth-child(even) {
            background-color: #fafafa;
        }

        .center {
            text-align: center;
        }
    </style>
</head>

<body>
    <h3 style="text-align:center;">Daftar Pegawai</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Tempat Lahir</th>
                <th>Alamat</th>
                <th>Tgl Lahir</th>
                <th>L/P</th>
                <th>Gol</th>
                <th>Eselon</th>
                <th>Jabatan</th>
                <th>Tempat Tugas</th>
                <th>Agama</th>
                <th>Unit Kerja</th>
                <th>No. HP</th>
                <th>NPWP</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $index => $emp)
                <tr>
                    <td class="center">{{ $index + 1 }}</td>
                    <td>{{ $emp->nip ?? '-' }}</td>
                    <td>{{ $emp->name ?? '-' }}</td>
                    <td>{{ $emp->birthPlace->name ?? '-' }}</td>
                    <td>{{ $emp->address->name ?? '-' }}</td>
                    <td>{{ $emp->birthDate->date ?? '-' }}</td>
                    <td>{{ $emp->gender->name ?? '-' }}</td>
                    <td>{{ $emp->golongan->name ?? '-' }}</td>
                    <td>{{ $emp->eselon->name ?? '-' }}</td>
                    <td>{{ $emp->position->name ?? '-' }}</td>
                    <td>{{ $emp->workPlace->name ?? '-' }}</td>
                    <td>{{ $emp->religion->name ?? '-' }}</td>
                    <td>{{ $emp->workUnit->name ?? '-' }}</td>
                    <td>{{ $emp->phone_number ?? '-' }}</td>
                    <td>{{ $emp->npwp ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
