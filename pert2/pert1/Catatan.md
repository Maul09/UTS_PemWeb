Nama: Ahmad Maulana Ulumuddin
Nim: 20230803007
Matkul: Pemweb

Hari: Senin 24 Maret

• website adalah kumpulan halaman web yang bisa d akses melalui internet menggunakan   browser oleh semua orang
• html membangun struktur dan kerangka dasar sebuah halaman website.

• volumes: 
volume itu tmpt dimana kita menyimpan file nya

listen 80;
Artinya server akan mendengarkan pada port 80 (port default untuk HTTP).
server_name localhost;
Menentukan nama server yang akan dilayani, dalam hal ini adalah localhost.
root /usr/share/nginx/html;
Menentukan direktori root tempat file HTML akan disajikan.
index index.html index.htm;
Menentukan file indeks (halaman utama) yang akan dilayani saat mengakses root.
location / { ... }
Blok lokasi root yang menangani semua permintaan ke server.
try_files $uri $uri/ =404;
Mencoba mencari file sesuai dengan URI yang diminta, jika tidak ditemukan akan mengembalikan respons 404 (Not Found).
location /latihan { ... }
Blok lokasi tambahan untuk menangani permintaan dengan prefix /latihan.
alias /usr/share/nginx/latihan/;
Mengubah root direktori untuk lokasi /latihan menjadi /usr/share/nginx/latihan/.
index index.html index.htm home.html;
Menentukan file indeks dalam direktori latihan, bisa berupa index.html, index.htm, atau home.html.
• ports:
      - 80:80 
ports nya 80:80 harus sama dengan listen yang nginx.conf karna lebih mudah
• root /usr/share/nginx/html; 
mengatur direktori root tempat file-file situs web berada

<!DOCTYPE html> memberitahu browser bahwa dokumen ini menggunakan HTML5
<html lang="en">  mendefinisikan elemen root dari dokumen HTML. Atribut lang="en" menunjukkan bahwa bahasa dokumen adalah bahasa Inggris.
<div> (Division): Elemen pembungkus atau container untuk mengelompokkan konten. Biasanya digunakan untuk tata letak atau pengelompokan elemen lain.

<p> (Paragraph): Elemen untuk menampilkan teks dalam bentuk paragraf.
<title>: Menentukan judul halaman yang ditampilkan pada tab browser.
<body>: Bagian utama halaman web tempat menampung semua konten yang akan ditampilkan di browser.
<head>: Bagian yang berisi metadata, informasi tentang dokumen, link CSS, skrip JavaScript, dan judul halaman.
<meta>: Elemen untuk menyimpan metadata, seperti karakter encoding, deskripsi halaman, dan pengaturan responsif.
