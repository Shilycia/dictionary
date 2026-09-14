# 📖 Dictionary App

Aplikasi web sederhana untuk menyimpan dan mengelola kumpulan **syntax/kode** beserta hasilnya. Dibuat menggunakan **PHP** dan **MySQL** sebagai tugas mata kuliah Web Lanjut.

---

## ✨ Fitur

- 📋 **Lihat Data** — Menampilkan semua data syntax dalam bentuk tabel
- ➕ **Tambah Data** — Menambahkan syntax baru melalui form modal
- ✏️ **Edit Data** — Mengubah data syntax yang sudah ada
- 🗑️ **Hapus Data** — Menghapus data syntax dari database

---

## 🛠️ Teknologi yang Digunakan

| Teknologi | Keterangan |
|-----------|------------|
| PHP | Backend / server-side scripting |
| MySQL | Database penyimpanan data |
| HTML & CSS | Tampilan antarmuka |
| JavaScript | Interaksi form modal |
| MySQLi | Ekstensi koneksi PHP ke MySQL |

---

## 📁 Struktur File

```
Dictionary/
├── index.php     # Halaman utama (tampil & tambah data)
├── edit.php      # Halaman edit data
├── delete.php    # Script hapus data
└── README.md
```

---

## 🗄️ Struktur Database

**Database:** `dictionary`  
**Tabel:** `syntax`

| Kolom    | Tipe         | Keterangan        |
|----------|--------------|-------------------|
| `id`     | INT (PK, AI) | Primary key       |
| `name`   | VARCHAR      | Nama syntax       |
| `script` | TEXT         | Kode / script     |
| `result` | TEXT         | Hasil dari script |

### SQL Setup

```sql
CREATE DATABASE dictionary;

USE dictionary;

CREATE TABLE syntax (
    id     INT PRIMARY KEY AUTO_INCREMENT,
    name   VARCHAR(255) NOT NULL,
    script TEXT NOT NULL,
    result TEXT NOT NULL
);
```

---

## 🚀 Cara Menjalankan

### Prasyarat

- [XAMPP](https://www.apachefriends.org/) / [Laragon](https://laragon.org/) (atau web server PHP + MySQL lainnya)
- PHP >= 7.4
- MySQL / MariaDB

### Langkah-langkah

1. **Clone repositori ini**
   ```bash
   git clone https://github.com/username/dictionary.git
   ```

2. **Pindahkan folder ke direktori web server**
   - XAMPP: `C:/xampp/htdocs/Dictionary`
   - Laragon: `C:/laragon/www/Dictionary`

3. **Buat database**

   Buka **phpMyAdmin** atau MySQL CLI, lalu jalankan SQL di bagian Struktur Database di atas.

4. **Sesuaikan konfigurasi koneksi** *(jika diperlukan)*

   Edit baris berikut di setiap file PHP:
   ```php
   $koneksi = mysqli_connect("localhost", "root", "", "dictionary");
   ```
   Sesuaikan `host`, `username`, `password`, dan `nama database` dengan konfigurasi lokal kamu.

5. **Jalankan aplikasi**

   Buka browser dan akses:
   ```
   http://localhost/Dictionary/
   ```

---

## 📸 Screenshot

> *(Tambahkan screenshot tampilan aplikasi di sini)*

---

## 👤 Author

**Nama:** *(Nama kamu)*  
**NIM:** *(NIM kamu)*  
**Mata Kuliah:** Web Lanjut

---

## 📄 Lisensi

Proyek ini dibuat untuk keperluan akademis.
