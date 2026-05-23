<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Bansos PKH & BPNT</title>

    <style>

        body{
            font-family: sans-serif;
            font-size: 12px;
        }

        h2{
            text-align: center;
            margin-bottom: 5px;
        }

        p{
            text-align: center;
            margin-top: 0;
        }

        table{
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td{
            border: 1px solid #000;
        }

        th{
            background: #16a34a;
            color: white;
            padding: 8px;
        }

        td{
            padding: 7px;
        }

    </style>

</head>
<body>

    <h2>
        LAPORAN DATA PKH & BPNT
    </h2>

    <p>
        Tahun {{ $tahun }}
    </p>

    <table>

        <thead>

            <tr>
                <th>No</th>
                <th>Kecamatan</th>
                <th>Kelurahan</th>
                <th>PKH</th>
                <th>BPNT</th>
                <th>Keluarga</th>
            </tr>

        </thead>

        <tbody>

            @foreach($data as $i => $item)

            <tr>

                <td>{{ $i + 1 }}</td>

                <td>{{ $item->kecamatan }}</td>

                <td>{{ $item->kelurahan }}</td>

                <td>{{ $item->jumlah_pkh }}</td>

                <td>{{ $item->jumlah_bpnt }}</td>

                <td>{{ $item->jumlah_keluarga }}</td>

            </tr>

            @endforeach

        </tbody>

    </table>

</body>
</html>