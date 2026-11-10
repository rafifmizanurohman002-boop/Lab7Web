<?php
require __DIR__ . "/fungsi_bantu.php";
$judul = "Beranda";
require __DIR__ . "/partials/header.php";
?>

<section class="kartu">
  <h2>Tujuan Praktikum</h2>
  <ol>
    <li>Memahami perbedaan pemrosesan client-side dan server-side.</li>
    <li>Mengenali sintaks PHP dan menjalankan file PHP melalui server lokal.</li>
    <li>Menggunakan variabel, tipe data, operator, percabangan, perulangan, dan function.</li>
    <li>Menerima dan memproses data dari form HTML menggunakan metode GET dan POST.</li>
    <li>Melakukan validasi dan sanitasi input dasar sebelum data ditampilkan atau diproses.</li>
    <li>Membangun aplikasi sederhana yang menerima, memproses, dan menampilkan data pengguna.</li>
  </ol>
  <p class="catatan">Halaman ini dijalankan melalui <strong>server lokal</strong> (PHP built-in server / XAMPP),
    bukan dengan klik ganda pada file — buktinya waktu server di bawah ini dihasilkan oleh PHP.</p>
</section>

<section class="kartu">
  <h2>Daftar Latihan</h2>
  <div class="grid-kartu">
    <a class="kartu" href="latihan1.php"><h3>Latihan 1 — Menjalankan PHP</h3><p>File <code>index.php</code> dengan kode PHP yang dieksekusi server dan menampilkan waktu server.</p></a>
    <a class="kartu" href="latihan2.php"><h3>Latihan 2 — Variabel &amp; Percabangan</h3><p>Perhitungan nilai akhir (bobot 30/30/40) dan penentuan predikat dengan <code>if/elseif</code>.</p></a>
    <a class="kartu" href="latihan3.php"><h3>Latihan 3 — Perulangan &amp; Array</h3><p>Menampilkan daftar mahasiswa menggunakan <code>foreach</code>.</p></a>
    <a class="kartu" href="latihan4.php"><h3>Latihan 4 — Function</h3><p>Fungsi diskon, luas persegi panjang, kelulusan, dan format Rupiah.</p></a>
    <a class="kartu" href="latihan5.php"><h3>Latihan 5 — Form GET</h3><p>Pencarian kata kunci lewat parameter URL + pencarian nama dari array.</p></a>
    <a class="kartu" href="latihan6.php"><h3>Latihan 6 — Form POST</h3><p>Penerimaan data nama dan prodi dengan validasi sisi server.</p></a>
    <a class="kartu" href="latihan7.php"><h3>Latihan 7 — Pengolahan Data</h3><p>Form barang, harga, dan jumlah; subtotal dihitung oleh PHP.</p></a>
    <a class="kartu" href="miniproject.php"><h3>Mini Project — Data Mahasiswa</h3><p>Form data mahasiswa: nama, NIM, prodi, semester, email; validasi server-side.</p></a>
  </div>
</section>

<section class="kartu">
  <h2>Latihan 1 — Ringkasan Cepat di Beranda</h2>
  <p><strong>Belajar PHP</strong></p>
  <?php echo "<p>PHP berhasil dijalankan.</p>"; ?>
  <p><strong>Waktu server:</strong> <?= date("d-m-Y H:i:s") ?></p>
  <p class="catatan">PHP bersifat <em>server-side</em>: kode <code>&lt;?php ... ?&gt;</code> dieksekusi di server,
    lalu browser hanya menerima hasil outputnya berupa HTML — kode PHP mentah tidak pernah sampai ke browser.</p>
</section>

<?php require __DIR__ . "/partials/footer.php"; ?>
