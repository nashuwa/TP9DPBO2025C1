# TP9DPBO2025C1

## Janji
Saya Nashwa Nadria Futi dengan NIM 2308130 mengerjakan Tugas Praktikum 8 dalam mata kuliah DPBO untuk keberkahan-Nya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin

## Struktur Kode MVP
```
# Struktur MVP Sederhana

MVP_PHP
├── 📂 model
│   ├── DB.class.php 
│   ├── Mahasiswa.class.php
│   └── TabelMahasiswa.php 
│
├── 📂 presenter
│   ├── KontrakPresenter.php
│   └── MahasiswaPresenter.php
│
├── 📂 templates
│   ├── form_add.html
│   ├── form_edit.html
│   └── list.html
│
├── 📂 view
│   ├── AddMahasiswa.php
│   ├── EditMahasiswa.php
│   ├── KontrakView.php
│   └── ListMahasiswa.php
│
├── 📄 add.php
├── 📄 edit.php
├── 📄 index.php
└── 📄 mvp_php.sql
```

## Dokumentasi
1. Page index
![Screenshot 2025-05-11 191901](https://github.com/user-attachments/assets/eaf20e63-44a9-4c10-af9e-6682dc7c362a)
2. Page add
![Screenshot 2025-05-11 191911](https://github.com/user-attachments/assets/3cc924c5-0e37-4d41-a867-802a7981702e)
3. Page update
![Screenshot 2025-05-11 191924](https://github.com/user-attachments/assets/bf8a21d8-4b3d-4120-b6d0-c14823daf211)

## Alur Program
1. Menampilkan Daftar Mahasiswa
Ketika pengguna membuka halaman utama (index.php), sistem akan memanggil View untuk menampilkan data. View ini kemudian menghubungi Presenter untuk meminta data mahasiswa. Presenter mengambil data dari Model yang berkomunikasi langsung dengan database. Setelah data diterima, Presenter mengolahnya dan mengembalikan ke View untuk ditampilkan dalam bentuk tabel menggunakan template HTML.

2. Menambah Data Mahasiswa
Saat pengguna mengklik tombol "Tambah Data", sistem membuka form tambah data. Ketika form diisi dan disubmit, View akan mengumpulkan data form dan mengirimkannya ke Presenter. Presenter melakukan validasi sederhana sebelum meminta Model untuk menyimpan data baru ke database. Jika berhasil, sistem akan mengarahkan pengguna kembali ke halaman utama.
4. Mengedit Data Mahasiswa
Ketika pengguna memilih edit data, sistem menampilkan form yang sudah terisi dengan data yang ada. View meminta data tersebut ke Presenter yang kemudian mengambil dari Model. Setelah pengguna melakukan perubahan dan menyimpannya, View mengirim data baru ke Presenter untuk diproses. Presenter memerintahkan Model untuk melakukan update data di database sebelum akhirnya pengguna diarahkan kembali ke halaman utama.

5. Hapus Data
Saat pengguna menghapus data, View menerima permintaan dan memverifikasi dengan Presenter. Presenter kemudian memerintahkan Model untuk menghapus data dari database. Setelah proses selesai, sistem memperbarui tampilan dengan mengarahkan kembali ke halaman utama.

Alur Utama Selalu Kembali ke View
Setiap aksi selalu berawal dan berakhir di View. Presenter bertindak sebagai perantara yang mengatur logika bisnis, sementara Model hanya fokus pada pengolahan data di database. View bertanggung jawab menampilkan informasi ke pengguna dan menerima input dari mereka.
