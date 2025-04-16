<?php

$bandara_asal = array(
    "Soekarno Hatta" => 65000,
    "Husein Sastranegara" => 50000,
    "Abdul Rachman Saleh" => 40000,
    "Juanda" => 30000
);


$bandara_tujuan = array(
    "Ngurah Rai" => 85000,
    "Hasanuddin" => 70000,
    "Inanwatan" => 90000,
    "Sultan Iskandar Muda" => 60000
);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrasi Rute Penerbangan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Form Pendaftaran Rute Penerbangan</h2>
    <form method="post" action="">
        <label>Nama Maskapai:</label><br>
        <input type="text" name="maskapai" required><br><br>

        <label>Bandara Asal:</label><br>
        <select name="asal" required>
            <?php foreach ($bandara_asal as $nama => $pajak): ?>
                <option value="<?= $nama ?>"><?= $nama ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <label>Bandara Tujuan:</label><br>
        <select name="tujuan" required>
            <?php foreach ($bandara_tujuan as $nama => $pajak): ?>
                <option value="<?= $nama ?>"><?= $nama ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <label>Harga Tiket:</label><br>
        <input type="number" name="harga" required><br><br>

        <input type="submit" name="submit" value="Kirim">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $maskapai = $_POST['maskapai'];
        $asal = $_POST['asal'];
        $tujuan = $_POST['tujuan'];
        $harga = $_POST['harga'];
    
        $nomor = rand(1000, 9999);
        $tanggal = date("Y-m-d");
    
        $pajak_asal = $bandara_asal[$asal];
        $pajak_tujuan = $bandara_tujuan[$tujuan];
        $total_pajak = $pajak_asal + $pajak_tujuan;
        $total_harga = $harga + $total_pajak;
    
        echo "<div class='output-container'>";
        echo "<h3>Output Rute Penerbangan</h3>";
        echo "<p>Nomor: $nomor</p>";
        echo "<p>Tanggal: $tanggal</p>";
        echo "<p>Nama Maskapai: $maskapai</p>";
    
        echo "<h3>Detail Harga Tiket</h3>";
        echo "<p>Asal Penerbangan: $asal</p>";
        echo "<p>Tujuan Penerbangan: $tujuan</p>";
        echo "<p>Harga Tiket: Rp " . number_format($harga, 0, ',', '.') . "</p>";
        echo "<p>Pajak Bandara Asal ($asal): Rp " . number_format($pajak_asal, 0, ',', '.') . "</p>";
        echo "<p>Pajak Bandara Tujuan ($tujuan): Rp " . number_format($pajak_tujuan, 0, ',', '.') . "</p>";
        echo "<p>Total Pajak: Rp " . number_format($total_pajak, 0, ',', '.') . "</p>";
        echo "<p><strong>Total Harga Tiket: Rp " . number_format($total_harga, 0, ',', '.') . "</strong></p>";
        echo "</div>";
    }
    ?>
    
</body>
</html>
