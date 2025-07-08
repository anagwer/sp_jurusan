<?php include 'koneksi.php'; ?>
<?php include 'navbar.php'; ?>

<h3>Data Jurusan</h3>
<button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalJurusan"><i class="fas fa-plus"></i> Tambah Jurusan</button>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Jurusan</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $jurusan = mysqli_query($koneksi, "SELECT * FROM jurusan");
        $no = 1;
        while ($row = mysqli_fetch_array($jurusan)) {
            echo "<tr>
                    <td>$no</td>
                    <td>{$row['nama_jurusan']}</td>
                    <td>{$row['deskripsi']}</td>
                    <td>
                        <a href='?hapus={$row['id']}' class='btn btn-danger btn-sm'><i class='fas fa-trash'></i></a>
                    </td>
                  </tr>";
            $no++;
        }
        ?>
    </tbody>
</table>

<!-- Modal Tambah -->
<div class="modal fade" id="modalJurusan" tabindex="-1">
  <div class="modal-dialog">
    <form method="POST">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">Tambah Jurusan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="text" name="nama" class="form-control mb-2" placeholder="Nama Jurusan" required>
          <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Jurusan"></textarea>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button class="btn btn-primary" name="simpan">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>

<?php
// Simpan data
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    mysqli_query($koneksi, "INSERT INTO jurusan (nama_jurusan, deskripsi) VALUES ('$nama','$deskripsi')");
    echo "<script>window.location='jurusan.php';</script>";
}

// Hapus data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM jurusan WHERE id=$id");
    echo "<script>window.location='jurusan.php';</script>";
}
?>

<?php include 'footer.php'; ?>
