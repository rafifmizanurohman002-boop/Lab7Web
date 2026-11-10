<?php
require __DIR__ . "/fungsi_bantu.php";
$judul = "Latihan 6 — Memproses Form dengan POST";
require __DIR__ . "/partials/header.php";

$error = "";
$data = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama  = trim($_POST["nama"] ?? "");
    $prodi = trim($_POST["prodi"] ?? "");

    if ($nama === "" || $prodi === "") {
        $error = "Semua kolom wajib diisi.";
    } else {
        $data = ["nama" => $nama, "prodi" => $prodi];
    }
}
?>

<section class="kartu">
  <h2>Latihan 6 — Memproses Form dengan POST</h2>

  <form method="POST" action="latihan6.php">
    <label for="nama">Nama:</label>
    <input id="nama" name="nama" type="text" required value="<?= isset($data) ? aman($data["nama"]) : "" ?>">

    <label for="prodi">Program Studi:</label>
    <input id="prodi" name="prodi" type="text" required value="<?= isset($data) ? aman($data["prodi"]) : "" ?>">

    <div class="aksi"><button type="submit" name="kirim">Kirim Data</button></div>
  </form>

  <?php if ($_SERVER["REQUEST_METHOD"] === "POST"): ?>
    <?php if ($error !== ""): ?>
      <p class="pesan gagal"><?= aman($error) ?></p>
    <?php else: ?>
      <div class="pesan sukses">
        <h3>Data diterima</h3>
        <p>Nama: <strong><?= aman($data["nama"]) ?></strong></p>
        <p>Program Studi: <strong><?= aman($data["prodi"]) ?></strong></p>
      </div>
    <?php endif; ?>
  <?php endif; ?>

  <p class="catatan"><strong>Uji keamanan:</strong> kirim nama seperti
    <code>&lt;script&gt;alert(1)&lt;/script&gt;</code> atau <code>Budi "Juni"</code> — teks tampil apa adanya
    sebagai teks biasa, tag tidak dieksekusi, karena output dibersihkan dengan <code>htmlspecialchars()</code>.
    Validasi sisi server tetap dijalankan meskipun input sudah memakai atribut <code>required</code>.</p>
</section>

<section class="kartu">
  <h2>Metode Permintaan</h2>
  <table>
    <tr><th>Aspek</th><th>GET</th><th>POST</th></tr>
    <tr><td>Lokasi data</td><td>Parameter URL (<code>?nama=...</code>)</td><td>Body permintaan</td></tr>
    <tr><td>Perubahan data</td><td>Tidak mengubah data</td><td>Dapat mengubah/menyimpan data</td></tr>
    <tr><td>Contoh</td><td>Pencarian (Latihan 5)</td><td>Pengiriman form ini</td></tr>
    <tr><td>Metode saat ini</td><td>—</td><td><code><?= $_SERVER["REQUEST_METHOD"] ?></code></td></tr>
  </table>
</section>

<?php require __DIR__ . "/partials/footer.php"; ?>
