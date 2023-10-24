<?php
session_start();
//session_destroy();

//recupero / inizializzo "tempereture"
if (!isset($_SESSION["temperature"]))
    $_SESSION["temperature"] = array();

/** Struttura:
 * $_SESSION['temperature'] => array_associativo(stazione => array(n,n+1,...))
 */

//controllo variabili $_POST
$error_msg = '';
if (!isset($_POST['stazione']) || !isset($_POST['temperatura'])) {
    $error_msg = '<h1>Errore input</h1>';
} else {
    //controllo esistenza della stazione
    if (!array_key_exists($_POST['stazione'], $_SESSION["temperature"])) {
        //inserisco la nuova stazione con un' array associato
        $_SESSION["temperature"] = array_merge($_SESSION["temperature"], [$_POST['stazione'] => array()]);
    }
    //aggiunta del valore
    array_push($_SESSION["temperature"][$_POST['stazione']], $_POST['temperatura']);
}
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
if ($error_msg != '')
    echo $error_msg;
else {
    echo '<ul class="list-group list-group-flush">';
    foreach ($_SESSION["temperature"] as $stazione => $array_temp)
        foreach ($array_temp as $temp)
            echo ' <li class="list-group-item">' . $stazione . ' ' . $temp . '°</li>'; //stampa
    echo '</ul>';
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
