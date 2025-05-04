# **ThesisTrack**

**ThesisTrack** adalah aplikasi manajemen progres skripsi yang dirancang untuk membantu admin, dosen pembimbing, dan mahasiswa dalam mengelola proses bimbingan skripsi. Aplikasi ini memungkinkan mahasiswa untuk mengajukan judul skripsi, mengunggah dokumen, serta berinteraksi dengan dosen pembimbing. Dosen pembimbing dapat memberikan umpan balik dan memantau perkembangan skripsi mahasiswa, sementara admin dapat mengelola pengguna dan sistem secara keseluruhan.

---

## **Roles dan Fitur-fitur**

### **1. Admin**
**Fitur-fitur:**
- **Manajemen Pengguna:** Admin dapat menambah, mengedit, atau menghapus akun pengguna (mahasiswa, dosen pembimbing, dan admin lainnya).
- **Manajemen Judul Skripsi:** Admin dapat menyetujui atau menolak pengajuan judul skripsi mahasiswa.
- **Melihat Laporan:** Admin dapat melihat laporan terkait perkembangan skripsi mahasiswa secara keseluruhan.
- **Pengaturan Sistem:** Admin dapat mengatur sistem, termasuk peran pengguna dan pengaturan aplikasi.

### **2. Dosen Pembimbing**
**Fitur-fitur:**
- **Menyetujui atau Menolak Judul Skripsi:** Dosen pembimbing dapat meninjau dan memutuskan apakah judul skripsi yang diajukan oleh mahasiswa diterima atau perlu revisi.
- **Pemantauan Progres Skripsi:** Dosen pembimbing dapat memantau kemajuan skripsi mahasiswa yang dibimbing, termasuk melihat upload dokumen yang relevan.
- **Feedback:** Dosen pembimbing dapat memberikan umpan balik kepada mahasiswa terkait dengan dokumen atau progres yang telah diunggah.
- **Pengunggahan Bimbingan:** Dosen pembimbing dapat mengunggah bahan bimbingan atau referensi untuk mahasiswa.

### **3. Mahasiswa**
**Fitur-fitur:**
- **Pengajuan Judul Skripsi:** Mahasiswa dapat mengajukan judul skripsi untuk mendapatkan persetujuan dari dosen pembimbing.
- **Upload Dokumen Skripsi:** Mahasiswa dapat mengunggah dokumen skripsi mereka untuk diperiksa oleh dosen pembimbing.
- **Melihat Status Progres:** Mahasiswa dapat melihat status perkembangan judul skripsi mereka, apakah sudah disetujui, dalam proses revisi, atau ditolak.
- **Mendapatkan Umpan Balik:** Mahasiswa dapat menerima umpan balik atau catatan dari dosen pembimbing mengenai skripsi mereka.

---

## **Struktur Database**

Berikut adalah struktur tabel yang digunakan dalam aplikasi **ThesisTrack**:

| **Tabel**               | **Kolom**                                             | **Deskripsi**                                                                                                                                      |
|-------------------------|------------------------------------------------------|--------------------------------------------------------------------------------------------------------------------------------------------------|
| **users**               | id, name, email, password, role, created_at, updated_at | Menyimpan data pengguna (admin, dosen, mahasiswa).                                                                                              |
| **dosen**               | id, user_id, keahlian, created_at, updated_at         | Menyimpan data dosen, termasuk keahlian. Relasi ke tabel `users` melalui `user_id`.                                                              |
| **mahasiswa**           | id, user_id, nim, jurusan, created_at, updated_at      | Menyimpan data mahasiswa, termasuk NIM dan jurusan. Relasi ke tabel `users` melalui `user_id`.                                                    |
| **judul_skripsi**       | id, mahasiswa_id, judul, deskripsi, status, created_at, updated_at | Menyimpan pengajuan judul skripsi mahasiswa, status persetujuan judul, dan deskripsi skripsi. Relasi ke tabel `mahasiswa` melalui `mahasiswa_id`. |
| **bimbingan**           | id, dosen_id, judul_skripsi_id, komentar, created_at, updated_at | Menyimpan riwayat bimbingan dosen terhadap judul skripsi mahasiswa, termasuk komentar dari dosen. Relasi ke tabel `dosen` dan `judul_skripsi`.     |

---

## **Instalasi**

1. **Clone repository:**

