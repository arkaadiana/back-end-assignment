<?php
include 'Karyawan.php';
include 'Keuangan.php';

$error_message = null;
$upah_total = null;

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['hitung'])) {
    $upah_per_jam = $_GET['upah_per_jam'];
    $jam_kerja = $_GET['jam_kerja'];

    $karyawan = new Karyawan($upah_per_jam, $jam_kerja);
    $upah_total = Keuangan::hitungUpahTotal($karyawan);

    if ($upah_total === false) {
        $error_message = "Input tidak valid. Pastikan nilai upah per jam dan jumlah jam kerja lebih besar dari nol.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Upah Karyawan</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Upah Karyawan PT.XXX</h2>

        <?php
        if (isset($error_message)) {
            echo "<div class='result'>";
            echo "<p>$error_message</p>";
            echo "</div>";
        }

        if(isset($upah_total)){
            echo "<div class='result'>";
            echo "<h3>Hasil:</h3>";
            echo "<p>Jumlah upah total: Rp " . number_format($upah_total, 0, ',', '.') . "</p>";
            echo "</div>";
            echo "<a href='index.html' class='button'>Kembali ke Halaman Utama</a>";
        }
        ?>
    </div>
</body>
</html>
