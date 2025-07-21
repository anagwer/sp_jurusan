<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Sistem Pakar Jurusan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<style>
    body {
        position: relative;
        margin: 0;
        padding: 0;
    }

    body::before {
        content: "";
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('Logo_Bipa_Color.png');
        background-repeat: no-repeat;
        background-position: center center;
        background-size: 1000px; /* atau 200px sesuai kebutuhan */
        opacity: 0.08;
        z-index: -1;
    }

</style>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Sistem Pakar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="index.php"><i class="fas fa-search"></i> Deteksi Jurusan</a></li>
        <li class="nav-item"><a class="nav-link" href="jurusan.php"><i class="fas fa-graduation-cap"></i> Jurusan</a></li>
        <li class="nav-item"><a class="nav-link" href="minat_bakat.php"><i class="fas fa-lightbulb"></i> Minat/Bakat</a></li>
        <li class="nav-item"><a class="nav-link" href="rules.php"><i class="fas fa-cogs"></i> Rules</a></li>
        <li class="nav-item">
          <a class="nav-link" href="riwayat_hasil.php"><i class="fas fa-history"></i> Riwayat Hasil</a>
        </li>

      </ul>
    </div>
  </div>
</nav>
<div class="container mt-4">
