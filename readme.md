# SIPENKIBRA

<p align="center">Master branch: <img src="https://travis-ci.org/desenfirman/sipenkibra.svg?branch=master"></p>
<p align="center">Development branch: <img src="https://travis-ci.org/desenfirman/sipenkibra.svg?branch=development"></p>

## How to Install
### Requirement
```
- XAMPP
- Composer : https://getcomposer.org/download/
```
### Installation Instruction
```text
$ git clone https://github.com/desenfirman/sipenkibra.git
$ cd sipenkibra
$ cp .env.example .env
```

    edit file .env using your text editor. set:
        DB_DATABASE=sipenkibra (your database name)
        DB_USERNAME=root (if you're use XAMPP)
        DB_PASSWORD= (if you're use XAMPP)

```text
$ composer self-update
$ composer install
$ php artisan key:generate
$ php artisan migrate:refresh --seed
```
### Run/serve this project on localhost
```text
$ php artisan serve
  access webpage using http://localhost:8000/
```

## Fungsionalitas SIPENKIBRA
### Pengguna Terdaftar
- [X] Login
- [X] Logout
### Juri
- [X] Melihat dashboard juri
- [X] Membuka form penilaian
- [X] Memilih nilai
- [X] Submit nilai
### Regu Terdaftar
- [X] Melihat dashboard regu peserta
- [X] Melihat rekap nilai
- [ ] ~~Melihat pemberitahuan~~
- [X] Melihat peringkat
- [X] Melihat rekap nilai seluruh regu peserta
- [ ] ~~Mengunduh rekap nilai~~
### Panitia
- [X] Melihat dashboard panitia
- [X] Menambahkan regu peserta
- [X] Mengkonfirmasi regu peserta
- [X] Menambahkan juri
- [X] Meregister Panitia

## specification candidate
- [ ] blok lihat rekap nilai jika belum dinilai
- [ ] tidak bisa akses form penilaian ketika belum konfirmasi
- [ ] warna hijau jika telah dinilai
- [ ] blok lihat peringkat & lihat semua regu peserta ketika semua belum dinilai
- [ ] add repeat password

## Some to-do-list (should-do's)
- [ ]  change lihatDashboard() to index() in documentation
- [ ]  add Auth facades to documentation
- [ ]  add id_juri, id_peserta, id_panitia in documentation
- [ ]  add role in user database
- [ ]  add rememberToken in user table
- [ ]  remove id_juri in membuka form penilaian
- [ ]  add no_regu in updateNilai
- [ ]  change parameter input in konfirmasi
- [ ]  ambil data regu in lihat nilai semua regu peserta

## Testing Method
- [ ] Melihat rekap dari regu peserta
- [ ] Melihat dashboard panitia
- [ ] Memilih nilai

## Unexpected changes
- [ ] add lihat nilai seluruh regu peserta in panitia

## Some optimization candidate
- use only one Auth function

## Kelompok 1
```text
Iskarimah Hidayatin
Ridwan Fajar Widodo
Dese Narfa Firmansyah
Gema Prajna Tri Pamungkas
```
