<?php
/**
 * Bagian PEMROSESAN data (terpisah dari tampilan HTML).
 * Berisi logika validasi dan sanitasi form data mahasiswa.
 *
 * Eksperimen Mandiri 4: NIM hanya boleh berisi angka dan panjangnya tepat 9 digit.
 */

/**
 * Memvalidasi input form mahasiswa.
 *
 * @param array $input Data mentah dari $_POST
 * @return array ['data' => array|null, 'error' => array]
 *               data  = ringkasan data valid siap ditampilkan
 *               error = daftar pesan kesalahan (kosong jika valid)
 */
function prosesDataMahasiswa(array $input): array
{
    $nama  = trim($input["nama"] ?? "");
    $nim   = trim($input["nim"] ?? "");
    $prodi = trim($input["prodi"] ?? "");
    $semesterInput = $input["semester"] ?? "";
    $email = trim($input["email"] ?? "");

    $error = [];

    if ($nama === "") {
        $error[] = "Nama wajib diisi.";
    }
    if ($nim === "") {
        $error[] = "NIM wajib diisi.";
    } elseif (!ctype_digit($nim) || strlen($nim) !== 9) {
        // Eksperimen Mandiri 4
        $error[] = "NIM hanya boleh berisi angka dan panjangnya tepat 9 digit.";
    }
    if ($prodi === "") {
        $error[] = "Program studi wajib diisi.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "Format email tidak valid.";
    }
    if (!ctype_digit((string)$semesterInput) ||
        (int)$semesterInput < 1 || (int)$semesterInput > 14) {
        $error[] = "Semester harus berupa angka 1–14.";
    }

    if ($error) {
        return ["data" => null, "error" => $error];
    }

    $data = compact("nama", "nim", "prodi", "email");
    $data["semester"] = (int)$semesterInput;

    return ["data" => $data, "error" => []];
}
