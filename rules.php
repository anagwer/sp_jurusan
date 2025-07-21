<?php include 'koneksi.php'; ?>
<?php include 'navbar.php'; ?>

<h3>Data Rules Forward Chaining</h3>
<button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalRule"><i class="fas fa-plus"></i> Tambah Rule</button>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Rule</th>
            <th>Gejala (Minat/Bakat)</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $rules = mysqli_query($koneksi, "
            SELECT rules.*, jurusan.nama_jurusan 
            FROM rules 
            JOIN jurusan ON jurusan.id = rules.id_jurusan
        ");
        $no = 1;
        while ($row = mysqli_fetch_array($rules)) {
            $id = $row['id'];
            echo "<tr>
                    <td>$no</td>
                    <td>{$row['kode_rule']}</td>
                    <td>{$row['gejala']}</td>
                    <td>{$row['nama_jurusan']}</td>
                    <td>
                        <button class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#editModal$id'><i class='fas fa-edit'></i></button>
                        <a href='?hapus=$id' class='btn btn-danger btn-sm' onclick=\"return confirm('Yakin ingin menghapus?')\"><i class='fas fa-trash'></i></a>
                    </td>
                  </tr>";

            // Modal Edit
            echo "
            <div class='modal fade' id='editModal$id' tabindex='-1'>
              <div class='modal-dialog'>
                <form method='POST'>
                  <div class='modal-content'>
                    <div class='modal-header bg-warning text-white'>
                      <h5 class='modal-title'>Edit Rule</h5>
                      <button type='button' class='btn-close' data-bs-dismiss='modal'></button>
                    </div>
                    <div class='modal-body'>
                      <input type='hidden' name='id' value='{$id}'>
                      <input type='text' name='kode_rule' class='form-control mb-2' value='{$row['kode_rule']}' required>
                      <textarea name='gejala' class='form-control mb-2'>{$row['gejala']}</textarea>
                      <select name='id_jurusan' class='form-control' required>
                        <option value=''>Pilih Jurusan</option>";
                        $jurusan = mysqli_query($koneksi, "SELECT * FROM jurusan");
                        while ($j = mysqli_fetch_array($jurusan)) {
                            $selected = ($j['id'] == $row['id_jurusan']) ? "selected" : "";
                            echo "<option value='{$j['id']}' $selected>{$j['nama_jurusan']}</option>";
                        }
                    echo "</select>
                    </div>
                    <div class='modal-footer'>
                      <button class='btn btn-secondary' data-bs-dismiss='modal'>Batal</button>
                      <button class='btn btn-warning' name='update'>Update</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>";
            $no++;
        }
        ?>
    </tbody>
</table>

<!-- Modal Tambah Rule -->
<div class="modal fade" id="modalRule" tabindex="-1">
  <div class="modal-dialog">
    <form method="POST">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">Tambah Rule</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="text" name="kode_rule" class="form-control mb-2" placeholder="Kode Rule (misal: R1)" required>
          <textarea name="gejala" class="form-control mb-2" placeholder="Kode Gejala (misal: G1,G9,G12)"></textarea>
          <select name="id_jurusan" class="form-control" required>
            <option value="">Pilih Jurusan</option>
            <?php
            $jurusan = mysqli_query($koneksi, "SELECT * FROM jurusan");
            while ($j = mysqli_fetch_array($jurusan)) {
                echo "<option value='{$j['id']}'>{$j['nama_jurusan']}</option>";
            }
            ?>
          </select>
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
// Simpan rule baru
if (isset($_POST['simpan'])) {
    $kode = $_POST['kode_rule'];
    $gejala = $_POST['gejala'];
    $idjur = $_POST['id_jurusan'];
    mysqli_query($koneksi, "INSERT INTO rules (kode_rule, gejala, id_jurusan) VALUES ('$kode','$gejala','$idjur')");
    echo "<script>window.location='rules.php';</script>";
}

// Update rule
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $kode = $_POST['kode_rule'];
    $gejala = $_POST['gejala'];
    $idjur = $_POST['id_jurusan'];
    mysqli_query($koneksi, "UPDATE rules SET kode_rule='$kode', gejala='$gejala', id_jurusan='$idjur' WHERE id=$id");
    echo "<script>window.location='rules.php';</script>";
}

// Hapus rule
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM rules WHERE id=$id");
    echo "<script>window.location='rules.php';</script>";
}
?>

<?php include 'footer.php'; ?>
