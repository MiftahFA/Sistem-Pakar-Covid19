<?php
session_start();
include '../Database/database.php';
if (!isset($_SESSION['username'])) {
    header("Location: ../masuk.php");
}

if (isset($_POST['hapus'])) {
    $id_hapus = $_POST['id_hapus'];
    $query = mysqli_query($connect, "DELETE a.*, b.* FROM riwayat a JOIN hasil b ON a.id_riwayat = b.id_riwayat WHERE a.id_riwayat='$id_hapus'");
    if ($query) {
        $_SESSION['berhasil'] = "Riwayat Berhasil Dihapus";
    } else {
        $_SESSION['gagal'] = "Riwayat Gagal Dihapus";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pakar | Beranda</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/ba4cedfa5d.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <link rel="stylesheet" href="../Assets/Css/style.css">
</head>

<body>
    <div class="container-fluid" id="blur">
        <div class="navigation">
            <ul>
                <li>
                    <a href="index.php">
                        <span class="icon"></span>
                        <span class="title">
                            <h1>Sispaco-19</h1>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="index.php">
                        <span class="icon"><i class="fas fa-tachometer-alt"></i></span>
                        <span class="title">Beranda</span>
                    </a>
                </li>
                <li>
                    <a href="penyakit.php">
                        <span class="icon"><i class="fas fa-virus"></i></span>
                        <span class="title">Data Kriteria Covid-19</span>
                    </a>
                </li>
                <li>
                    <a href="gejala.php">
                        <span class="icon"><i class="fas fa-head-side-cough"></i></span>
                        <span class="title">Data Gejala</span>
                    </a>
                </li>
                <li>
                    <a href="basispengetahuan.php">
                        <span class="icon"><i class="fas fa-memory"></i></span>
                        <span class="title">Basis Pengetahuan</span>
                    </a>
                </li>
                <li>
                    <a href="keluar.php">
                        <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                        <span class="title">Keluar</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="main">
            <div class="topbar">
                <div class="toggle" onclick="toggleMenu();"></div>
                <div class="user">
                    <img src="../Assets/Images/user.jpg" alt="Unsika">
                </div>
            </div>

            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">
                            <?php
                            $query = mysqli_query($connect, "SELECT COUNT(DISTINCT riwayat.id_riwayat) AS total FROM riwayat INNER JOIN hasil ON riwayat.id_riwayat = hasil.id_riwayat");
                            $data = mysqli_fetch_array($query);
                            echo $data['total'];
                            ?>
                        </div>
                        <div class="cardName">Diagnosa</div>
                    </div>
                    <div class="iconBox"><i class="fas fa-diagnoses"></i></div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">
                            <?php
                            $query = mysqli_query($connect, "SELECT COUNT(*) AS total FROM penyakit");
                            $data = mysqli_fetch_array($query);
                            echo $data['total'];
                            ?>
                        </div>
                        <div class="cardName">Data Kriteria Covid-19</div>
                    </div>
                    <div class="iconBox"><i class="fas fa-virus"></i></div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">
                            <?php
                            $query = mysqli_query($connect, "SELECT COUNT(*) AS total FROM gejala");
                            $data = mysqli_fetch_array($query);
                            echo $data['total'];
                            ?>
                        </div>
                        <div class="cardName">Data Gejala</div>
                    </div>
                    <div class="iconBox"><i class="fas fa-head-side-cough"></i></div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">
                            <?php
                            $query = mysqli_query($connect, "SELECT COUNT(*) AS total FROM basispengetahuan");
                            $data = mysqli_fetch_array($query);
                            echo $data['total'];
                            ?>
                        </div>
                        <div class="cardName">Basis Pengetahuan</div>
                    </div>
                    <div class="iconBox"><i class="fas fa-memory"></i></div>
                </div>
            </div>

            <?php
            if (isset($_SESSION['berhasil'])) {
            ?>
                <div id="flash" class="alert hide">
                    <span class="fas fa-check-circle"></span>
                    <span class="msg"><?= $_SESSION['berhasil'] ?></span>
                    <div class="close-btn">
                        <span class="fas fa-times"></span>
                    </div>
                </div>
            <?php
                unset($_SESSION['berhasil']);
            } elseif (isset($_SESSION['gagal'])) {
            ?>
                <div id="flash" class="alert hide" style="border-left:5px solid #fe4557; background: #ffe1e3">
                    <span class="fas fa-times-circle"></span>
                    <span class="msg" style="color: #f84858"><?= $_SESSION['gagal'] ?></span>
                    <div class="close-btn" style="background: #ffa3ad" onmouseover="this.style.background='#ff99a4'" onmouseout="this.style.background='#ffa3ad'">
                        <span class="fas fa-times" style="color: #f84858"></span>
                    </div>
                </div>
            <?php
                unset($_SESSION['gagal']);
            }
            ?>
            <div class="details">
                <div class="datatable">
                    <div class="cardHeader">
                        <h2>Riwayat Konsultasi</h2>
                    </div>
                    <br>
                    <table id="data" class="stripe">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tanggal</th>
                                <th>Nama</th>
                                <th>Hasil</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT DISTINCT riwayat.id_riwayat, riwayat.tanggal, riwayat.nama, penyakit.kriteria_penyakit FROM riwayat 
                            INNER JOIN hasil ON riwayat.id_riwayat = hasil.id_riwayat 
                            INNER JOIN penyakit ON penyakit.id_penyakit = hasil.id_penyakit ORDER BY tanggal DESC;";
                            $result = mysqli_query($connect, $query);
                            $cnt = 1;
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <tr>
                                    <td><?= $cnt; ?>.</td>
                                    <td><?= date("d-m-Y", $row['tanggal']) ?></td>
                                    <td><?= $row['nama']; ?></td>
                                    <td><?= $row['kriteria_penyakit']; ?></td>
                                    <td>
                                        <a href="#" id="detail" data-id='<?= $row['id_riwayat'] ?>' class="detail"><i class="fas fa-info" data-toggle="tooltip" title="Detail"></i></a>
                                        <a href="#" id="hapus" data-id='<?= $row['id_riwayat'] ?>' class="hapus"><i class="fas fa-trash" data-toggle="tooltip" title="Hapus"></i></a>
                                    </td>
                                </tr>
                            <?php
                                $cnt = $cnt + 1;
                            } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Tanggal</th>
                                <th>Nama</th>
                                <th>Hasil</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <!-- The Modal -->
            <div id="detailModal" class="modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <span onclick="closeModal();" class="close">&times;</span>
                        <h2>Data Pengguna</h2>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id_detail" id="id_detail">
                        <table>
                            <tr>
                                <td style="width:25%">Tanggal</td>
                                <td>:</td>
                                <td id="tanggal"></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td id="nama"></td>
                            </tr>
                            <tr>
                                <td>Umur</td>
                                <td>:</td>
                                <td id="umur"></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td id="jenis_kelamin"></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td id="alamat"></td>
                            </tr>
                            <tr>
                                <td>Hasil</td>
                                <td>:</td>
                                <td id="hasil"></td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="closeModal();" name="tutup" class="btn">Tutup</button>
                    </div>
                </div>
            </div>

            <!-- The Modal -->
            <div id="hapusModal" class="modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <span onclick="closeModal();" class="close">&times;</span>
                        <h2>Hapus Riwayat</h2>
                    </div>
                    <form action="" method="POST" id="hapusForm">
                        <div class="modal-body">
                            <div class="data">
                                <input type="hidden" id="id_hapus" name="id_hapus">
                                <p>Apakah Anda yakin ingin menghapus riwayat ini?</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="hapus" class="btn">Hapus Riwayat</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <script>
        function toggleMenu() {
            let toggle1 = document.querySelector('.toggle');
            let navigation = document.querySelector('.navigation');
            let main = document.querySelector('.main');
            toggle1.classList.toggle('active');
            navigation.classList.toggle('active');
            main.classList.toggle('active');
        }

        $(document).ready(function() {
            $('#data').DataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json"
                },
                "searching": true
            });
        });

        var detailmodal = document.getElementById('detailModal');
        var hapusmodal = document.getElementById('hapusModal');

        $(document).ready(function() {
            $('.hapus').click(function() {
                var id = $(this).data('id');
                document.getElementById('hapusModal').style.display = 'block';
                $('#id_hapus').attr('value', id);
            });
        });

        $(document).ready(function() {
            $('.detail').click(function() {
                var id = $(this).data('id');
                $.ajax({
                    url: 'detail.php',
                    type: 'POST',
                    data: {
                        id: id
                    },
                    dataType: 'JSON',
                    success: function(response) {
                        $('#id_detail').val(response.id_riwayat);
                        let a = response.tanggal;
                        var date = new Date(a * 1000);
                        $('#tanggal').text(date.getDate() + '-' + (date.getMonth() + 1) + '-' + date.getFullYear());
                        $('#nama').text(response.nama);
                        $('#umur').text(response.umur);
                        $('#jenis_kelamin').text(response.jenis_kelamin);
                        $('#alamat').text(response.alamat);
                        $('#hasil').text(response.kriteria_penyakit);
                        document.getElementById('detailModal').style.display = 'block';
                    }
                });
            });
        });

        function closeModal() {
            document.getElementById('hapusModal').style.display = 'none';
            document.getElementById('detailModal').style.display = 'none';
            document.getElementById('hapusForm').reset();
        }

        $(document).ready(function() {
            $('.alert').addClass("show");
            $('.alert').removeClass("hide");
            $('.alert').addClass("showAlert");
            setTimeout(function() {
                $('.alert').removeClass("show");
                $('.alert').addClass("hide");
            }, 3000);
            setTimeout(function() {
                $('.alert').removeClass("showAlert");
                document.getElementById('flash').style.display = 'none';
            }, 4000);
        });
        $('.close-btn').click(function() {
            $('.alert').removeClass("show");
            $('.alert').addClass("hide");
            setTimeout(function() {
                $('.alert').removeClass("showAlert");
                document.getElementById('flash').style.display = 'none';
            }, 4000);
        });
    </script>
</body>

</html>