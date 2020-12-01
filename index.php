<html>
<head>
    <title>printlookup - Votre comparateur d'imprimante</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>

<body>
<header>
   <div class="jumbotron jumbotron-fluid">
       <h1 class="display-1">printlookup - Comparateur d'imprimantes</h1>
   </div>
</header>


</body>
<?php
include 'database.php';
$database = new Database();

echo'<main>
    <h1>Les meilleures ventes : (5 meilleures ventes sur 3 ans)</h1><br>
    <h1>10 meillleures imprimantes selon leurs vitesse d\'impression :</h1><br>
    <h1>Les 5 imprimantes à plus haute résolution</h1><br>
    <h1>Les trois imprimantes les plus chères du marché</h1><br>
    <h1>Les trois imprimantes les moins chères du marché</h1><br><br>
    <h1>Tableau des imprimantes :</h1><br>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Marque</th>
            <th scope="col">Modèle</th>
            <th scope="col">Technologie</th>
            <th scope="col">Vitesse</th>
            <th scope="col">Capacité papier</th>
            <th scope="col">Poids</th>
            <th scope="col">Résolution</th>
            <th scope="col">Dimensions</th>
            <th scope="col">Prix</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>'.$database->getOnePrinter(1)[0]['priBrand'].'</td>
                <td>'.$database->getOnePrinter(1)[0]['priModel'].'</td>
                <td>'.$database->getOnePrinter(1)[0]['priTechnology'].'</td>
                <td>'.$database->getOnePrinter(1)[0]['priSpeed'].' PPM</td>
                <td>'.$database->getOnePrinter(1)[0]['priCapacity'].' feuilles</td>
                <td>'.$database->getOnePrinter(1)[0]['priWeight'].'KG</td>
                <td>'.$database->getOnePrinter(1)[0]['priResolution'].'PPI</td>
                <td>'.$database->getOnePrinter(1)[0]['priHeight'].' x '.$database->getOnePrinter(1)[0]['priWidth'].' x '.$database->getOnePrinter(1)[0]['priDepth'].'</td>
                <td>'.$database->getOnePrinter(1)[0]['priPrice'].'chf</td>
            </tr>
        </tbody>
    </table>
</main>';
?>

</body>


</html>