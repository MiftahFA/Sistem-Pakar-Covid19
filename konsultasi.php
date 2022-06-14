<?php
include 'Database/database.php';
session_start();

// if (isset($_POST['selanjutnya'])) {
//     $id_riwayat = uniqid();
//     $tanggal = time();
//     $nama = $_POST['nama'];
//     $umur = $_POST['umur'];
//     $jk = $_POST['jk'];
//     $alamat = $_POST['alamat'];
//     $_SESSION['id_riwayat'] = $id_riwayat;

//     $query = mysqli_query($connect, "INSERT INTO riwayat(id_riwayat, tanggal, nama, umur, jenis_kelamin, alamat) 
//     VALUES('$id_riwayat','$tanggal','$nama','$umur', '$jk', '$alamat')");

//     if ($query) {
//         header("Location: diagnosa.php");
//     } else {
//         header("Location: konsultasi.php");
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pakar Covid-19</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ba4cedfa5d.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="Assets/Js/Main.js"></script>
    <link rel="stylesheet" href="Assets/Css/Indexstyle.css">
</head>

<body>
    <header>
        <a href="index.php" class="logo"><strong>Sispaco19</strong></a>
        <div id="menu" class="fas fa-bars"></div>
        <nav class="navbar">
            <ul>
                <li><a href="index.php">Beranda</a></li>
                <li><a href="konsultasi.php" class="active">Konsultasi</a></li>
                <li><a href="datacovid.php">Data Covid-19</a></li>
                <li><a href="tentangkami.php">Tentang Kami</a></li>
                <li><a href="masuk.php">Masuk</a></li>
            </ul>
        </nav>
    </header>

    <section class="consultation">
        <div class="box-container">
            <div class="box">
                <h1 class="title">Form Konsultasi</h1>
                <div class="form">
                    <form action="proseskonsultasi.php" method="post">
                        <div class="inputfield">
                            <label>Nama Lengkap</label>
                            <input type="text" class="input" name="nama" required>
                        </div>
                        <div class="inputfield">
                            <label>Umur</label>
                            <input type="number" class="input" name="umur" required>
                        </div>
                        <div class="inputfield">
                            <label>Jenis Kelamin</label>
                            <div class="custom_select">
                                <select name="jk" required>
                                    <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="inputfield">
                            <label>Alamat</label>
                            <textarea class="textarea" name="alamat"></textarea>
                        </div>
                        <button type="submit" name="selanjutnya" class="btn">Selanjutnya</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="footer">
        <h1 class="credit">Copyright &copy; Miftah FA <script>
                document.write(new Date().getFullYear());
            </script>
        </h1>
    </section>

</body>

</html>