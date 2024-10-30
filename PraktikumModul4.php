// ainaya
<?php
// Array untuk menyimpan data barang
$barang = [
    ["id" => 1, "nama" => "Buku", "kategori" => "Alat Tulis", "harga" => 20000],
    ["id" => 2, "nama" => "Pulpen", "kategori" => "Alat Tulis", "harga" => 5000]
];

// Create 
if (isset($_POST['create'])) {
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $kategori = $_POST["kategori"];
    $harga = $_POST["harga"];  // Tambahkan input untuk harga
    $barang[] = ["id" => $id,"nama" => $nama, "kategori" => $kategori, "harga" => $harga];
}

// Delete 
if (isset($_POST["delete"])) {
    $index = $_POST["delete"];
    unset($barang[$index]);
    $barang = array_values($barang); // Mengurutkan ulang array setelah dihapus
}
?>

<!-- Form untuk menambahkan barang -->
<form action="" method="POST">
    <label for="id">ID:</label>
    <input type="int" id="ID" name="id" required><br>

    <label for="nama">Nama Barang:</label>
    <input type="text" id="nama" name="nama" required><br>

    <label for="kategori">Kategori Barang:</label>
    <input type="text" id="kategori" name="kategori" required><br>

    <label for="harga">Harga Barang:</label> <!-- Tambahkan input untuk harga -->
    <input type="number" id="harga" name="harga" required><br>

    <input type="submit" name="create" value="Tambah Barang">
</form>



<?php
// Menampilkan daftar barang dalam tabel
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Nama Barang</th><th>Kategori</th><th>Harga</th><th>Aksi</th></tr>";

foreach ($barang as $index => $b) {
    echo "<tr>";
        echo "<td>". $b["id"] ."</td>";
        echo "<td>" . $b["nama"] . "</td>";
        echo "<td>" . $b["kategori"] . "</td>";
        echo "<td>" . $b["harga"] . "</td>";
        echo "<td>
            <form action='' method='POST' style='display:inline-block;'>
                <input type='hidden' name='delete' value='{$index}'>
                <input type='submit' value='Hapus'>
            </form>
        </td>";
    echo "</tr>";
}

echo "</table>";
?>
