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

### **Tabel 1: users**
| **Nama Field**  | **Tipe Data** | **Keterangan**                                                  |
|-----------------|---------------|-----------------------------------------------------------------|
| id              | bigint        | Primary key, ID pengguna                                        |
| name            | string        | Nama lengkap pengguna                                           |
| email           | string        | Email pengguna (unique)                                         |
| password        | string        | Password yang dienkripsi                                         |
| role            | enum          | Role pengguna (admin, dosen, mahasiswa)                         |
| created_at      | timestamp     | Waktu pembuatan akun                                            |
| updated_at      | timestamp     | Waktu pembaruan akun                                            |

### **Tabel 2: dosen**
| **Nama Field**  | **Tipe Data** | **Keterangan**                                                  |
|-----------------|---------------|-----------------------------------------------------------------|
| id              | bigint        | Primary key, ID dosen                                           |
| user_id         | bigint        | Foreign key, ID pengguna dari tabel `users`                     |
| keahlian        | string        | Keahlian dosen (misalnya: Sistem Informasi, Jaringan Komputer) |
| created_at      | timestamp     | Waktu pembuatan data dosen                                      |
| updated_at      | timestamp     | Waktu pembaruan data dosen                                      |

### **Tabel 3: mahasiswa**
| **Nama Field**  | **Tipe Data** | **Keterangan**                                                  |
|-----------------|---------------|-----------------------------------------------------------------|
| id              | bigint        | Primary key, ID mahasiswa                                       |
| user_id         | bigint        | Foreign key, ID pengguna dari tabel `users`                     |
| nim             | string        | Nomor Induk Mahasiswa (unik)                                    |
| jurusan         | string        | Jurusan mahasiswa                                               |
| created_at      | timestamp     | Waktu pembuatan data mahasiswa                                  |
| updated_at      | timestamp     | Waktu pembaruan data mahasiswa                                  |

### **Tabel 4: judul_skripsi**
| **Nama Field**  | **Tipe Data** | **Keterangan**                                                  |
|-----------------|---------------|-----------------------------------------------------------------|
| id              | bigint        | Primary key, ID judul skripsi                                   |
| mahasiswa_id    | bigint        | Foreign key, ID mahasiswa dari tabel `mahasiswa`                 |
| judul           | string        | Judul skripsi yang diajukan oleh mahasiswa                       |
| deskripsi       | text          | Deskripsi singkat tentang skripsi                               |
| status          | enum          | Status pengajuan judul (pending, diterima, ditolak)             |
| created_at      | timestamp     | Waktu pembuatan pengajuan judul skripsi                         |
| updated_at      | timestamp     | Waktu pembaruan status atau deskripsi judul skripsi              |

### **Tabel 5: bimbingan**
| **Nama Field**  | **Tipe Data** | **Keterangan**                                                  |
|-----------------|---------------|-----------------------------------------------------------------|
| id              | bigint        | Primary key, ID bimbingan                                       |
| dosen_id        | bigint        | Foreign key, ID dosen dari tabel `dosen`                         |
| judul_skripsi_id| bigint        | Foreign key, ID judul skripsi dari tabel `judul_skripsi`         |
| komentar        | text          | Komentar atau umpan balik dari dosen                            |
| created_at      | timestamp     | Waktu pembuatan bimbingan                                       |
| updated_at      | timestamp     | Waktu pembaruan bimbingan                                       |

---

## **Relasi antar Tabel**

- **users** ↔ **dosen**: **One-to-One** (Setiap dosen terkait dengan satu pengguna di tabel `users`).
- **users** ↔ **mahasiswa**: **One-to-One** (Setiap mahasiswa terkait dengan satu pengguna di tabel `users`).
- **judul_skripsi** ↔ **mahasiswa**: **Many-to-One** (Setiap mahasiswa bisa mengajukan banyak judul skripsi, tapi setiap judul hanya untuk satu mahasiswa).
- **bimbingan** ↔ **dosen**: **Many-to-One** (Setiap bimbingan memiliki satu dosen, tapi satu dosen bisa membimbing banyak mahasiswa).
- **bimbingan** ↔ **judul_skripsi**: **Many-to-One** (Setiap bimbingan terkait dengan satu judul skripsi, namun satu judul skripsi bisa memiliki banyak bimbingan).
