<?php
require __DIR__ . "/fungsi_bantu.php";
$judul = "Latihan 2 — Variabel, Operator, Percabangan";
require __DIR__ . "/partials/header.php";

// Nilai awal sesuai modul; dapat diubah lewat form GET di bawah.
$tugas = 85;
$uts   = 78;
$uas   = 90;
$pesan = "";

if (isset($_GET["kirim"])) {
    $t = $_GET["tugas"] ?? "";
    $u = $_GET["uts"]   ?? "";
    $a = $_GET["uas"]   ?? "";

    if (is_numeric($t) && is_numeric($u) && is_numeric($a)
        && $t >= 0 && $t <= 100 && $u >= 0 && $u <= 100 && $a >= 0 && $a <= 100) {
        $tugas = (float)$t;
        $uts   = (float)$u;
        $uas   = (float)$a;
        $pesan = "Nilai berhasil diperbarui.";
    } else {
        $pesan = "Nilai harus berupa angka 0–100. Nilai awal modul dipakai kembali.";
    }
}

$nama        = "Siti";
$nilaiAkhir  = ($tugas * 0.30) + ($uts * 0.30) + ($uas * 0.40);
$rataRata    = ($tugas + $uts + $uas) / 3;   // Eksperimen Mandiri 1

if ($nilaiAkhir >= 85) {
    $predikat = "A";
} elseif ($nilaiAkhir >= 75) {
    $predikat = "B";
} elseif ($nilaiAkhir >= 60) {
    $predikat = "C";
} else {
    $predikat = "D";
}
?>

<section class="kartu">
  <h2>Latihan 2 — Variabel, Operator, dan Percabangan</h2>

  <form method="GET" action="latihan2.php">
    <label for="tugas">Tugas (30%) <input type="number" id="tugas" name="tugas" min="0" max="100" step="0.01" value="<?= $tugas ?>"></label>
    <label for="uts">UTS (30%) <input type="number" id="uts" name="uts" min="0" max="100" step="0.01" value="<?= $uts ?>"></label>
    <label for="uas">UAS (40%) <input type="number" id="uas" name="uas" min="0" max="100" step="0.01" value="<?= $uas ?>"></label>
    <div class="aksi">
      <button type="submit" name="kirim" value="1">Hitung Nilai</button>
    </div>
  </form>

  <?php if ($pesan !== ""): ?>
    <p class="pesan <?= strpos($pesan, "berhasil") !== false ? "sukses" : "gagal" ?>"><?= aman($pesan) ?></p>
  <?php endif; ?>

  <h3>Hasil</h3>
  <table>
    <tr><th>Komponen</th><th>Nilai</th><th>Bobot</th></tr>
    <tr><td>Tugas</td><td><?= number_format($tugas, 2) ?></td><td>30%</td></tr>
    <tr><td>UTS</td><td><?= number_format($uts, 2) ?></td><td>30%</td></tr>
    <tr><td>UAS</td><td><?= number_format($uas, 2) ?></td><td>40%</td></tr>
    <tr><td><strong>Nilai akhir</strong></td><td colspan="2"><strong><?= number_format($nilaiAkhir, 2) ?></strong></td></tr>
    <tr><td>Rata-rata 3 komponen <em>(Eksperimen 1)</em></td><td colspan="2"><?= number_format($rataRata, 2) ?></td></tr>
    <tr><td>Predikat</td><td colspan="2"><strong><?= $predikat ?></strong></td></tr>
  </table>

  <p>Nama: <?= aman($nama) ?></p>

  <p class="catatan">Bobot menggunakan operator aritmetika, lalu nilai akhir dibandingkan dengan
    <code>&gt;=</code> pada blok <code>if/elseif/else</code>. Karena percabangan ditulis berurutan dari
    syarat terbesar, predikat selalu terpotong pada batas yang tepat.</p>
</section>

<section class="kartu">
  <h2>Kode Inti</h2>
<pre class="kode">$nilaiAkhir = ($tugas * 0.30) + ($uts * 0.30) + ($uas * 0.40);

if ($nilaiAkhir >= 85)      { $predikat = "A"; }
elseif ($nilaiAkhir >= 75)  { $predikat = "B"; }
elseif ($nilaiAkhir >= 60)  { $predikat = "C"; }
else                        { $predikat = "D"; }</pre>
</section>

<?php require __DIR__ . "/partials/footer.php"; ?>
