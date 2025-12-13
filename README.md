# 🚗 Parkirek - Sistem Parkir Digital Telkom University Surabaya

[cite_start]**Parkirek** adalah sistem manajemen parkir berbasis web yang dirancang untuk mendigitalisasi proses parkir di lingkungan kampus IT Telkom Surabaya[cite: 6].

[cite_start]Sistem ini hadir untuk menggantikan pencatatan manual dan konvensional, mendukung visi *Smart Campus*, serta menyelaraskan kebijakan digitalisasi parkir Pemkot Surabaya tahun 2026[cite: 6, 10]. [cite_start]Parkirek berfokus pada efisiensi pencatatan waktu dan penanganan ketertiban parkir[cite: 10].

---

## 🌟 Fitur Utama

Sistem ini memfasilitasi dua pengguna utama: **Mahasiswa** dan **Satpam** dengan fitur-fitur berikut:

### 🎓 Mahasiswa (User)
* [cite_start]**Input Jam Masuk & Keluar:** Mencatat waktu kedatangan dan kepulangan kendaraan secara digital (menggantikan sistem booking)[cite: 7, 38].
* [cite_start]**Lapor "Parkir Ngawur":** Melaporkan kendaraan yang parkir sembarangan dilengkapi dengan fitur **unggah foto** sebagai bukti[cite: 15, 39].
* [cite_start]**Manajemen Laporan:** Melihat, mengedit, atau menghapus laporan yang telah dibuat (CRUD)[cite: 40].
* [cite_start]**Riwayat Parkir:** Memantau status dan histori parkir pribadi[cite: 41].

### 👮 Satpam (Admin)
* [cite_start]**Monitoring Dashboard:** Melihat ringkasan kapasitas dan aktivitas parkir terkini[cite: 46].
* [cite_start]**Manajemen Laporan:** Memverifikasi, menindaklanjuti, dan memperbarui status laporan pelanggaran parkir[cite: 45].
* [cite_start]**Akses Data Penuh:** Melihat seluruh data *parking record* (jam masuk/keluar) mahasiswa[cite: 44].
* [cite_start]**Manajemen User:** Mengelola data pengguna jika diperlukan (misal: reset password)[cite: 47].

---

## 🛠️ Teknologi yang Digunakan

[cite_start]Aplikasi ini dibangun menggunakan arsitektur **MVC (Model-View-Controller)** yang handal[cite: 83]:

* [cite_start]**Backend Framework:** Laravel (PHP 8.x Full-stack)[cite: 18, 179].
* [cite_start]**Frontend Templating:** Laravel Blade[cite: 17, 179].
* [cite_start]**Styling & UI:** Bootstrap v5 (Desain Responsif)[cite: 17, 58].
* [cite_start]**Database:** MySQL[cite: 18].
* [cite_start]**Version Control:** Git[cite: 19].

---

## ⚙️ Persyaratan Sistem (Prerequisites)

[cite_start]Sebelum melakukan instalasi, pastikan lingkungan server Anda memiliki [cite: 183-187]:
* PHP 8.x (Web Server Apache/Nginx)
* MySQL Server 8.x (atau MariaDB)
* Composer
* Node.js & NPM (Opsional, untuk build asset)

---

## 🚀 Panduan Instalasi (Installation)

[cite_start]Ikuti langkah-langkah berikut untuk menjalankan proyek di komputer lokal Anda [cite: 189-208]:

1.  **Clone Repository**
    ```bash
    git clone [https://github.com/username-anda/parkirek.git](https://github.com/username-anda/parkirek.git)
    cd parkirek
    ```

2.  **Install Dependencies**
    Mengunduh library PHP dan aset frontend:
    ```bash
    composer install
    npm install
    ```

3.  **Konfigurasi Environment**
    Salin file contoh konfigurasi dan sesuaikan dengan database lokal Anda:
    ```bash
    cp .env.example .env
    ```
    *Buka file `.env` dan atur `DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD`.*

4.  **Generate App Key**
    ```bash
    php artisan key:generate
    ```

5.  **Setup Database**
    Jalankan migrasi tabel dan *seeder* data awal:
    ```bash
    php artisan migrate
    php artisan db:seed
    ```

6.  **Build Assets**
    ```bash
    npm run dev
    ```

7.  **Jalankan Server**
    ```bash
    php artisan serve
    ```
    Akses aplikasi melalui browser di: `http://localhost:8000`

---

## 📖 Cara Penggunaan

1.  [cite_start]**Login:** Masuk menggunakan akun Mahasiswa atau Satpam yang telah didaftarkan[cite: 111, 210].
2.  **Parkir:**
    * [cite_start]Pilih menu **Input Jam Masuk** saat tiba di kampus[cite: 112].
    * [cite_start]Pilih menu **Input Jam Keluar** saat hendak pulang[cite: 116].
3.  **Pelaporan:**
    * [cite_start]Jika menemukan pelanggaran, buka menu **Lapor Parkir Ngawur**, isi deskripsi, dan unggah foto bukti[cite: 118].
    * [cite_start]Satpam akan memverifikasi laporan tersebut melalui dashboard admin[cite: 121].

---

## 🤝 Kontribusi

Jika Anda ingin berkontribusi pada pengembangan fitur:
1.  **Fork** repository ini.
2.  Buat **Branch** baru (`git checkout -b feature/nama-fitur`).
3.  **Commit** perubahan Anda.
4.  **Push** ke branch tersebut.
5.  [cite_start]Buat **Pull Request** baru [cite: 218-221].

---

## 📄 Lisensi

[cite_start]Proyek ini bersifat **Internal** untuk lingkungan Telkom University dan tidak memiliki lisensi publik[cite: 223].

---
*Dikembangkan oleh Tim Pengembang Parkirek Telkom University Surabaya.*
