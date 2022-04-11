<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Data Pemberi</title>
</head>

<body>
    <center>
        <h3>Data Pemberi Zakat (Beras & Uang)</h3>
    </center>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kepala Keluarga</th>
                <th scope="col">RT</th>
                <th scope="col">Jumlah Muzaki</th>
                <th scope="col">Jumlah Beras</th>
                <th scope="col">Jumlah Uang</th>
            </tr>
        </thead>
        <tbody>
            @php
            $i = 1;
            $jenis='';
            @endphp
            @foreach($datanya as $data)
            <tr>
                <th scope="row">{{ $i }}</th>
                <td>{{ $data->kepala_kk }}</td>
                <td>{{ $data->rt }}</td>
                <td>{{ $data->jumlah_muzaki }}</td>
                @if($data->jumlah_beras != 0)
                <td>{{ $data->jumlah_beras.' Kg' }}</td>
                @else
                <td>-</td>
                @endif

                @if($data->jumlah_uang != 0)
                <td>{{ $data->jumlah_uang }}</td>
                @else
                <td>-</td>
                @endif
            </tr>
            <?php $i++; ?>

            @endforeach
        <tfoot>
            <tr>
                <td colspan="4">Total Beras (Kg)</td>
                <th>{{ $beras. ' Kg' }}</th>
                <td></td>
            </tr>
            <td colspan="5">Total Uang (Rp)</td>
            <th>{{ 'Rp. '. number_format($uang) }}</th>
        </tfoot>
        </tbody>
    </table>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
</body>

</html>