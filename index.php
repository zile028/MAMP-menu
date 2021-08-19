<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAMP SERVER</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>
<style>
.navbar {
    height: 10vh;
}
</style>



<body>

    <!-- nabar -->
    <nav class="navbar navbar-expand-lg bg-light border py-5">
        <a class="navbar-brand" href="#"><img class="w-50 display-4 font-weight-bolder" src="MAMP-PRO-Logo.png"
                alt="MAMP"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav text-light ml-auto">
                <li class="nav-item active">
                    <a class="nav-link btn btn-secondary mr-2" href="http://localhost:8888/MAMP/">Home <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-secondary"
                        href="http://localhost:8888/MAMP/phpmyadmin.php?lang=en">phpMyAmin</a>
                </li>
            </ul>
        </div>
    </nav>

    <?php

; ?>

    <section class="website container-md pb-5">
        <h1 class="display-4 text-center py-3 font-weight-bold text-info">My Websites</h1>
        <hgroup class="row bg-secondary text-light font-weight-bold">
            <div class="col-md-1 p-2 text-center">Number</div>
            <div class="col-md-7 p-2">Name</div>
            <div class="col-md-2 p-2 text-center">Date created</div>
            <div class="col-md-2 p-2 text-center">Go to</div>

        </hgroup>
        <article class="row bg-light text-dark">
            <?php

$htdocs     = $_SERVER['DOCUMENT_ROOT']; /* adresa htdocs foldera */
$directorys = scandir($htdocs);
$numberDir  = count($directorys);
$host       = $_SERVER['HTTP_HOST'];
$j          = 0;

// print_r($directorys);
for ($i = 2; $i < $numberDir; $i++) {
    $error = "";
    $class = "";
    if (is_dir($directorys[$i])) {
        if ($dh = opendir($directorys[$i])) {
            while (($file = readdir($dh)) !== false) {
                $existIndex = glob($directorys[$i] . '/index.*');
            }
            closedir($dh);
            if ("" == $existIndex[0]) {
                $error = " - U ovom folderu ne postoji index fajl!";
                $class = "alert-danger";
            }
        }
        $j++; ?>

            <div class="col-md-1 p-2 border-bottom text-center <?=$class; ?>">
                <?=$j; ?>
            </div>
            <div class="col-md-7 p-2 border-bottom <?=$class; ?>">
                <?=$directorys[$i] . $error; ?>
            </div>
            <div class="col-md-2 p-2 border-bottom text-center <?=$class; ?>">
                <?=date("d.m.Y.", filemtime($directorys[$i])); ?>
            </div>
            <div class="col-md-2 p-2 border-bottom text-center <?=$class; ?>"><a class="btn btn-success"
                    href="<?=$host . '/' . $directorys[$i]; ?>" target="_blank">OPEN</a></div>

            <?php
}
}

?>

        </article>
    </section>





    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <!-- Proper js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <!-- Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
        integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous">
    </script>

</body>

</html>