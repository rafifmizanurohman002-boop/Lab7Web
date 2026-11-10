<?php
require __DIR__ . "/fungsi_bantu.php";
$judul = "Latihan 4 — Function";
require __DIR__ . "/partials/header.php";

function hitungDiskon($harga, $persen)
{
    $potongan = $harga * ($persen / 100);
    return $harga - $potongan;
}

// Fungsi tambahan 1: luas persegi panjang
function hitungLuasPersegiPanjang($panjang, $lebar)
{
    return $panjang * $lebar;
}

// Fungsi tambahan 2: kelulusan berdasarkan nilai
function tentukanKelulusan($nilai)
{
    if ($nilai >= 75) {
        return "LULUS";
    }
    return "TIDAK LULUS";
}

// Eksperimen Mandiri 3: fungsi format harga menjadi Rupiah (ada di fungsi_bantu.php)

$hargaInput = 150000;
$persenInput = 10;
$validasi = "";

if (isset($_GET["kirim"])) {
    $h = $_GET["harga"] ?? "";
    $p = $_GET["persen"] ?? "";

    if (is_numeric($h) && is_numeric($p) && (float)$h >= 0 && (float)$p >= 0 && (float)$p <= 100) {
        $hargaInput  = (float)$h;
        $persenInput = (float)$p;
        $validasi = "Parameter function valid — diskon dihitung ulang.";
    } else {
        $validasi = "Harga harus angka ≥ 0 dan persen diskon 0–100. Contoh awal dipakai kembali.";
    }
}

$hargaAkhir = hitungDiskon($hargaInput, $persenInput);
$luas       = hitungLuasPersegiPanjang(8, 4);
$nilaiUjian = 78;
?>

<section class="kartu">
  <h2>Latihan 4 — Membuat Function</h2>

  <form method="GET" action="latihan4.php">
    <label for="harga">Harga (Rp) <input type="number" id="harga" name="harga" min="0" step="1000" value="<?= $hargaInput ?>"></label>
    <label for="persen">Diskon (%) <input type="number" id="persen" name="persen" min="0" max="100" value="<?= $persenInput ?>"></label>
    <div class="aksi"><button type="submit" name="kirim" value="1">Hitung Diskon</button></div>
  </form>

  <?php if ($validasi !== ""): ?>
    <p class="pesan <?= strpos($validasi, "valid") !== false ? "sukses" : "gagal" ?>"><?= aman($validasi) ?></p>
  <?php endif; ?>

  <h3>Hasil Function</h3>
  <table>
    <tr><th>Function</th><th>Pemanggilan</th><th>Hasil</th></tr>
    <tr>
      <td><code>hitungDiskon()</code></td>
      <td><code>hitungDiskon(<?= $hargaInput ?>, <?= $persenInput ?>)</code></td>
      <td><strong>Harga setelah diskon: <?= formatRupiah($hargaAkhir) ?></strong></td>
    </tr>
    <tr>
      <td><code>hitungLuasPersegiPanjang()</code></td>
      <td><code>hitungLuasPersegiPanjang(8, 4)</code></td>
      <td><?= $luas ?></td>
    </tr>
    <tr>
      <td><code>tentukanKelulusan()</code></td>
      <td><code>tentukanKelulusan(<?= $nilaiUjian ?>)</code></td>
      <td><?= tentukanKelulusan($nilaiUjian) ?> (ambang batas 75)</td>
    </tr>
    <tr>
      <td><code>formatRupiah()</code> <em>(Eksperimen 3)</em></td>
      <td><code>formatRupiah(150000)</code></td>
      <td><?= formatRupiah(150000) ?></td>
    </tr>
  </table>

  <p class="catatan"><strong>Manfaat function:</strong> logika perhitungan cukup ditulis satu kali lalu dapat
    dipakai berulang dengan argument berbeda, kode lebih ringkas dan mudah diuji, serta perbaikan cukup
    dilakukan di satu tempat.</p>
</section>

<section class="kartu">
  <h2>Kode Inti</h2>
<pre class="kode">function hitungDiskon($harga, $persen) {
    $potongan = $harga * ($persen / 100);
    return $harga - $potongan;
}

function hitungLuasPersegiPanjang($panjang, $lebar) {
    return $panjang * $lebar;
}

function tentukanKelulusan($nilai) {
    return $nilai >= 75 ? "LULUS" : "TIDAK LULUS";
}</pre>
</section>

<?php require __DIR__ . "/partials/footer.php"; ?>
