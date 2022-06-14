<?php
function get_url($url)
{
    $client = curl_init($url);
    curl_setopt($client, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($client, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($client);
    return json_decode($response);
}

//AMBIL DATA INDONESIA
$url_indo = "https://api.kawalcorona.com/indonesia/";
$result = get_url($url_indo);
$positif = 0;
$kasusaktif = 0;
$sembuh = 0;
$meninggal = 0;
if ($result[0]) {
    $positif = $result[0]->positif;
    $kasusaktif = $result[0]->dirawat;
    $sembuh = $result[0]->sembuh;
    $meninggal = $result[0]->meninggal;
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
                <li><a href="konsultasi.php">Konsultasi</a></li>
                <li><a href="datacovid.php" class="active">Data Covid-19</a></li>
                <li><a href="tentangkami.php">Tentang Kami</a></li>
                <li><a href="masuk.php">Masuk</a></li>
            </ul>
        </nav>
    </header>

    <section class="datacovid">
        <div class="box-container">
            <div class="box">
                <h1 class="title">Indonesia</h1>
                <div class="cardBox">
                    <div class="card one">
                        <div>
                            <div class="numbers">
                                <?= $positif; ?>
                            </div>
                            <div class="cardName">TERKONFIRMASI</div>
                        </div>
                        <div class="iconBox one"><i class="fas fa-plus"></i></div>
                    </div>
                    <div class="card two">
                        <div>
                            <div class="numbers">
                                <?= $kasusaktif; ?>
                            </div>
                            <div class="cardName">KASUS AKTIF</div>
                        </div>
                        <div class="iconBox two"><i class="fas fa-viruses"></i></div>
                    </div>
                    <div class="card three">
                        <div>
                            <div class="numbers">
                                <?= $sembuh; ?>
                            </div>
                            <div class="cardName">SEMBUH</div>
                        </div>
                        <div class="iconBox three"><i class="fas fa-virus-slash"></i></div>
                    </div>
                    <div class="card four">
                        <div>
                            <div class="numbers">
                                <?= $meninggal; ?>
                            </div>
                            <div class="cardName">MENINGGAL</div>
                        </div>
                        <div class="iconBox four"><i class="fas fa-minus"></i></div>
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