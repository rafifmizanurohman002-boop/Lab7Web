<?php
require __DIR__ . "/fungsi_bantu.php";
$judul = "Latihan 3 — Perulangan dan Array";
require __DIR__ . "/partials/header.php";

$mahasiswa = ["Alya", "Bima", "Citra", "Doni", "Eka", "Farhan", "Gita"];   // 4 sesuai modul + 3 tambahan
?>

<section class="kartu">
  <h2>Latihan 3 — Perulangan dan Array</h2>
  <p>Array <code>$mahasiswa</code> berisi <strong><?= count($mahasiswa) ?> nama</strong> (4 sesuai modul ditambah
    3 nama tambahan sesuai instruksi) dan ditampilkan seluruhnya dengan <code>foreach</code>.</p>

  <h3>Daftar Mahasiswa</h3>
  <ol>
    <?php foreach ($mahasiswa as $nama): ?>
      <li><?= aman($nama) ?></li>
    <?php endforeach; ?>
  </ol>

  <p class="catatan">Setiap nilai array dibersihkan dengan <code>htmlspecialchars()</code> melalui fungsi
    <code>aman()</code> sebelum dicetak, sehingga teks berisi tanda kutip atau tag HTML tidak dieksekusi
    oleh browser.</p>
</section>

<section class="kartu">
  <h2>Data Array</h2>
  <table>
    <tr><th>Index</th><th>Nama</th></tr>
    <?php foreach ($mahasiswa as $index => $nama): ?>
      <tr><td><?= $index ?></td><td><?= aman($nama) ?></td></tr>
    <?php endforeach; ?>
  </table>
  <p>Jumlah elemen: <code><?= count($mahasiswa) ?></code> &middot;
     Nama terakhir: <code><?= aman(end($mahasiswa)) ?></code></p>
</section>

<?php require __DIR__ . "/partials/footer.php"; ?>
