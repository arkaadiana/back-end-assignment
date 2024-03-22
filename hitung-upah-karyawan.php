<?php
// Fungsi untuk menghitung jumlah upah total
function hitung_upah_total($upah_per_jam, $jam_kerja) {

    if ($upah_per_jam <= 0 || $jam_kerja <= 0) {
        return false; 
    }

    // Hitung upah total
    if ($jam_kerja <= 48) {
        $upah_total = $upah_per_jam * $jam_kerja;
    } else {
        $upah_normal = $upah_per_jam * 48;
        $upah_lembur = ($jam_kerja - 48) * ($upah_per_jam * 1.15);
        $upah_total = $upah_normal + $upah_lembur;
    }

    return $upah_total;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['hitung'])) {
    // Ambil nilai dari form
    $upah_per_jam = $_POST['upah_per_jam'];
    $jam_kerja = $_POST['jam_kerja'];

    // Hitung upah total
    $upah_total = hitung_upah_total($upah_per_jam, $jam_kerja);
    if ($upah_total === false) {
        $error_message = "Input tidak valid. Pastikan nilai upah per jam dan jumlah jam kerja lebih besar dari nol.";
    } else {
        // Redirect ke halaman yang sama dengan menggunakan metode GET untuk menampilkan hasil
        header("Location: ".$_SERVER['PHP_SELF']."?upah_total=".urlencode($upah_total));
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Upah Karyawan</title>
    <style>
        body {
            font-family: Helvetica, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 10px;
        }

        input[type="number"], input[type="submit"] {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color: #0081CF;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0098CF;
        }

        .result {
            margin-top: 20px;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upah Karyawan PT.XXX</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="upah_per_jam">Jumlah upah per jam:</label>
            <input type="number" name="upah_per_jam" required><br>
            <label for="jam_kerja">Jumlah jam kerja:</label>
            <input type="number" name="jam_kerja" required><br>
            <input type="submit" name="hitung" value="Hitung">
        </form>

        <?php
        // Tampilkan pesan error jika ada
        if (isset($error_message)) {
            echo "<div class='result'>";
            echo "<p>$error_message</p>";
            echo "</div>";
        }

        // Tampilkan hasil jika ada nilai upah_total yang dikirim melalui metode GET
        if(isset($_GET['upah_total'])){
            $upah_total = $_GET['upah_total'];
            echo "<div class='result'>";
            echo "<h3>Hasil:</h3>";
            echo "<p>Jumlah upah total: Rp " . number_format($upah_total, 0, ',', '.') . "</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>

