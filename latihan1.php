<?php
require __DIR__ . "/fungsi_bantu.php";
$judul = "Latihan 1 — Menjalankan PHP";
require __DIR__ . "/partials/header.php";
?>

<section class="kartu">
  <h2>Latihan 1 — Menjalankan PHP</h2>
  <p>File ini diakses melalui <code>http://localhost/lab7_php/</code> (server lokal), bukan dengan klik ganda,
    sehingga kode PHP dieksekusi dan tidak tampil sebagai teks biasa.</p>

  <h1>Belajar PHP</h1>
  <?php
    echo "<p>PHP berhasil dijalankan.</p>";
    echo "<p>Waktu server: " . date("d-m-Y H:i:s") . "</p>";
  ?>

  <p class="catatan">Perhatikan bahwa yang tampil adalah <em>hasil eksekusi</em> PHP (teks dan waktu),
    sedangkan baris <code>&lt;?php ... ?&gt;</code> tidak pernah muncul di halaman browser.</p>
</section>

<section class="kartu">
  <h2>Bukti Server-Side</h2>
  <table>
    <tr><th>Pemeriksaan</th><th>Hasil</th></tr>
    <tr><td>Ekstensi file</td><td><code>.php</code></td></tr>
    <tr><td>Dieksekusi oleh</td><td>Web server (PHP <?= PHP_VERSION ?>)</td></tr>
    <tr><td>Yang diterima browser</td><td>HTML hasil proses PHP, bukan kode PHP mentah</td></tr>
    <tr><td>Waktu server saat halaman dimuat</td><td><?= date("d-m-Y H:i:s") ?></td></tr>
  </table>
</section>

<?php require __DIR__ . "/partials/footer.php"; ?>
