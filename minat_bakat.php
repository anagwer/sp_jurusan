<?php include 'koneksi.php'; ?>
<?php include 'navbar.php'; ?>

<h3>Data Minat dan Bakat</h3>
<button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalMinat"><i class="fas fa-plus"></i> Tambah Minat/Bakat</button>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $data = mysqli_query($koneksi, "SELECT * FROM minat_bakat");
        $no = 1;
        while ($row = mysqli_fetch_array($data)) {
            echo "<tr>
                    <td>$no</td>
                    <td>{$row['kode']}</td>
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
<div class="modal fade" id="modalMinat" tabindex="-1">
  <div class="modal-dialog">
    <form method="POST">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">Tambah Minat/Bakat</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="text" name="kode" class="form-control mb-2" placeholder="Kode (misal: G1)" required>
          <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Minat/Bakat"></textarea>
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
// Simpan
if (isset($_POST['simpan'])) {
    $kode = $_POST['kode'];
    $desk = $_POST['deskripsi'];
    mysqli_query($koneksi, "INSERT INTO minat_bakat (kode, deskripsi) VALUES ('$kode','$desk')");
    echo "<script>window.location='minat_bakat.php';</script>";
}

// Hapus
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM minat_bakat WHERE id=$id");
    echo "<script>window.location='minat_bakat.php';</script>";
}
?>

<?php include 'footer.php'; ?>
