# PROPOSAL INOVASI
# Aplikasi Pendataan Keluarga Terpadu (Tag-Aja) – BPS Kabupaten Bintan

**Tanggal Implementasi Inovasi**: Senin, 1 Juni 2026  
**Kelompok**: Kelompok Umum  
**Kategori**: Kategori 8 – Transformasi Digital Pelayanan Publik  

---

## Ringkasan (5%)
Badan Pusat Statistik (BPS) Kabupaten Bintan menghadirkan inovasi **Tag-Aja (Pendataan Keluarga Terpadu)**, sebuah sistem manajemen pendataan kesejahteraan sosial dan jaring pengaman sosial berbasis web responsif yang mengintegrasikan pemetaan koordinat hunian (*geotagging*) dan kompresi foto fisik rumah langsung dari browser *smartphone* petugas di lapangan. Inovasi ini menyederhanakan proses entri data keluarga, mempercepat audit kelayakan penerima bantuan, meminimalkan anomali data (seperti duplikasi NIK dan ketidaksesuaian struktur Kepala Keluarga), serta menyajikan dasbor analitik sebaran bantuan sosial (PKH, BPNT, BLT) secara real-time. Melalui Tag-Aja, petugas lapangan dapat mendata secara mandiri di lokasi hunian, dan supervisor tingkat kelurahan dapat memantau serta mengekspor data wilayahnya untuk keperluan evaluasi kebijakan secara cepat dan akurat.

---

## Ide Inovatif (20%)

### Latar Belakang
Di era transformasi digital, instansi pemerintah dituntut untuk menyajikan data pelayanan publik dan sosial yang cepat, akurat, dan transparan. Pada proses pendataan kesejahteraan keluarga di BPS Kabupaten Bintan, prosedur konvensional seringkali menghadapi kendala inefisiensi, seperti kerentanan kesalahan input manual pada kuesioner kertas (*paper-based*), ketiadaan bukti pendukung visual kondisi fisik rumah, serta sulitnya memetakan titik koordinat hunian penerima manfaat secara akurat.

Untuk mengatasi permasalahan tersebut, BPS Kabupaten Bintan merancang aplikasi **Tag-Aja**. Dengan memanfaatkan fitur *Geolocation API* bawaan browser pada perangkat seluler petugas di lapangan, Tag-Aja mampu mencatat koordinat spasial secara instan. Selain itu, integrasi algoritma kompresi gambar otomatis pada server backend meminimalisir kendala kuota internet petugas tanpa perlu menginstal aplikasi tambahan. Kehadiran Tag-Aja merupakan komitmen nyata BPS Kabupaten Bintan untuk menghadirkan sistem pendataan sosial yang inklusif, akuntabel, dan adaptif.

### Tujuan dan Output Inovasi
- **Digitalisasi dan percepatan** proses input data survei keluarga langsung dari lapangan tanpa rekapitulasi manual ulang.
- **Transparansi verifikasi lapangan** dengan mewajibkan fitur pengambilan foto fisik rumah yang langsung terunggah ke *storage* terpusat.
- **Penyajian data spasial dan analitik** persentase cakupan bantuan sosial di dasbor khusus untuk level kelurahan maupun wilayah kabupaten secara utuh.
- **Sistem validasi silang (cross-validation)** untuk memastikan setiap anggota keluarga masuk pada KK yang sesuai, berkat fitur *unique validation* Nomor Induk Kependudukan (NIK) di tingkat *database*.

**Output yang dihasilkan**:
- **Aplikasi Web Tag-Aja** yang responsif pada layar ponsel (mobile-friendly).
- **Dasbor Eksekutif** yang menampilkan grafik tren penyaluran PKH, BPNT, BLT Lansia, dsb.
- **Database Keluarga & Anggota Rumah Tangga** yang bersih dan siap di-ekspor ke dalam format *CSV* untuk olah data lanjutan.

---

## Sisi Kebaruan dan Nilai Tambah
- **Geo-Tagging Terintegrasi (*On-Browser GPS*)**: Pengumpulan titik lintang dan bujur langsung terisi otomatis menggunakan *Geolocation API*, memperkecil ruang *human-error* pada saat penentuan titik hunian.
- **Fitur Image Compression Berbasis Server**: Petugas bisa menghemat kuota karena aplikasi ini bisa langsung mendeteksi ukuran foto melebihi 1MB dan melakukan manipulasi pengecilan *size* secara pintar (*lossy compression*) di sisi *backend* PHP (Laravel).
- **Hierarki Data Wilayah (Kelurahan - RT/RW)**: Konfigurasi hak akses berbasis zona (*Zone-based Role*), yang mana Supervisor Kelurahan hanya memiliki wewenang mengevaluasi dan mengekspor data yang bernaung di bawah wilayah kelurahan miliknya saja.

