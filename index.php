<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

if (isset($_GET['parcheggio']) && isset($_GET['voto'])) {
    $parcheggio = $_GET['parcheggio'];
    $voto = $_GET['voto'];
} else {
    $parcheggio = 2;
    $voto = 0;
}

?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>
    <!-- Style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/style.css">

</head>

<body>
    <div class="container">
        <h1 class="text-center py-3">Tabella Hotel</h1>
        <div class="text-center py-3">
            <img class="stelle" src="./img/stelle.png" alt="stelle">
        </div>
        <!-- Form -->
        <form class="py-2" action="index.php" method="GET">
            <div class="d-flex gap-3">
                <select class="form-select" name="parcheggio">
                    <option value="2">Seleziona il parcheggio(tutti)</option>
                    <option value="1">SI</option>
                    <option value="0">NO</option>
                </select>
                <select class="form-select" name="voto">
                    <option value="0">Seleziona il voto(tutti)</option>
                    <option value="1">> 1</option>
                    <option value="2">> 2</option>
                    <option value="3">> 3</option>
                    <option value="4">> 4</option>
                    <option value="5">> 5</option>
                </select>
                <button type="submit" class="btn btn-success">INVIA</button>
            </div>
        </form>

        <table class="table table-dark table-striped table-hover">
            <thead>
                <tr class="text-center">
                    <th scope="col">N°</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Parcheggio</th>
                    <th scope="col">Voto</th>
                    <th scope="col">Distanza dal centro</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($hotels as $key => $hotel) {
                    if (($parcheggio == 2 && $voto <= $hotel['vote']) || ($parcheggio == $hotel['parking'] && $voto == 0) || ($parcheggio == $hotel['parking'] && $voto <= $hotel['vote']) || ($parcheggio == 2 && $voto == 0)) { ?>
                        <tr class="text-center">
                            <th scope="row"><?php echo $key + 1 ?></th>
                            <td><?php echo $hotel['name'] ?></td>
                            <td><?php echo $hotel['description'] ?></td>
                            <td>
                                <?php
                                if ($hotel['parking'] === true) {
                                    echo "SI";
                                } else {
                                    echo "NO";
                                }
                                ?>
                            </td>
                            <td><?php echo $hotel['vote'] ?></td>
                            <td><?php echo $hotel['distance_to_center'] ?></td>
                        </tr>
                <?php }
                } ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>