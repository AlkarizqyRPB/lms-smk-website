# 📚 Learning Management System - SMK Negeri 1 Buahdua

Sebuah aplikasi **Learning Management System (LMS)** berbasis web yang dirancang khusus untuk **SMK Negeri 1 Buahdua**, dibangun menggunakan **Laravel 11** dan **Blade Template Engine**. Sistem ini memfasilitasi manajemen pembelajaran daring, serta pengelolaan guru, siswa, kelas, materi, dan kuis dalam satu platform terintegrasi.

---

## 🚀 Fitur Utama

- 🔐 **Autentikasi & Otorisasi**
  - Login multi-role: Admin, Guru, dan Siswa
  - Registrasi akun dilakukan oleh Admin

- 👥 **Manajemen Pengguna**
  - Admin dapat menambah, mengedit, dan menghapus akun guru dan siswa

- 🏫 **Manajemen Kelas & Jurusan**
  - Pengelolaan data kelas dan jurusan secara dinamis

- 📚 **Materi & Modul**
  - Guru dapat mengunggah materi dan modul pembelajaran per kelas

- 📝 **Kuis**
  - Pembuatan dan penilaian kuis daring

- 📊 **Dashboard Dinamis**
  - Tampilan dashboard berbeda sesuai dengan peran pengguna

---

## 🛠️ Teknologi yang Digunakan

- **Framework**: Laravel 11
- **Template Engine**: Blade
- **Database**: MySQL
- **Server Environment**: Laragon
- **Frontend**: HTML, CSS, Bootstrap 5, JavaScript

---

## ⚙️ Instalasi dan Konfigurasi

### 1. Clone Repository

```bash
git clone https://github.com/username/lms-smkn1buahdua.git
cd lms-smkn1buahdua
```

### 2. Install Dependency

```bash
composer install
npm install && npm run dev
```

### 3. Salin File .env

```bash
cp .env.example .env
```

### 4. Generate App Key

   ```bash
php artisan key:generate
```

### 5. Konfigurasi Database
Buka file .env dan ubah konfigurasi database:

  ```bash
DB_DATABASE=lms
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Migrasi dan Seeder (opsional)

```bash
php artisan migrate --seed
```

### 7. Jalankan Server

```bash
php artisan serve
```

### 8. Jalankan Frontend

```bash
npm run dev
```