---

## Signifikansi (25%)

### Implementasi dan Dampak

**Sebelum Tag-Aja (Sistem Konvensional)**:
- Petugas mengisi kuesioner kertas yang butuh waktu lama untuk di-_entry_ ulang ke komputer kantor.
- Sulit memverifikasi kebenaran fisik rumah karena foto dicetak atau di-copy secara terpisah ke dalam *flashdisk*.
- Pengarsipan bertumpuk sehingga rawan kehilangan berkas.

**Setelah Tag-Aja (Sistem Digital)**:
- Entri data dilakukan seketika (*real-time*) di rumah responden dan langsung terkoneksi ke dalam sistem _cloud_.
- Supervisor dapat memverifikasi dari kantor atau di manapun, memonitor kinerja setiap petugas survei, dan mengaudit bukti foto dalam hitungan detik.
- Kesalahan data (seperti NIK yang terdaftar ganda, atau status lebih dari satu Kepala Keluarga di satu entitas rumah tangga) langsung ditolak (*auto-rejected*) oleh sistem secara *real-time*.

---

## Kontribusi terhadap TPB (5%)
- **TPB 1 – Tanpa Kemiskinan**: Mengawal ketepatan penyaluran bantuan sosial agar tidak terjadi *inclusion / exclusion error*, sehingga sasaran pengentasan kemiskinan lebih berkeadilan.
- **TPB 10 – Berkurangnya Kesenjangan**: Memberikan pijakan data *evidence-based* bagi pembuat kebijakan untuk mendistribusikan jaring pengaman sosial dengan lebih inklusif dan merata antar Kelurahan/Desa.
- **TPB 11 – Kota dan Pemukiman yang Berkelanjutan**: Mendorong integrasi teknologi pemetaan tata ruang (*geotagging*) dan kelayakan hunian dalam mengidentifikasi infrastruktur hunian masyarakat.

---

## Adaptabilitas (20%)
Inovasi "Tag-Aja" memiliki *scalability* dan *adaptability* yang sangat mumpuni untuk diadopsi oleh Pemerintah Daerah / Dinas Sosial / BPS tingkat kota lain di seluruh Indonesia:
- **Komponen Gagasan**: Menjadi sistem pencatatan survei *Door-to-Door* berbasis _Cloud_ untuk memonitor kelayakan penerima bantuan pemerintah (PKH, BPNT).
- **Komponen Teknis**: Dibangun menggunakan *framework open-source* yang paling populer (Laravel 11 dan Vue/Alpine/Blade). Mudah untuk dimodifikasi maupun diperluas untuk survei tambahan (contoh: survei pertanian atau kesehatan ibu hamil).
- **Komponen Manajerial**: Konsep hierarki "Admin – Supervisor – Petugas" bisa dipadankan dengan jenjang struktural di instansi manapun (contoh: Lurah – Tenaga Lapangan).

---

## Keberlanjutan (20%)

### Sumber Daya
- **SDM**: Tenaga survei sebagai *Petugas*, Kepala Kelurahan/Koordinator Lapangan sebagai *Supervisor*, dan Divisi IT sebagai *Admin*.
- **Teknologi**: Arsitektur server yang sangat efisien (karena sudah dilengkapi *image processing compressor*). Server *VPS Basic* sudah sanggup menangani ribuan input dari lapangan.
- **Infrastruktur**: Hanya bermodalkan ponsel cerdas (*smartphone*) dengan koneksi internet 4G/3G milik masing-masing petugas lapangan tanpa keharusan memiliki aplikasi instalasi berbayar di Play Store.

### Strategi Keberlanjutan
- **Institusional**: Dimasukkan ke dalam Peraturan Daerah / Kebijakan SOP Survei Sosial resmi yang mengharuskan penggunaan aplikasi digital bagi setiap tenaga *tracer* / tenaga pelaksana di lapangan.
- **Teknis**: Penyediaan fitur unggah CSV (*Export/Import*) untuk memudahkan sistem agar sinkron dengan program *Big Data* pemerintah daerah secara luas (seperti SID - Sistem Informasi Desa).

---

## Kolaborasi Pemangku Kepentingan (5%)
- **Petugas Lapangan (Tenaga Survei)**: Ujung tombak pelaksanaan pengumpulan data.
- **Kantor Kelurahan (Supervisor)**: Melakukan proses _review_, verifikasi silang terhadap warga di wilayah kerjanya.
- **Pemerintah Kota (Dinas Sosial / BPS)**: Memperoleh hasil jadi (*raw data* dan *dashboard analitik*) untuk menyusun perencanaan program bantuan dan mengevaluasi efektivitasnya secara menyeluruh.
