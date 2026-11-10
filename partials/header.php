<?php
/**
 * Bagian tampilan: kepala halaman + navigasi.
 * Variabel yang dapat disiapkan sebelum include:
 *   $judul (string) — judul halaman
 */
$judulHalaman = $judul ?? "Praktikum 7";
$halamanAktif = basename($_SERVER["SCRIPT_NAME"]);

$tautan = [
    "index.php"       => "Beranda",
    "latihan1.php"    => "Latihan 1",
    "latihan2.php"    => "Latihan 2",
    "latihan3.php"    => "Latihan 3",
    "latihan4.php"    => "Latihan 4",
    "latihan5.php"    => "Latihan 5",
    "latihan6.php"    => "Latihan 6",
    "latihan7.php"    => "Latihan 7",
    "miniproject.php" => "Mini Project",
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($judulHalaman, ENT_QUOTES, "UTF-8") ?> — Praktikum 7 PHP</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<header class="situs-header">
  <div class="bungkus">
    <p class="kicker">Pemrograman Web OBE — Praktikum 7</p>
    <h1>Pemrograman Server-Side dengan PHP</h1>
    <nav class="navigasi">
      <ul>
        <?php foreach ($tautan as $file => $teks): ?>
          <li><a href="<?= $file ?>"<?= $file === $halamanAktif ? ' aria-current="page"' : "" ?>><?= $teks ?></a></li>
        <?php endforeach; ?>
      </ul>
    </nav>
  </div>
</header>
<main class="bungkus">
