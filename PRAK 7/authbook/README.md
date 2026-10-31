# Laporan Tugas 3: Analisis dan Dokumentasi

**Nama:** Belvaria Hendriyani  
**NPM:** 4524210078  
**Mata Kuliah / Praktikum:** Pemrograman Berbasis Web (PBW2-B)  
**Aplikasi:** Sistem Manajemen Perpustakaan (Authbook)

---

## 1. Penjelasan Arsitektur

### A. Diagram ERD (Entity Relationship Diagram)

Arsitektur database aplikasi _Authbook_ dirancang menggunakan prinsip relasional standar Laravel Eloquent. Berikut adalah entitas utama beserta atribut dan relasinya:

- **Users**: Menyimpan data pengguna sistem (`id`, `name`, `email`, `password`, `role`, `timestamps`). Role terbagi menjadi `admin`, `staff`, dan `viewer`.
- **Authors**: Menyimpan data penulis buku (`id`, `name`, `bio`, `timestamps`).
- **Books**: Menyimpan data inventaris buku (`id`, `title`, `isbn`, `publisher`, `year`, `status`, `cover`, `author_id`, `timestamps`).
- **Categories**: Menyimpan kategori buku (`id`, `name`, `timestamps`).
- **Book_Category (Pivot Table)**: Menghubungkan relasi _Many-to-Many_ antara tabel `books` dan `categories` (`book_id`, `category_id`).

### B. Penjelasan Relasi Antar Tabel

- **One-to-Many (Author ke Books)**: Satu penulis (`Author`) dapat menulis banyak buku (`Book`), tetapi satu buku hanya memiliki satu penulis utama (`author_id`).
- **Many-to-Many (Books ke Categories)**: Satu buku dapat memiliki banyak kategori, dan satu kategori dapat mencakup banyak buku melalui tabel perantara `book_category`.

### C. Penjelasan Flow Aplikasi (Request hingga Response)

Alur kerja aplikasi berbasis _Filament Admin Panel_ ini berjalan melalui siklus berikut:

1. **Request**: Pengguna mengirimkan _request_ melalui browser (misalnya mengakses `http://localhost:8000/admin/books`).
2. **Routing & Middleware**: Request diterima oleh router Laravel, kemudian melewati middleware autentikasi bawaan Filament untuk memastikan pengguna sudah login.
3. **Policy & Authorization**: Sebelum data ditampilkan atau diproses, sistem memeriksa **BookPolicy** / **AuthorPolicy** berdasarkan _role_ pengguna (apakah _admin_, _staff_, atau _viewer_) untuk menentukan hak akses CRUD.
4. **Filament Resource & Eloquent**: Jika diizinkan, _Resource_ memanggil Eloquent Model untuk mengambil, menyimpan, atau memanipulasi data dari database MySQL.
5. **Response**: Data diproses oleh komponen Livewire/Filament, dirender ke dalam antarmuka UI panel admin, dan dikembalikan sebagai _response_ HTML/JSON ke browser pengguna.

---

## 2. Perbandingan dengan Pendekatan Tradisional

### A. Perbandingan CRUD: Filament vs Manual

- **Pendekatan Manual**: Pengembang harus membuat _Migration_, _Model_, _Controller_, membuat form input HTML/Blade secara manual satu per satu, mengatur validasi _request_, serta menulis logika tabel dan _pagination_ dari awal.
- **Pendekatan Filament**: Menggunakan konsep _Resources_ berbasis Laravel Eloquent dan TALL stack (Tailwind, Alpine, Laravel, Livewire). Cukup dengan satu perintah _artisan_, Filament menyediakan form otomatis, tabel interaktif dengan pencarian/filter, serta halaman _Create/Edit/View_ secara instan.

### B. Kelebihan dan Kekurangan

| Pendekatan               | Kelebihan                                                                                                                                                                    | Kekurangan                                                                                                                                                        |
| :----------------------- | :--------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | :---------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| **Filament (Modern)**    | • Pengerjaan jauh lebih cepat dan efisien.<br>• UI/UX sudah modern, responsif, dan rapi secara _default_.<br>• Fitur bawaan lengkap (statistik widget, chart, auth, policy). | • Kustomisasi tingkat lanjut (_deep customization_) memerlukan pemahaman mendalam tentang Livewire.<br>• Struktur UI sangat bergantung pada pola bawaan Filament. |
| **Manual (Traditional)** | • Fleksibilitas tinggi tanpa batas dalam mendesain UI/UX.<br>• Kontrol penuh atas setiap baris kode _frontend_ dan _backend_.                                                | • Waktu pengembangan lama.<br>• Harus membangun ulang komponen dasar seperti tabel, paginasi, dan validasi secara berulang.                                       |

### C. Kapan Sebaiknya Menggunakan Filament vs Manual?

- **Gunakan Filament ketika**: Membangun panel admin internal, sistem manajemen data (_dashboard CMS_), aplikasi inventaris, atau project dengan tenggat waktu ketat yang membutuhkan fungsionalitas CRUD standar yang kokoh.
- **Gunakan Pendekatan Manual ketika**: Membangun aplikasi publik (_front-facing website_) dengan desain UI/UX yang sangat unik, kompleks, dan kustom, atau aplikasi berskala besar yang membutuhkan performa _frontend_ kustom murni (seperti SPA dengan Vue/React).

---

## 3. Refleksi Pembelajaran

### A. Apa yang Dipelajari dari Praktikum Ini?

- Memahami cara mengimplementasikan **Filament Admin Panel** v3 di dalam ekosistem Laravel.
- Mengatur sistem **Role-Based Access Control (RBAC)** dan pembatasan hak akses menggunakan **Laravel Policies** (`BookPolicy` & `AuthorPolicy`) untuk membedakan hak akses _Admin_, _Staff_, dan _Viewer_.
- Membuat dan mengonfigurasi **Dashboard Widgets** (Stats Overview dan Chart Widget berbasis _Doughnut Chart_) untuk visualisasi data statistik perpustakaan.
- Mengelola relasi database kompleks seperti _One-to-Many_ dan _Many-to-Many_ langsung di dalam form generator Filament.

### B. Kesulitan yang Dihadapi dan Cara Mengatasinya

- **Kendala Storage Gambar**: Sempat terkendala gambar cover buku yang tidak tampil akibat link _storage_ belum terhubung.
    - _Solusi_: Menjalankan perintah `php artisan storage:link` dan memastikan direktori publik terhubung dengan benar.
- **Pengaturan Tataletak Chart**: Diagram statistik di awal sempat tampil terlalu besar atau berada di posisi atas _card_ statistik.
    - _Solusi_: Mengatur properti `$columnSpan` menjadi `'half'`, membatasi tinggi maksimum dengan `$getMaxHeight()`, serta mengatur urutan prioritas melalui properti `$sort`.

### C. Rencana Pengembangan Aplikasi Selanjutnya

- Menambahkan fitur riwayat peminjaman buku bagi anggota perpustakaan (_Member Management_).
- Mengintegrasikan sistem _notifikasi_ otomatis (email/WhatsApp) ketika status buku berubah dari dipinjam menjadi dikembalikan.
- Mengembangkan fitur ekspor laporan data buku dan statistik ke dalam format PDF atau Excel.
