# SIPENKIBRA

<p align="center">Master branch: <img src="https://travis-ci.org/desenfirman/sipenkibra.svg?branch=master">Development branch: <img src="https://travis-ci.org/desenfirman/sipenkibra.svg?branch=development"></p>

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
- [ ] Login
- [ ] Logout
### Juri
- [ ] Melihat dashboard juri
- [ ] Membuka form penilaian
- [ ] Memilih nilai
- [ ] Submit nilai
### Regu Terdaftar
- [ ] Melihat dashboard regu peserta
- [ ] Melihat rekap nilai
- [ ] Melihat pemberitahuan
- [ ] Melihat peringkat
- [ ] Melihat rekap nilai seluruh regu peserta
- [ ] Mengunduh rekap nilai
### Panitia
- [ ] Melihat dashboard panitia
- [ ] Menambahkan regu peserta
- [ ] Mengkonfirmasi regu peserta
- [ ] Menambahkan juri

## Some to-do-list (should-do's)
- [ ]  change lihatDashboard() to index() in documentation
- [ ]  add Auth facades to documentation
- [ ]  add id_juri, id_peserta, id_panitia in documentation
- [ ]  add role in user database
- [ ]  add rememberToken in user table

## Kelompok 1
```text
Iskarimah Hidayatin
Ridwan Fajar Widodo
Dese Narfa Firmansyah
Gema Prajna Tri Pamungkas
```
