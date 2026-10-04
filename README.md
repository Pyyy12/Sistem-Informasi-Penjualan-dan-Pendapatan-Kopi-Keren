# ☕ Kopi Keren - Sistem Manajemen Penjualan & Pengeluaran Gerobak Keliling

Sistem berbasis **Laravel 11** untuk mencatat operasional armada gerobak keliling **Kopi Keren** (model street coffee keliling ala Kopi Jago). Aplikasi ini memudahkan tracking pemasukan harian dari 8 varian menu, pengeluaran operasional per gerobak, serta visualisasi grafik tren keuangan harian.

---

## 🚀 Fitur Utama

- **Pencatatan Penjualan Multi-Menu**: Form input terintegrasi untuk 8 varian menu sekaligus per hari.
- **Validasi Kapasitas Gerobak**: Memastikan total cup yang dicatat tidak melebihi kapasitas fisik gerobak (**maksimal 80 pcs per gerobak/hari**).
- **Pencatatan Pengeluaran Operasional**: Input cepat biaya harian seperti es batu kristal, bensin, cup/sedotan, dan kebutuhan logistik lainnya.
- **Dashboard Ringkasan Keuangan**:
  - Total Omzet / Pemasukan
  - Total Biaya Operasional / Pengeluaran
  - Laba Bersih (*Net Profit*)
- **Grafik Tren Interaktif**: Visualisasi perbandingan pemasukan vs pengeluaran harian menggunakan **Chart.js**.

---

## 📋 Daftar 8 Menu Kopi Keren

| No | Nama Menu | Kategori | Harga (Rp) |
|---|---|---|---|
| 1 | Kopi Hitam Tubruk | Coffee | 7.000 |
| 2 | Americano Dingin | Coffee | 8.000 |
| 3 | Cokelat Klasik | Non-Coffee | 9.000 |
| 4 | Kopi Susu Gula Aren | Signature | 10.000 |
| 5 | Kopi Pandan Latte | Flavored Latte | 11.000 |
| 6 | Vanilla Latte | Flavored Latte | 12.000 |
| 7 | Matcha Latte | Non-Coffee | 12.000 |
| 8 | Caramel Macchiato | Premium | 13.000 |

*Kapasitas bawaan: 80 cups per unit gerobak.*

---

## 🛠️ Persyaratan Sistem

- **PHP** >= 8.2
- **Composer** >= 2.0
- **MySQL / MariaDB / SQLite**
- **Node.js & NPM** (opsional jika menggunakan Tailwind via Vite)

---

## 📦 Panduan Instalasi

### 1. Clone Repositori & Masuk ke Folder Proyek
```bash
git clone [https://github.com/username/kopi-keren.git](https://github.com/username/kopi-keren.git)
cd kopi-keren
