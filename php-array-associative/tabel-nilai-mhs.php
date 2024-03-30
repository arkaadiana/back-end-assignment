<?php
// Fungsi menghitung rata-rata
function countAVG($tugas, $uts, $uas) {
    $avg = ($tugas + $uts + $uas) / 3;
    return $avg;
}

// Fungsi untuk menentukan nilai akhir berdasarkan nilai rata-rata
function result($avg) {
    if ($avg > 80) {
        return "A";
    } else if ($avg > 70) {
        return "B";
    } else if ($avg > 60) {
        return "C";
    } else {
        return "D";
    }
}

// Array associative 1 dimensi yang menyimpan nama kolom dan labelnya untuk tabel
$namaKolom = array(
    "nama"=>"Nama",
    "tugas"=>"Nilai Tugas",
    "uts"=>"Nilai UTS",
    "uas"=>"Nilai UAS",
    "avg"=>"Nilai AVG",
    "nilai"=>"Nilai Akhir"
);

// Array associative multidimensi yang menyimpan data mahasiswa
$datamhs = array(
    array(
        $namaKolom["nama"]=>"Putu",
        $namaKolom["tugas"]=> 70,
        $namaKolom["uts"]=>80,
        $namaKolom["uas"]=>80
    ),
    array(
        $namaKolom["nama"]=>"Arka",
        $namaKolom["tugas"]=> 80,
        $namaKolom["uts"]=>70,
        $namaKolom["uas"]=>70
    ),
    array(
        $namaKolom["nama"]=>"Adiana",
        $namaKolom["tugas"]=> 90,
        $namaKolom["uts"]=>70,
        $namaKolom["uas"]=>60
    ),
    array(
        $namaKolom["nama"]=>"Made",
        $namaKolom["tugas"]=> 40,
        $namaKolom["uts"]=>30,
        $namaKolom["uas"]=>60
    ),
    array(
        $namaKolom["nama"]=>"Nengah",
        $namaKolom["tugas"]=> 85,
        $namaKolom["uts"]=>80,
        $namaKolom["uas"]=>80
    ),
    array(
        $namaKolom["nama"]=>"Wayan",
        $namaKolom["tugas"]=> 45,
        $namaKolom["uts"]=>60,
        $namaKolom["uas"]=>80
    )
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Nilai Mahasiswa</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
<h2>Simple Table</h2>
    <table>
        <tr>
            <?php foreach ($namaKolom as $kolom): ?>
                <th><?php echo $kolom; ?></th>
            <?php endforeach; ?>
        </tr>
        <!-- Loop untuk setiap data mahasiswa dalam $datamhs -->
        <?php foreach ($datamhs as $mahasiswa): ?>
            <tr>
                <td><?php echo $mahasiswa[$namaKolom["nama"]]; ?></td>
                <td><?php echo $mahasiswa[$namaKolom["tugas"]]; ?></td>
                <td><?php echo $mahasiswa[$namaKolom["uts"]]; ?></td>
                <td><?php echo $mahasiswa[$namaKolom["uas"]]; ?></td>
                <?php 
                    $avg = round(countAVG($mahasiswa[$namaKolom["tugas"]], $mahasiswa[$namaKolom["uts"]], $mahasiswa[$namaKolom["uas"]]),2);
                ?>
                <td><?php echo $avg; ?></td>
                <td><?php echo result($avg); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
