<?php
include 'Database/database.php';
session_start();

if (!isset($_SESSION['id_riwayat'])) {
    header("Location: Konsultasi.php");
}

$id = $_SESSION['id_riwayat'];

if (isset($_POST['lagi'])) {
    echo '<script>window.location="konsultasi.php"</script>';
}

//Metode Naive Bayes
function calc_probability($input, $nama_penyakit)
{
    $nc = [];
    $jumlah_gejala = count($GLOBALS['gejala']);
    $peluang_penyakit = 1 / count($GLOBALS['penyakit_gejala']);
    $hasil = 1;

    foreach ($input as $key => $value) {
        if (in_array($value, $GLOBALS['penyakit_gejala'][$nama_penyakit]))
            array_push($nc, 1);
        else
            array_push($nc, 0);
    }
    for ($i = 0; $i < count($nc); $i++) {
        $hasil *= ($nc[$i] + $jumlah_gejala * $peluang_penyakit) / (1 + $jumlah_gejala);
    }
    $hasil *= $peluang_penyakit;
    return $hasil;
}

if (isset($_SESSION['gejala'])) {
    $result = $connect->query("SELECT * FROM gejala");
    $list_gejala = [];
    while ($row = $result->fetch_assoc()) {
        $list_gejala[$row['id_gejala']] = $row['gejala'];
    }
    //Output berupa list semua gejala
    $GLOBALS['gejala'] = $list_gejala;

    $result = $connect->query("SELECT * FROM penyakit");
    $list_penyakit = [];
    $penyakit = [];
    while ($row = $result->fetch_assoc()) {
        $list_penyakit[$row['id_penyakit']] = $row['kriteria_penyakit'];
        $penyakit[$row['kriteria_penyakit']] = $row;
    }

    $penyakit_gejala = [];
    $total_gejala = [];
    foreach ($list_penyakit as $key => $value) {
        $result = $connect->query("SELECT gjl.* FROM basispengetahuan bsp LEFT JOIN gejala gjl ON gjl.id_gejala = bsp.id_gejala WHERE id_penyakit = '$key'");
        $list_gejala = [];
        while ($row = $result->fetch_assoc()) {
            array_push($list_gejala, $row['id_gejala']);
            if (!empty($row['id_gejala'])) {
                array_push($total_gejala, $row['id_gejala']);
            }
        }
        $penyakit_gejala[$value] = $list_gejala;
    }

    //Output berupa array gejala dari semua penyakit
    $GLOBALS['penyakit_gejala'] = $penyakit_gejala;


    $GLOBALS['input'] = [];
    for ($i = 0; $i < count($_SESSION['gejala']); $i++) {
        array_push($GLOBALS['input'], $_SESSION['gejala'][$i]);
    }

    $GLOBALS['total_gejala'] = $total_gejala;
    $GLOBALS['count_gejala'] = array_count_values($GLOBALS['total_gejala']);
    $GLOBALS['count_input'] = array_count_values($GLOBALS['input']);

    foreach ($GLOBALS['penyakit_gejala'] as $key => $value) {
        if (empty($GLOBALS['input'])) {
            $nb[$key] = 0;
        } else {
            $nb[$key] = calc_probability($GLOBALS['input'], $key);
        }
    }

    //Output nilai naive bayes semua penyakit
    // echo json_encode($nb);
    // die;

    //Mencari Nilai Max
    $temp = 0;
    $pkt = [];
    $persen = 100;
    foreach ($nb as $key => $value) {
        if ($value > $temp) {
            $temp = $value;
            $pkt = $penyakit[$key];
            //$presentase = number_format($value / array_sum($nb) * $persen, 2, '.', '.') . '%';
        }
    }
    // echo json_encode($value);
    // die;

    //Insert DB
    $kriteria = $pkt['id_penyakit'];
    $query = mysqli_query($connect, "INSERT INTO hasil(id_riwayat, id_penyakit) VALUES('$id','$kriteria')");
    session_destroy();
}
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
        <a href="Index.php" class="logo"><strong>Sispaco19</strong></a>
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
                <h1 class="title">Hasil Diagnosa</h1>
                <?php
                $query = "SELECT * FROM riwayat WHERE id_riwayat = '$id'";
                $result = mysqli_query($connect, $query);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <div class="form">
                        <table>
                            <tr>
                                <td>Tanggal</td>
                                <td>:</td>
                                <td><?= date("d-m-Y", $row['tanggal']) ?></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td><?= $row['nama'] ?></td>
                            </tr>
                            <tr>
                                <td>Umur</td>
                                <td>:</td>
                                <td><?= $row['umur'] ?></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td><?= $row['jenis_kelamin'] ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td><?= $row['alamat'] ?></td>
                            </tr>
                            <tr>
                                <td>Hasil</td>
                                <td>:</td>
                                <td><?= $pkt['kriteria_penyakit'] ?></td>
                                <!-- <td><?= $presentase ?></td> -->
                            </tr>
                            <tr>
                                <td>Deskripsi</td>
                                <td>:</td>
                                <td><?= $pkt['detail'] ?></td>
                            </tr>
                            <tr>
                                <td>Solusi</td>
                                <td>:</td>
                                <td><?= $pkt['saran'] ?></td>
                            </tr>
                        </table>
                    <?php
                }
                    ?>
                    <form action="#" method="POST">
                        <button type="submit" name="lagi" class="btn">Konsultasi Lagi</button>
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