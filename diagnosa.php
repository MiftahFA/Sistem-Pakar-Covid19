<?php
include 'Database/database.php';
session_start();

if (!isset($_SESSION['id_riwayat'])) {
    header("Location: konsultasi.php");
}

if (isset($_POST['diagnosa'])) {
    $gejala = $_POST['gejala'];
    $_SESSION['gejala'] = $gejala;

    header("Location: hasildiagnosa.php");
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
                <h1 class="title">Form Konsultasi</h1>
                <div class="form">
                    <form action="" method="post" onSubmit="return validate()">
                        <div class="inputfield">
                            <label>Pilih Gejala yang Dialami :</label>
                        </div>
                        <?php
                        $query = "SELECT * FROM gejala ORDER BY id_gejala ASC";
                        $result = mysqli_query($connect, $query);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <div class="inputfield-2 mobile">
                                <label class="check">
                                    <input type="checkbox" name="gejala[]" value="<?= $row['id_gejala'] ?>">
                                    <span class="checkmark"></span>
                                </label>
                                <p><?= $row['gejala'] ?></p>
                            </div>
                        <?php
                        }
                        ?>
                        <button type="submit" name="diagnosa" class="btn">Diagnosa</button>
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

    <script>
        function validate() {
            var chks = document.getElementsByName('gejala[]');
            var hasChecked = false;
            for (var i = 0; i < chks.length; i++) {
                if (chks[i].checked) {
                    hasChecked = true;
                    break;
                }
            }

            if (hasChecked == false) {
                alert("Silakan pilih gejala setidaknya satu.");
                return false;
            }

            return true;
        }
    </script>
</body>

</html>