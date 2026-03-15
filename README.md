# BukaCoding

## 📝 Deskripsi

**BukaCoding** adalah platform pembelajaran online (LMS) yang dirancang khusus untuk kelas pemrograman, khususnya berfokus pada **Low-Code** development dan materi programming lainnya. Aplikasi ini hadir dengan desain antarmuka modern (_glassmorphism_ / _dark mode_) menggunakan **Tailwind CSS** dan performa responsif bertenaga **CodeIgniter 4**.

---

## 🚀 Fitur Utama

### 👨‍🎓 Panel Siswa (User)

- **Dashboard Interaktif**: Melihat progres kelas yang sedang diikuti dengan visualisasi yang menarik.
- **Katalog Kelas**: Menelusuri kelas-kelas pemrograman yang tersedia.
- **Modul Materi Lengkap**: Mendukung pembelajaran berbasis video, teks, dan dokumentasi.
- **Kuis & Evaluasi**: Uji kemampuan Anda di akhir kelas untuk melihat kelulusan dan mendapatkan skor.
- **Pembayaran Terintegrasi**: Membeli kelas dengan mudah dan aman menggunakan payment gateway (Mayar).

### 👑 Panel Manajemen (Admin)

- **Dashboard Ringkasan**: Statistik pengguna aktif, jumlah kelas, dan pendapatan/transaksi.
- **Manajemen Kelas & Materi**: Kelola kelas baru, materi (video/tulisan), lengkap dengan edit/update materi.
- **Pengaturan Kuis**: Membuat soal kuis beserta nilai ambang batas kelulusan (_passing score_).
- **Manajemen Kategori**: Pengelompokan kelas agar mudah dicari oleh siswa.

---

## 🛠️ Teknologi (_Tech Stack_)

- **Framework & Backend**: CodeIgniter v4 (PHP ^8.2)
- **Desain & Styling**: Tailwind CSS (Glassmorphism Dark Theme)
- **Font & Icon**: Plus Jakarta Sans, Inter & Remix Icons
- **Payment API**: Mayar

---

## 💻 Cara Instalasi

1. **Clone Repositori**:

   ```bash
   git clone https://github.com/madaapril/bukacoding.git
   ```

2. **Masuk ke Direktori App**:

   ```bash
   cd bukacoding/apps
   ```

3. **Install Dependencies**:

   ```bash
   composer install
   ```

4. **Konfigurasi Environment**:
   Salin file `.env` (atau `.env.example` jika tersedia) dan sesuaikan dengan database Anda:

   ```env
   database.default.hostname = localhost
   database.default.database = nama_database_anda
   database.default.username = root
   database.default.password =
   ```

5. **Jalankan Aplikasi**:
   Gunakan built-in server dari CodeIgniter atau Virtual Host:
   ```bash
   php spark serve
   ```

---

_Dibuat oleh @madaapril untuk memajukan ekosistem belajar coding di Indonesia._
