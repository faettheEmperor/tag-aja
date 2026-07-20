# LAPORAN INOVASI PEMANFAATAN TEKNOLOGI INFORMASI
# APLIKASI PENDATAAN KELUARGA TERPADU (TAG-AJA) BPS KABUPATEN BINTAN

---

## 1. Latar Belakang/Alasan Pengembangan Aplikasi
Aplikasi **Tag-Aja (Pendataan Keluarga Terpadu)** merupakan langkah strategis Badan Pusat Statistik (BPS) Kabupaten Bintan dalam merespon kebutuhan akan akurasi data kemiskinan dan ketepatan penyaluran program jaring pengaman sosial pemerintah (seperti Bantuan Pangan Non Tunai, Program Keluarga Harapan, dan BLT Dana Desa). Proses pendataan secara tradisional kerap memunculkan beberapa polemik mendasar di lapangan; di antaranya: tingkat tumpang tindih (*overlap*) data warga ganda, tidak adanya bukti fisik kondisi rumah saat survei (atau memakan biaya cetak foto berlebih), serta rentannya terjadi manipulasi informasi pada lembar kuesioner kertas yang menghambat program subsidi tepat sasaran.

Sebagai mitigasi atas masalah di atas, dikembangkanlah "Tag-Aja", sebuah sistem pencatatan berbasis *web-based application* yang memungkinkan petugas mendata secara mandiri menggunakan gawai (*smartphone*) secara *real-time*. Diperkaya dengan fitur integrasi koordinat GPS (*Geotagging*) dan kompresi foto fisik *on-server*, aplikasi ini secara drastis mengubah tata kelola pendataan warga menjadi terintegrasi, transparan, dan dapat diaudit seketika. "Tag-Aja" menjadi wujud reformasi birokrasi dan inovasi digital pelayanan sosial di lingkungan BPS Kabupaten Bintan.

---

## 2. Pemanfaatan Aplikasi Tersebut
Pemanfaatan secara masif atas aplikasi Tag-Aja ini mengundang rentetan manfaat terstruktur pada sistem pendataan, di antaranya:
- **Validasi Terstruktur dan Kedap Kesalahan**: Fitur pencegahan identitas ganda (NIK wajib unik 16 digit) dan *constraint* di mana satu rumah tangga wajib hanya memiliki "Satu Kepala Keluarga" memastikan integritas data terjamin 100% sejak tahap input pertama oleh petugas.
- **Monitoring Geografis Terpusat**: Penggunaan *Geotagging* membuat persebaran lokasi warga penerima bantuan dapat dimonitor secara keruangan (spasial).
- **Efisiensi Server dan Akses Fleksibel**: Tidak dibutuhkan infrastruktur berat. Server aplikasi secara pintar dapat melakukan *lossy-compression* untuk foto berukuran lebih dari 1 MB menjadi puluhan KB saja tanpa merusak detail gambar fisik rumah secara signifikan.

### Alur Kerja Aplikasi Tag-Aja (Petugas ke Supervisor)
1. **Pendataan Mandiri**: Petugas lapangan mendatangi lokasi hunian warga dan membuka aplikasi Tag-Aja lewat mobile browser.
2. **Entri Data & Geotagging**: Petugas menginput data Kepala Keluarga beserta Anggota Rumah Tangga, memilih jenis bantuan sosial yang diterima, merekam titik koordinat GPS, serta mengambil foto rumah.
3. **Validasi Instan Backend**: Sistem memproses data secara real-time. Jika NIK terdeteksi ganda atau struktur KK tidak sesuai (misalnya lebih dari satu Kepala Keluarga), sistem akan menolak otomatis (*auto-reject*).
4. **Kompresi Foto Otomatis**: Jika foto yang diunggah melebihi 1MB, server PHP GD library akan secara otomatis melakukan kompresi ukuran file hingga 60% sebelum disimpan ke storage server.
5. **Monitoring & Ekspor**: Supervisor Kelurahan login ke dasbor untuk memantau data yang terverifikasi dan administrator melakukan ekspor seluruh database kelurahan ke berkas CSV untuk keperluan analisis dinas sosial.

*(Visualisasi flowchart infografis alur kerja Tag-Aja dapat dilihat pada dokumen cetak PDF).*

### Tata Cara Akses Layanan Pendataan
- **Akses Petugas & Koordinator**: Aplikasi dapat diakses secara lokal melalui web browser di alamat: `http://localhost:8000/` (lingkungan Laragon) atau melalui URL domain deploy resmi instansi.
- **Batasan Hierarki**: Akun *Petugas* hanya akan melihat data pendaftarannya sendiri; akun *Supervisor* melihat kumulatif data satu kelurahannya; akun *Admin* mempunyai wewenang penuh se-kabupaten/kota.

---

## 3. Kendala dan Solusi

Berdasarkan hasil pemantauan pada siklus rilis dan tahapan implementasi perdana, tim pengembang menemukan dan berhasil menangani berbagai kendala krusial:

### 1. Kendala: Pembengkakan Penyimpanan Server (Overload Storage)
- **Deskripsi Masalah**: Petugas di lapangan rata-rata memakai ponsel keluaran terbaru dengan resolusi kamera tinggi. File foto rumah yang diunggah bisa mencapai 5 hingga 10 MB per gambar. Dalam uji beban, penyimpanan VPS dapat habis (Over-quota) hanya dalam beberapa hari pengumpulan data.
- **Solusi**: Diimplementasikan algoritma **Smart Image Compression** berbasis PHP GD *Library* di dalam *Controller* sistem. Jika ukuran foto di atas 1MB, sistem otomatis membaca format file (JPG/PNG) dan menekan kompresi secara *on-the-fly* sebelum disimpan ke *hard disk*, memangkas ukurannya tanpa mengorbankan fungsionalitas visual.

### 2. Kendala: Duplikasi Struktur Anggota (Dua Kepala Keluarga)
- **Deskripsi Masalah**: Terjadi anomali saat petugas tidak teliti (human error) menginput lebih dari satu "Kepala Keluarga" pada satu form keluarga, sehingga memecahkan struktur agregasi demografi.
- **Solusi**: Menambahkan *constraint check* di sisi server: `$kepalaCount !== 1` maka akan otomatis *Rollback* dengan pesan "*Hanya boleh ada Satu Kepala Keluarga*". Demikian pula untuk NIK wajib bersifat mandiri (*Unique validation*) bagi setiap anggota.

### 3. Kendala: Pendelegasian Tanggung Jawab Wilayah (Zona Kelurahan)
- **Deskripsi Masalah**: Timbul kekhawatiran atas kerahasiaan (*privacy*) data di mana supervisor antar-wilayah dapat memata-matai data demografi di luar kelurahan/desa yang ia asuh.
- **Solusi**: Diterapkan sistem **Role-Based Access Control (RBAC)** berbasis relasi *foreign key* `kelurahan_id`. Setiap fungsi kueri (*query database*) pada modul Dasbor dan Ekspor Laporan di-_inject_ filter ketat, sehingga supervisor hanya disajikan informasi yang valid sesuai wilayah kerjanya (`where('kelurahan_id', $user->kelurahan_id)`).

---

Bintan, 1 Juni 2026  
Plt. Kepala BPS Kabupaten Bintan  

*(Kosong / Tanpa Tanda Tangan)*  

**Donny Cahyo Wibowo, SST., M.Si.**  
NIP. 19790203 200212 1 008  
