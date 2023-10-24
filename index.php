<?php
include('stazioni.php');

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
    <div class="card position-absolute top-50 start-50 translate-middle rounded p-1 sfumatura-1 w-25" style="min-width:350px">
        <div class="card-body bg-dark rounded">';
/*Form*/
echo '
    <form action="raccolta.php" method="POST">
    <div class="container">
        <div class="row mb-1">
            <div class="col text-end">
                <span class="align-middle">Stazione</span>
            </div>
            <div class="col">
                <select required class="form-select" name="stazione">
                    <option default></option>';
foreach ($STAZIONI as $staz)
    echo '<option value="' . $staz . '">' . $staz . '</option>';
echo '</select>
            </div>
        </div>
        <div class="row mb-1">
            <div class="col text-end">
                <span class="align-middle">Temperatura</span>
            </div>
            <div class="col">
                <input required name="temperatura" type="number" class="form-control" placeholder="Celsius"></input>
            </div>
        </div>
        <div class="row mt-1">
            <div class="btn-group">
                <button type="submit" class="btn btn-primary">Invia</button>
                <a href="riepilogo.php" class="btn btn-primary">Riepilogo</a>
        </div>
        </div>
    </div>
    </form>
';
echo '
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
';
