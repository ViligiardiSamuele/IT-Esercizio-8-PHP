<?php

session_start();

echo '
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT-Esercizio-8-PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body data-bs-theme="dark">
<div class="card position-absolute top-50 start-50 translate-middle rounded p-1 sfumatura-1 w-25"
    style="min-width:350px">
    <div class="card-body bg-dark rounded">
';

//controllo sessione inializzata
$error_msg = '';
if (!isset($_SESSION['temperature'])) {
    $error_msg = '<h1>Errore sessione</h1>';
} else {

    //temperatura maggiore
    $temp_maggiore = $_SESSION['temperature'][array_key_first($_SESSION['temperature'])][0];
    foreach ($_SESSION['temperature'] as $stazione => $array_temp)
        foreach ($array_temp as $temp)
            if ($temp_maggiore < $temp)
                $temp_maggiore = $temp;

    //temperature media
    $temp_media = 0;
    $temp_count = 0;
    foreach ($_SESSION['temperature'] as $stazione => $array_temp)
        foreach ($array_temp as $temp) {
            $temp_media += $temp;
            $temp_count++;
        }
    $temp_media = $temp_media / $temp_count;
}

//Stampa
if ($error_msg != '') {
    echo $error_msg;
} else {
    echo
    '<ul class="list-group list-group-flush">
        <li class="list-group-item">Temperatura più alta: ' . $temp_maggiore . '°</li>
        <li class="list-group-item">Temperatura media: ' . $temp_media . '°</li>
    </ul>';
}
echo '<a class="btn btn-primary" href="index.php" role="button">Inserisci un\'altra temperatura</a>';

echo '
        </div>
    </div>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous">
    </script>
    </body>
</html>
';
