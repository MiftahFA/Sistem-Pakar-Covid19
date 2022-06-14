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
                <li><a href="konsultasi.php">Konsultasi</a></li>
                <li><a href="datacovid.php">Data Covid-19</a></li>
                <li><a href="tentangkami.php" class="active">Tentang Kami</a></li>
                <li><a href="masuk.php">Masuk</a></li>
            </ul>
        </nav>
    </header>

    <section class="about-us">
        <h1 class="title">Sistem Pakar Deteksi Dini Covid-19 Menggunakan Metode Naive Bayes</h1>
        <div class="row">
            <div class="image">
                <img src="Assets/Images/info.png" alt="">
            </div>
            <div class="accordion-container">
                <div class="parent-tab">
                    <input type="radio" name="tab" id="tab-1" checked>
                    <label for="tab-1">
                        <span>Tentang Sispaco19</span>
                        <div class="icon"><i class="fas fa-plus"></i></div>
                    </label>
                    <div class="content">
                        <p>Sispaco19 (Sistem Pakar Covid-19) adalah sebuah aplikasi sistem pakar
                            untuk diagnosa penyakit Covid-19 berbasis website yang bertujuan untuk
                            membantu masyarakat dalam mendeteksi dini terkait penyakit Covid-19.</p>
                    </div>
                </div>
                <div class="parent-tab">
                    <input type="radio" name="tab" id="tab-2">
                    <label for="tab-2">
                        <span>Pengembang Sispaco19</span>
                        <div class="icon"><i class="fas fa-plus"></i></div>
                    </label>
                    <div class="content">
                        <table>
                            <tbody>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td>Miftah Fariedh Andriansyah</td>
                                </tr>
                                <tr>
                                    <td>Tempat, Tanggal Lahir</td>
                                    <td>:</td>
                                    <td>19 Januari 1999</td>
                                </tr>
                                <tr>
                                    <td>Program Studi</td>
                                    <td>:</td>
                                    <td>Teknik Informatika</td>
                                </tr>
                                <tr>
                                    <td>Universitas</td>
                                    <td>:</td>
                                    <td>Universitas Singaperbangsa Karawang</td>
                                </tr>
                                <tr>
                                    <td>No. HP</td>
                                    <td>:</td>
                                    <td>081211701590</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>Miftah.fariedh17131@student.unsika.ac.id</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="parent-tab">
                    <input type="radio" name="tab" id="tab-3">
                    <label for="tab-3">
                        <span>Pakar & Pembimbing</span>
                        <div class="icon"><i class="fas fa-plus"></i></div>
                    </label>
                    <div class="content">
                        <table>
                            <tr>
                                <td>Pakar</td>
                                <td>:</td>
                                <td>Dr. Yunny Faustine</td>
                            </tr>
                            <tr>
                                <td>Pembimbing 1</td>
                                <td>:</td>
                                <td>Dadang Yudup, M.Kom.</td>
                            </tr>
                            <tr>
                                <td>Pembimbing 2</td>
                                <td>:</td>
                                <td>Apriade Voutama, M.Kom.</td>
                            </tr>
                        </table>
                    </div>
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