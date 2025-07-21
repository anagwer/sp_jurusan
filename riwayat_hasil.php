<?php include 'koneksi.php'; ?>
<?php include 'navbar.php'; ?>


<div class="container mt-5">
    <h3 class="mb-4 text-primary"><i class="fas fa-history"></i> Riwayat Hasil Deteksi Jurusan</h3>

    <div class="table-responsive shadow-sm border rounded">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Tingkat Kecocokan</th>
                    <th>Deskripsi</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $hasil = mysqli_query($koneksi, "SELECT * FROM hasil_deteksi ORDER BY tanggal DESC");
                $no = 1;
                while ($row = mysqli_fetch_assoc($hasil)) {
                    // Badge warna berdasarkan tingkat kecocokan
                    $tingkat = $row['tingkat_kecocokan'];
                    if ($tingkat >= 80) {
                        $badge = 'success';
                    } elseif ($tingkat >= 50) {
                        $badge = 'warning';
                    } else {
                        $badge = 'danger';
                    }

                    echo "<tr>
                            <td>{$no}</td>
                            <td>{$row['nama']}</td>
                            <td>{$row['jurusan']}</td>
                            <td><span class='badge bg-$badge'>{$tingkat}%</span></td>
                            <td>{$row['deskripsi']}</td>
                            <td>" . date('d-m-Y H:i', strtotime($row['tanggal'])) . "</td>
                          </tr>";
                    $no++;
                }

                if ($no === 1) {
                    echo "<tr><td colspan='6' class='text-center text-muted'>Belum ada data hasil deteksi.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'footer.php'; ?>
</body>
</html>
