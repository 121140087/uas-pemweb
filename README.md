Umy Afifah, 121140087,
UAS Pemrograman Web RA

Web : https://toko-ikan-121140087.000webhostapp.com/

- Bagian 1: Client-side Programming

Halaman pertama, "index.php", merupakan halaman login dengan form untuk memasukkan data login. Halaman kedua, "home.php", digunakan untuk manajemen data ikan, dengan form untuk menambah, mengedit data, dan hapus data. Pada halaman manajemen, terdapat 5 inputan dengan tipe text, radio, selection, dan number. Setelah data diinput, akan ditampilkan dalam tabel yang dilengkapi dengan fitur filter berdasarkan habitat spesies ikan. Input formulir tidak akan kosong dikarenakan menggunakan attribut required.

- Bagian 2: Server-side Programming

Proses alur data di atur oleh 5 php yang sudah dibuat :
Dalam bagian ini, dibuat lima file PHP utama. "login.php" digunakan untuk memverifikasi login user dan mengakses halaman manajemen. "ikan_tambah.php" digunakan untuk menambahkan data ikan ke database. "ikan_edit.php" untuk memperbarui data berdasarkan ID. "ikan_hapus.php" menghapus data berdasarkan ID, dan "ikan_data.php" mengambil data dari database untuk ditampilkan pada tabel di website.

- Bagian 3: Database Management

Konfigurasi database dilakukan dengan membuat dua tabel: "ikan" dan "users". File "database_conect.php" digunakan untuk menyambungkan website dengan database.

```
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `ikan` (
  `kode` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `habitat` varchar(50) NOT NULL,
  `stock` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `users` (
  `user` varchar(50) NOT NULL,
  `sandi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `users` (`user`, `sandi`) VALUES
('umy_afifah', '123');

ALTER TABLE `ikan`
  ADD PRIMARY KEY (`kode`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`user`);
COMMIT;
```

Query Script PHP yang telah dibuat:

login.php = "SELECT \* FROM users WHERE user='$user' AND sandi='$sandi'"

ikan_tambah.php = "INSERT INTO ikan (kode, nama, jenis, habitat, stock) VALUES ('$kode', '$nama', '$jenis', '$habitat', '$stock');"

ikan_edit.php = "UPDATE ikan SET nama='$nama', jenis='$jenis',
habitat='$habitat', stock='$stock' WHERE kode='$kode';"

ikan_hapus.php = "DELETE FROM ikan WHERE kode='$del'"

ikan_data.php = "SELECT * FROM ikan WHERE jenis = '$filterJenis'"

- Bagian 4: State Management

Pada bagian ini, digunakan session pada "index.php" untuk menyimpan pesan error saat login. Pesan error ditampilkan jika terjadi kesalahan dan dihapus saat user keluar dari "index.php". Selain itu, cookie "user_id" dibuat menggunakan JavaScript dengan durasi 30 hari di "index.php" dan "home.php". Pengecekan cookie dilakukan untuk mengarahkan user sesuai kondisi.

- Bagian Bonus: Hosting Aplikasi Web

1. Apa langkah-langkah yang Anda lakukan untuk meng-host aplikasi web Anda?

   000webhost.com, membuat akun, dan memilih plan gratis. Nama website dan password diinputkan, kemudian file website diupload ke folder public_html. Database baru dibuat dan konfigurasi database diubah pada file "database_connect.php". Setelah langkah ini, website dapat diakses secara dinamis.

2. Pilih penyedia hosting web yang menurut Anda paling cocok untuk aplikasi web Anda. Berikan alasan Anda.

   Mudah diimplementasikan, gratis, dan menyediakan layanan database.

3. Bagaimana Anda memastikan keamanan aplikasi web yang Anda host?
   Keamanan aplikasi web ditingkatkan dengan menggunakan HTTPS melalui sertifikat SSL/TLS untuk enkripsi data. Penggunaan HTTPS melindungi data sensitif seperti informasi login.

4. Jelaskan konfigurasi server yang Anda terapkan untuk mendukung aplikasi web Anda.
   Konfigurasi server menggunakan Web Server Nginx untuk mendukung keamanan dan koneksi yang aman.
