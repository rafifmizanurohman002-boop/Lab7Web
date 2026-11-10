<?php
require __DIR__ . "/fungsi_bantu.php";
$judul = "Latihan 5 — Memproses Form dengan GET";
require __DIR__ . "/partials/header.php";

// Eksperimen Mandiri 2: data nama sederhana untuk dicari lewat GET
$daftarNama = ["Alya", "Bima", "Citra", "Doni", "Eka", "Farhan", "Gita", "Rafif Mizanurohman"];

$kata = "";
$hasilCari = [];
$adaPencarian = false;

if (isset($_GET["kata"])) {
    $adaPencarian = true;
    $kata = trim($_GET["kata"]);
    if ($kata !== "") {
        foreach ($daftarNama as $nama) {
            if (stripos($nama, $kata) !== false) {
                $hasilCari[] = $nama;
            }
        }
    }
}
?>

<section class="kartu">
  <h2>Latihan 5 — Memproses Form dengan GET</h2>

  <form method="GET" action="latihan5.php">
    <label for="kata">Kata kunci:</label>
    <input id="kata" name="kata" type="text" value="<?= aman($kata) ?>" placeholder="mis. Ca">
    <div class="aksi"><button type="submit">Cari</button></div>
  </form>

  <?php if ($adaPencarian): ?>
    <?php if ($kata === ""): ?>
      <p class="pesan info">Masukkan kata kunci terlebih dahulu.</p>
    <?php else: ?>
      <p class="pesan sukses">Kata kunci: <strong><?= aman($kata) ?></strong></p>
      <p><strong>Hasil pencarian nama dari array:</strong></p>
      <?php if (empty($hasilCari)): ?>
        <p class="pesan info">Tidak ada nama yang mengandung &ldquo;<?= aman($kata) ?>&rdquo;.</p>
      <?php else: ?>
        <ul>
          <?php foreach ($hasilCari as $nama): ?>
            <li><?= aman($nama) ?></li>
          <?php endforeach; ?>
        </ul>
        <p>Jumlah kecocokan: <strong><?= count($hasilCari) ?></strong></p>
      <?php endif; ?>
    <?php endif; ?>
  <?php endif; ?>
</section>

<section class="kartu">
  <h2>Data yang Dicari</h2>
  <p><?= implode(" &middot; ", array_map("aman", $daftarNama)) ?></p>
  <p class="catatan"><strong>Amati URL:</strong> setelah form dikirim, kata kunci muncul sebagai parameter
    <code>?kata=...</code> di address bar. Karena GET menyimpan data di URL, halaman dapat dibookmark atau
    dibagikan — karena itu <strong>GET tidak boleh dipakai untuk kata sandi atau data sensitif</strong>.
    GET cocok untuk aksi yang tidak mengubah data, seperti pencarian ini.</p>
</section>

<section class="kartu">
  <h2>Kode Inti</h2>
<pre class="kode">&lt;form method="GET" action="latihan5.php"&gt;
  &lt;label for="kata"&gt;Kata kunci:&lt;/label&gt;
  &lt;input id="kata" name="kata" type="text"&gt;
  &lt;button type="submit"&gt;Cari&lt;/button&gt;
&lt;/form&gt;

&lt;?php
if (isset($_GET["kata"])) {
    $kata = trim($_GET["kata"]);
    echo "Kata kunci: " . htmlspecialchars($kata, ENT_QUOTES, "UTF-8");
}
?&gt;</pre>
</section>

<?php require __DIR__ . "/partials/footer.php"; ?>
