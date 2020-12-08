<html>
<head>
    <title>printlookup - Votre comparateur d'imprimante</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>

<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark w-100 m-0 mb-4">
    <a class="navbar-brand" href="index.php">Printlookup - Comparateur d'imprimantes</a>
    </nav>
</header>

<?php
include 'database.php';
$database = new Database();
$printers=$database->getAllPrinters();
$bestresolution=$database->getBestResolution();
$bestSpeed=$database->getBestSpeeds();
$expensive=$database->getMostExpensive();
$cheap=$database->getCheapest();
echo'<main>
    <h4 class="mb-3 ml-5" onclick="toogleHideShow">Les meilleures ventes : (5 meilleures ventes sur 3 ans)</h4>
    <h4 class="mb-3 ml-5" onclick="toogleHideShow"><button onclick="toogleHideShow()">10 meillleures imprimantes selon leurs vitesse d\'impression :</button></h4>
    <div class="mb-4 ml-5" id="toggle" >
    '; foreach($bestSpeed as $printer){echo $printer['priBrand'].' '.$printer['priModel'] .'<em> Vitesse d\'impression : </em>'.$printer['priSpeed'].'<br>';} echo'
    </div>
    <h4 class="mb-3 ml-5"><button onclick="toogleHideShow()">Les 5 imprimantes à plus haute résolution</button></h4>
    <div class="mb-4 ml-5" id="toggle">
    '; foreach($bestresolution as $printer){echo $printer['priBrand'].' '.$printer['priModel'] .'<br>';} echo'
    </div>
    <h4 class="mb-3 ml-5">Les trois imprimantes les plus chères du marché</h4>
    <div class="mb-4 ml-5">
    '; foreach($expensive as $printer){echo $printer['priBrand'].' '.$printer['priModel'] .'<br>';} echo'
    </div>
    <h4 class="mb-3 ml-5">Les trois imprimantes les moins chères du marché</h4>
    <div class="mb-5 ml-5">
     '; foreach($cheap as $printer){echo $printer['priBrand'].' '.$printer['priModel'] .'<br>';} echo'
    </div>
    <h4 class="mb-3 ml-5">Tableau des imprimantes :</h4>
    <table class="table table-striped m-auto" style="width:95%;">
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
            ';
            foreach ($printers as $printer){
                echo ' <tr>
                <td>'.$printer['priBrand'].'</td>
                <td>'.$printer['priModel'].'</td>
                <td>'.$printer['priTechnology'].'</td>
                <td>'.$printer['priSpeed'].' PPM</td>
                <td>'.$printer['priCapacity'].' feuilles</td>
                <td>'.$printer['priWeight'].'KG</td>
                <td>'.$printer['priResolution'].'PPI</td>
                <td>'.$printer['priHeight'].' x '.$printer['priWidth'].' x '.$printer['priDepth'].'</td>
                <td>'.$printer['priPrice'].'chf</td>
            </tr>';}'
           
        </tbody>
    </table>
</main>';
?>
</body>


</html>

<script>
    function toogleHideShow(){
        var x = document.getElementById("toggle");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
    </script>