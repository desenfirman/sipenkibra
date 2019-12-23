# SIPENKIBRA

<p align="center">Master branch: <img src="https://travis-ci.org/desenfirman/sipenkibra.svg?branch=master"></p>
<p align="center">Development branch: <img src="https://travis-ci.org/desenfirman/sipenkibra.svg?branch=development"></p>

## How to Install

### Requirement

```text
- XAMPP
- Composer : https://getcomposer.org/download/
```

### Installation Instruction

1. Clone Repository

    ```bash
    $ git clone https://github.com/desenfirman/sipenkibra.git
    $ cd sipenkibra
    $ cp .env.example .env

    ```

2. Set Up Environment Variable
    edit file .env using your text editor. set:

    ```text
    DB_DATABASE=sipenkibra (your database name)
    DB_USERNAME=root (if you're use XAMPP)
    DB_PASSWORD= (if you're use XAMPP)
    ```

3. Install Package and Run Migration

    ```bash
    $ composer self-update
    $ composer install
    $ php artisan key:generate
    $ php artisan migrate:refresh --seed
    ```

### Run/serve this project on localhost

```bash
$ php artisan serve
  access webpage using http://localhost:8000/
```

## Fungsionalitas SIPENKIBRA

### Pengguna Terdaftar

![Fungsionalitas Pengguna Terdaftar](https://i.imgur.com/GlZWr5z.gif)

- [X] Login
- [X] Logout

### Juri

![Fungsionalitas Juri](https://i.imgur.com/tDyEFd2.gif)
![Fungsionalitas Juri](https://i.imgur.com/2VnrlG1.gif)

- [X] Melihat dashboard juri
- [X] Membuka form penilaian
- [X] Memilih nilai
- [X] Submit nilai

### Regu Terdaftar

![Fungsionalitas Regu Terdaftar: Lihat Nilai](https://i.imgur.com/YGuwsnH.gif)
![Fungsionalitas Regu Terdaftar: Lihat Peringkat](https://i.imgur.com/ZsTLQ3k.gif)

- [X] Melihat dashboard regu peserta
- [X] Melihat rekap nilai
- [ ] ~~Melihat pemberitahuan~~
- [X] Melihat peringkat
- [X] Melihat rekap nilai seluruh regu peserta
- [ ] ~~Mengunduh rekap nilai~~

### Panitia

![Fungsionalitas Panitia: Melakukan konfirmasi peserta](https://i.imgur.com/6GzFzeq.gif)
![Fungsionalitas Panitia: Tambah juri](https://i.imgur.com/4NaTDQI.gif)
![Fungsionalitas Panitia: Tambah peserta](https://i.imgur.com/1S9llbd.gif)

- [X] Melihat dashboard panitia
- [X] Menambahkan regu peserta
- [X] Mengkonfirmasi regu peserta
- [X] Menambahkan juri
- [X] Meregister Panitia

## specification candidate

- [x] blok lihat rekap nilai jika belum dinilai
- [x] tidak bisa akses form penilaian ketika belum konfirmasi
- [x] warna hijau jika telah dinilai (DASHBOARD JURI)
- [ ] ~~urutkan berdasarkan no_regu (DASHBOARD JURI)~~
- [x] blok lihat peringkat & lihat semua regu peserta ketika semua belum dinilai
- [ ] ~~add repeat password~~
- [ ] ~~add biodata regu peserta in lihat form penilaian~~

## Some to-do-list (should-do's)

- [x]  change lihatDashboard() to index() in documentation
- [x]  add Auth facades to documentation
- [x]  add id_juri, id_peserta, id_panitia in documentation
- [x]  add role in user database
- [x]  add rememberToken in user table
- [x]  remove id_juri in membuka form penilaian
- [x]  add no_regu in updateNilai
- [x]  change parameter input in konfirmasi
- [x]  ambil data regu in lihat nilai semua regu peserta

## Unexpected changes

- [ ] ~~add lihat nilai seluruh regu peserta in panitia~~

## Some optimization candidate

- ~~use only one Auth function~~

## Kelompok 1

```text
Iskarimah Hidayatin         - Project Manager
Ridwan Fajar Widodo         - System Analyst
Dese Narfa Firmansyah       - Programmer
Gema Prajna Tri Pamungkas   - Tester
```
