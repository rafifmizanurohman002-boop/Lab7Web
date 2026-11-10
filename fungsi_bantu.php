<?php
/**
 * Fungsi bantu bersama untuk seluruh halaman praktikum.
 * (Eksperimen Mandiri nomor 3: function format harga menjadi Rupiah)
 */

/** Mengubah angka menjadi format Rupiah, mis. 150000 -> Rp150.000 */
function formatRupiah($angka): string
{
    return "Rp" . number_format((float)$angka, 0, ",", ".");
}

/** Membersihkan input teks sebelum ditampilkan (kombinasi trim + htmlspecialchars) */
function aman(string $teks): string
{
    return htmlspecialchars(trim($teks), ENT_QUOTES, "UTF-8");
}
