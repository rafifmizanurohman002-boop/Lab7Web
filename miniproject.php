<?php
require __DIR__ . "/fungsi_bantu.php";
require __DIR__ . "/proses_mahasiswa.php";   // pemrosesan dipisah dari tampilan

$judul = "Mini Project — Form Data Mahasiswa";
require __DIR__ . "/partials/header.php";

$data  = null;
$error = [];
$dikirim = ($_SERVER["REQUEST_METHOD"] === "POST");

if ($dikirim) {
    $hasil = prosesDataMahasiswa($_POST);
    $data  = $hasil["data"];
    $error = $hasil["error"];
}

$nilaiOld = [
    "nama"     => $data["nama"]     ?? trim($_POST["nama"] ?? ""),
    "nim"      => $data["nim"]      ?? trim($_POST["nim"] ?? ""),
    "prodi"    => $data["prodi"]    ?? trim($_POST["prodi"] ?? ""),
    "semester" => $data["semester"] ?? trim($_POST["semester"] ?? ""),
    "email"    => $data["email"]    ?? trim($_POST["email"] ?? ""),
];
?>

<section class="kartu">
  <h2>Mini Project — Aplikasi Formulir Data Mahasiswa</h2>
  <p>Aplikasi menerima data mahasiswa melalui metode <strong>POST</strong>, memvalidasinya di sisi server,
    lalu menampilkan ringkasan data kembali dengan <code>htmlspecialchars()</code>.</p>

  <form method="POST" action="miniproject.php">
    <label for="nama">Nama <input type="text" id="nama" name="nama" required value="<?= aman($nilaiOld["nama"]) ?>"></label>

    <label for="nim">NIM <input type="text" id="nim" name="nim" inputmode="numeric" required
        placeholder="9 digit angka" value="<?= aman($nilaiOld["nim"]) ?>"></label>

    <label for="prodi">Program Studi
      <input type="text" id="prodi" name="prodi" required value="<?= aman($nilaiOld["prodi"]) ?>"></label>

    <label for="semester">Semester
      <select id="semester" name="semester" required>
        <option value="">— pilih semester —</option>
        <?php for ($s = 1; $s <= 14; $s++): ?>
          <option value="<?= $s ?>"<?= (string) $s === (string) $nilaiOld["semester"] ? " selected" : "" ?>>Semester <?= $s ?></option>
        <?php endfor; ?>
      </select></label>

    <label for="email">Email <input type="email" id="email" name="email" required value="<?= aman($nilaiOld["email"]) ?>"></label>

    <div class="aksi">
      <button type="submit" name="kirim">Kirim Data</button>
      <button type="reset" class="reset">Reset</button>
    </div>
    <p class="catatan" style="margin-top:10px"><strong>Tombol Reset</strong> (Eksperimen 5) hanya
      mengembalikan isian form ke nilai awalnya di sisi klien dan tidak mengirim apa pun ke server; sedangkan
      &ldquo;pemrosesan ulang di server&rdquo; terjadi ketika form dikirim ulang (POST), ketika PHP kembali
      memvalidasi dan menghitung data dari awal.</p>
  </form>
</section>

<?php if ($dikirim): ?>
  <?php if (!empty($error)): ?>
    <section class="kartu">
      <div class="pesan gagal">
        <strong>Data belum dapat diproses. Periksa:</strong>
        <ul>
          <?php foreach ($error as $pesan): ?>
            <li><?= aman($pesan) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </section>
  <?php else: ?>
    <section class="kartu">
      <div class="pesan sukses">
        <h3>Ringkasan Data Mahasiswa</h3>
        <table>
          <tr><th>Nama</th><td><?= aman($data["nama"]) ?></td></tr>
          <tr><th>NIM</th><td><?= aman($data["nim"]) ?></td></tr>
          <tr><th>Program Studi</th><td><?= aman($data["prodi"]) ?></td></tr>
          <tr><th>Semester</th><td><?= $data["semester"] ?></td></tr>
          <tr><th>Email</th><td><?= aman($data["email"]) ?></td></tr>
        </table>
        <p>Data diterima dan telah dibersihkan sebelum ditampilkan.</p>
      </div>
    </section>
  <?php endif; ?>
<?php endif; ?>

<section class="kartu">
  <h2>Aturan Validasi Server-Side</h2>
  <table>
    <tr><th>Kolom</th><th>Aturan</th><th>Fungsi pemeriksa</th></tr>
    <tr><td>Nama</td><td>Wajib diisi</td><td><code>trim() !== ""</code></td></tr>
    <tr><td>NIM</td><td>Wajib angka, tepat 9 digit <em>(Eksperimen 4)</em></td><td><code>ctype_digit()</code> + <code>strlen()</code></td></tr>
    <tr><td>Program studi</td><td>Wajib diisi</td><td><code>trim() !== ""</code></td></tr>
    <tr><td>Semester</td><td>Bilangan bulat 1–14</td><td><code>ctype_digit()</code> + rentang</td></tr>
    <tr><td>Email</td><td>Format valid</td><td><code>filter_var(FILTER_VALIDATE_EMAIL)</code></td></tr>
  </table>
  <p class="catatan">Pemrosesan data berada di file terpisah
    <code>proses_mahasiswa.php</code> (fungsi <code>prosesDataMahasiswa()</code>), sedangkan file ini hanya
    menangani tampilan — sesuai ketentuan mini project: <em>pisahkan bagian pemrosesan dari tampilan HTML</em>.</p>
</section>

<?php require __DIR__ . "/partials/footer.php"; ?>
