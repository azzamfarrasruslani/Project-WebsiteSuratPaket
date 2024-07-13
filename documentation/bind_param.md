Fungsi `bind_param` dalam pernyataan `mysqli_stmt` digunakan untuk mengikat variabel ke parameter dalam pernyataan SQL yang telah disiapkan (prepared statement). Ini membantu mencegah serangan SQL injection dengan memastikan bahwa parameter yang diteruskan ke pernyataan SQL tersebut diinterpretasikan dengan benar sebagai data, bukan sebagai kode SQL.

Berikut adalah penjelasan tentang `bind_param` dan parameter "ssssiiii":

### Sintaks `bind_param`

```php
$stmt->bind_param("ssssiiii", $posisi, $status_barang, $waktu_penerimaan, $waktu_penyerahan, $id_barang, $id_kurir, $id_pemilik, $security_id);
```

### Parameter `bind_param`

1. **String Format**:
   - "ssssiiii" adalah string format yang menunjukkan tipe data dari setiap variabel yang diikat ke pernyataan tersebut. Setiap karakter dalam string ini mewakili tipe data yang sesuai untuk parameter.
   - `s` : String (karakter atau teks)
   - `i` : Integer (bilangan bulat)
   - `d` : Double (bilangan desimal)
   - `b` : Blob (binary large object)

2. **Variabel**:
   - Variabel-variabel yang disebutkan dalam `bind_param` akan diikat ke parameter dalam pernyataan SQL sesuai dengan urutan dan tipe data yang ditentukan dalam string format.

### Penjelasan dalam Contoh

```php
$stmt->bind_param("ssssiiii", $posisi, $status_barang, $waktu_penerimaan, $waktu_penyerahan, $id_barang, $id_kurir, $id_pemilik, $security_id);
```

- `"ssssiiii"` menunjukkan bahwa terdapat 8 parameter yang diikat dengan tipe data sebagai berikut:
  - `s` : `$posisi` (String)
  - `s` : `$status_barang` (String)
  - `s` : `$waktu_penerimaan` (String)
  - `s` : `$waktu_penyerahan` (String)
  - `i` : `$id_barang` (Integer)
  - `i` : `$id_kurir` (Integer)
  - `i` : `$id_pemilik` (Integer)
  - `i` : `$security_id` (Integer)

### Contoh Penggunaan dalam Konteks yang Lebih Lengkap

```php
// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Menyiapkan pernyataan SQL
$sql = "INSERT INTO serah_terima (posisi, status_barang, waktu_penerimaan, waktu_penyerahan, id_barang, id_kurir, id_pemilik, security_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

// Mengikat parameter
$stmt->bind_param("ssssiiii", $posisi, $status_barang, $waktu_penerimaan, $waktu_penyerahan, $id_barang, $id_kurir, $id_pemilik, $security_id);

// Menetapkan nilai untuk variabel
$posisi = "Posisi A";
$status_barang = "Terkirim";
$waktu_penerimaan = "2023-07-13 10:00:00";
$waktu_penyerahan = "2023-07-14 12:00:00";
$id_barang = 1;
$id_kurir = 2;
$id_pemilik = 3;
$security_id = 4;

// Menjalankan pernyataan
$stmt->execute();

// Menutup pernyataan dan koneksi
$stmt->close();
$conn->close();
```

Dalam contoh ini, variabel-variabel diikat ke parameter dalam pernyataan SQL menggunakan `bind_param`, dan kemudian pernyataan tersebut dieksekusi dengan nilai-nilai yang telah ditetapkan.