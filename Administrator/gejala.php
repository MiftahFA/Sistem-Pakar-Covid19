<?php
session_start();
include '../Database/database.php';
if (!isset($_SESSION['username'])) {
    header("Location: ../masuk.php");
}

$no = mysqli_query($connect, "SELECT id_gejala FROM gejala ORDER BY id_gejala DESC");
$id_gejala = mysqli_fetch_array($no);

if ($id_gejala > 0) {
    $kode = $id_gejala['id_gejala'];
} else {
    $kode = "G00";
}

$urut = substr($kode, 1, 2);
$tambah = (int) $urut + 1;

if (strlen($tambah) == 1) {
    $format = "G" . "0" . $tambah;
} else {
    $format = "G" . $tambah;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pakar | Gejala</title>

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
    <div class="container-fluid">
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
            <!-- <div class="cardBox">

            </div> -->

            <div class="details-2">
                <div class="datatable">
                    <div class="cardHeader">
                        <h2>Data Gejala</h2>
                        <button class="btn" onclick="tambah();"><i class="fas fa-plus-circle"></i> Tambah Gejala</button>
                    </div>
                    <br>
                    <table id="data" class="stripe">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Gejala</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM gejala ORDER BY id_gejala ASC";
                            $result = mysqli_query($connect, $query);
                            $cnt = 1;
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <tr>
                                    <td><?= $cnt; ?>.</td>
                                    <td><?= $row['gejala']; ?></td>
                                    <td>
                                        <a href="#" id="edit" data-id='<?= $row['id_gejala'] ?>' class="edit"><i class="fas fa-pen" data-toggle="tooltip" title="Edit"></i></a>
                                        <a href="#" id="hapus" data-id='<?= $row['id_gejala'] ?>' class="hapus"><i class="fas fa-trash" data-toggle="tooltip" title="Hapus"></i></a>
                                    </td>
                                </tr>
                            <?php
                                $cnt = $cnt + 1;
                            } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Gejala</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <!-- The Modal -->
            <div id="tambahModal" class="modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <span class="close" onclick="closeModal();">&times;</span>
                        <h2>Tambah Gejala</h2>
                    </div>
                    <form action="gejala/prosestambah.php" method="post" id="tambahForm">
                        <div class="modal-body">
                            <div class="data">
                                <input type="hidden" name="nomer" value="<?= $format ?>">
                                <label for="">Gejala</label>
                                <input type="text" class="" name="gejala" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="submit" class="btn">Tambah Gejala</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- The Modal -->
            <div id="hapusModal" class="modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <span onclick="closeModal();" class="close">&times;</span>
                        <h2>Hapus Gejala</h2>
                    </div>
                    <form action="gejala/proseshapus.php" method="POST" id="hapusForm">
                        <div class="modal-body">
                            <div class="data">
                                <input type="hidden" id="id_hapus" name="id_hapus">
                                <p>Apakah Anda yakin ingin menghapus gejala ini?</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="hapus" class="btn">Hapus Gejala</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- The Modal -->
            <div id="editModal" class="modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <span onclick="closeModal();" class="close">&times;</span>
                        <h2>Edit Gejala</h2>
                    </div>
                    <form action="gejala/prosesedit.php" method="post" id="editForm">
                        <div class="modal-body">
                            <input type="hidden" name="id_edit" id="id_edit">
                            <div class="data">
                                <label for="">Gejala</label>
                                <input type="text" id="gejala" name="gejala" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="simpan" class="btn">Simpan Perubahan</button>
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

        var tambahmodal = document.getElementById("tambahModal");
        var hapusmodal = document.getElementById('hapusModal');

        function tambah() {
            document.getElementById('tambahModal').style.display = 'block';
        }

        $(document).ready(function() {
            $('.hapus').click(function() {
                var id = $(this).data('id');
                document.getElementById('hapusModal').style.display = 'block';
                $('#id_hapus').attr('value', id);
            });
        });

        $(document).ready(function() {
            $('.edit').click(function() {
                var id = $(this).data('id');
                $.ajax({
                    url: 'editgejala.php',
                    type: 'POST',
                    data: {
                        id: id
                    },
                    dataType: 'JSON',
                    success: function(response) {
                        $('#id_edit').val(response.id_gejala);
                        $('#gejala').val(response.gejala);
                        document.getElementById('editModal').style.display = 'block';
                    }
                });
            });
        });

        function closeModal() {
            document.getElementById('hapusModal').style.display = 'none';
            document.getElementById('tambahModal').style.display = 'none';
            document.getElementById('editModal').style.display = 'none';
            document.getElementById('tambahForm').reset();
            document.getElementById('hapusForm').reset();
            document.getElementById('editForm').reset();
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