<?php
require __DIR__ . "/fungsi_bantu.php";
$judul = "Latihan 7 — Pengolahan Data Sederhana";
require __DIR__ . "/partials/header.php";

$hasil = null;
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $barang      = trim($_POST["barang"] ?? "");
    $hargaInput  = $_POST["harga"]  ?? "";
    $jumlahInput = $_POST["jumlah"] ?? "";

    if ($barang === "" || !is_numeric($hargaInput) ||
        !ctype_digit((string)$jumlahInput) ||
        (float)$hargaInput < 0 || (int)$jumlahInput < 1) {
        $error = "Periksa kembali nama barang, harga, dan jumlah.";
    } else {
        $harga  = (float)$hargaInput;
        $jumlah = (int)$jumlahInput;
        $subtotal = $harga * $jumlah;
        $hasil = [
            "barang"  => $barang,
            "harga"   => $harga,
            "jumlah"  => $jumlah,
            "subtotal"=> $subtotal,
        ];
    }
}
?>

<section class="kartu">
  <h2>Latihan 7 — Pengolahan Data Sederhana</h2>
  <p>Form menerima <em>nama barang</em>, <em>harga</em>, dan <em>jumlah</em>; PHP menghitung subtotal lalu
    menampilkan ringkasan transaksi.</p>

  <form method="POST" action="latihan7.php">
    <label>Nama barang <input name="barang" required value="<?= isset($hasil) ? aman($hasil["barang"]) : "" ?>"></label>
    <label>Harga <input name="harga" type="number" min="0" step="0.01" required value="<?= isset($hasil) ? $hasil["harga"] : "" ?>"></label>
    <label>Jumlah <input name="jumlah" type="number" min="1" step="1" required value="<?= isset($hasil) ? $hasil["jumlah"] : "" ?>"></label>
    <div class="aksi"><button type="submit">Hitung</button></div>
  </form>

  <?php if ($error !== ""): ?>
    <p class="pesan gagal"><?= aman($error) ?></p>
  <?php elseif (isset($hasil)): ?>
    <div class="pesan sukses">
      <p><strong>Ringkasan Transaksi</strong></p>
      <table>
        <tr><th>Barang</th><td><?= aman($hasil["barang"]) ?></td></tr>
        <tr><th>Harga satuan</th><td><?= formatRupiah($hasil["harga"]) ?></td></tr>
        <tr><th>Jumlah</th><td><?= $hasil["jumlah"] ?> pcs</td></tr>
        <tr><th>Subtotal</th><td><strong><?= formatRupiah($hasil["subtotal"]) ?></strong></td></tr>
      </table>
    </div>
  <?php endif; ?>
</section>

<section class="kartu">
  <h2>Hasil Pengujian Input</h2>
  <table>
    <tr><th>Barang</th><th>Harga</th><th>Jumlah</th><th>Hasil</th></tr>
    <tr><td>Keyboard Mekanik</td><td>450000</td><td>2</td><td class="sukses">Subtotal Rp900.000</td></tr>
    <tr><td>Mouse</td><td>150000.50</td><td>1</td><td>Subtotal Rp150.000,50 (harga desimal diterima)</td></tr>
    <tr><td>Flashdisk</td><td>50000</td><td>0</td><td class="gagal">Ditolak — jumlah harus ≥ 1</td></tr>
    <tr><td>Flashdisk</td><td>50000</td><td>-3</td><td class="gagal">Ditolak — <code>ctype_digit()</code> menolak tanda minus</td></tr>
    <tr><td>(kosong)</td><td>abc</td><td>1</td><td class="gagal">Ditolak — nama wajib &amp; harga harus numerik</td></tr>
  </table>
  <p class="catatan">Validasi HTML (atribut <code>required</code>, <code>min</code>) hanya membantu pengguna
    agar salah ketik cepat terdeteksi; pemeriksaan utama tetap validasi PHP di sisi server karena atribut
    HTML dapat dilewati dengan mengubah request secara langsung.</p>
</section>

<?php require __DIR__ . "/partials/footer.php"; ?>
