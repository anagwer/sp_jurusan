<?php include 'koneksi.php'; ?>
<?php include 'navbar.php'; ?>

<style>
    .form-check {
        transition: 0.3s;
    }

    .form-check:hover {
        background-color: #e8f0ff;
        border-left: 5px solid #0d6efd;
    }

    .hasil-box {
        border: 3px dashed #0d6efd;
        border-radius: 10px;
        background: #f0f8ff;
        padding: 30px;
        margin-top: 30px;
    }

    .hasil-box h1 {
        font-size: 48px;
        color: #0d6efd;
    }

    .hasil-box p {
        font-size: 18px;
        color: #333;
    }

    .lead {
        font-style: italic;
    }

    .btn-primary {
        background: linear-gradient(to right, #0d6efd, #0056b3);
        border: none;
    }

    .btn-primary:hover {
        background: #004bb5;
    }
</style>

<div class="container mt-4">
    <h3 class="mb-4 text-primary"><i class="fas fa-search"></i> Deteksi Jurusan Berdasarkan Minat dan Bakat</h3>

    <form method="POST">
        <div class="row">
            <?php
            $gejala = mysqli_query($koneksi, "SELECT * FROM minat_bakat");
            while ($g = mysqli_fetch_array($gejala)) {
            ?>
                <div class="col-md-6 mb-3">
                    <div class="form-check bg-white border rounded p-3 shadow-sm">
                        <input class="form-check-input me-2" type="checkbox" name="gejala[]" value="<?= $g['kode'] ?>" id="g<?= $g['id'] ?>">
                        <label class="form-check-label" for="g<?= $g['id'] ?>">
                            <strong><?= $g['kode'] ?>.</strong> <?= $g['deskripsi'] ?>
                        </label>
                    </div>
                </div>
            <?php } ?>
        </div>
        <button class="btn btn-primary mt-3 px-4 py-2" type="submit" name="proses"><i class="fas fa-magic"></i> Proses Deteksi</button>
    </form>

    <?php
    if (isset($_POST['proses'])) {
        $input_gejala = $_POST['gejala'];
        $hasil = null;
        $max_cocok = 0;
        $max_persen = 0;

        $rules = mysqli_query($koneksi, "SELECT * FROM rules");
        while ($rule = mysqli_fetch_array($rules)) {
            $rule_gejala = explode(",", str_replace(" ", "", $rule['gejala']));
            $jml_rule = count($rule_gejala);
            $jml_cocok = 0;

            foreach ($rule_gejala as $rg) {
                if (in_array($rg, $input_gejala)) {
                    $jml_cocok++;
                }
            }

            $persen = ($jml_cocok / $jml_rule) * 100;

            if ($jml_cocok > $max_cocok || ($jml_cocok == $max_cocok && $persen > $max_persen)) {
                $max_cocok = $jml_cocok;
                $max_persen = $persen;
                $hasil = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM jurusan WHERE id = " . $rule['id_jurusan']));
            }
        }

        if ($hasil) {
            echo "<div class='hasil-box text-center mb-3' id='hasil'>
                    <h4 class='mb-3 text-success'><i class='fas fa-check-circle'></i> Hasil Deteksi Jurusan Anda:</h4>
                    <h1 class='fw-bold'>{$hasil['nama_jurusan']}</h1>
                    <p class='lead'>{$hasil['deskripsi']}</p>
                    <div class='mt-3'>
                        <span class='badge bg-primary p-2'>Tingkat Kecocokan: " . round($max_persen) . "%</span>
                    </div>
                  </div>";
                  echo "<script>
    setTimeout(function() {
        document.getElementById('hasil').scrollIntoView({ behavior: 'smooth' });
    }, 300);
</script>";

        } else {
            echo "<div class='alert alert-warning mt-4 text-center'>
                    <h4 class='text-warning'><i class='fas fa-exclamation-triangle'></i> Maaf, tidak ditemukan jurusan yang cocok dengan kombinasi minat dan bakat yang dipilih.</h4>
                  </div>";
        }
    }
    ?>
</div>

<?php include 'footer.php'; ?>
