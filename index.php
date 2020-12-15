<html>
<head>
    <title>printlookup - Votre comparateur d'imprimante</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/bootstrap-table@1.18.1/dist/bootstrap-table.min.css" rel="stylesheet">

    <script src="https://unpkg.com/bootstrap-table@1.18.1/dist/bootstrap-table.min.js"></script>
</head>

<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark w-100 m-0 mb-4">
    <a class="navbar-brand" href="index.php">Printlookup - Comparateur d'imprimantes</a>
    </nav>
</header>

<<<<<<< HEAD


<div class="toolbar">
    <label>
        <input type="checkbox" id="sortable" checked/> sortable
    </label>
</div>







=======
>>>>>>> vsa
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
<<<<<<< HEAD
    <h1>Les trois imprimantes les moins chères du marché</h1><br>
     '; foreach($cheap as $printer){echo $printer['priBrand'].' '.$printer['priModel'] .'<br>';} echo'<br>
    <h1>Tableau des imprimantes :</h1><br>
    <table
        id="table"
        data-toggle="table"
        data-toolbar=".toolbar"
        data-sortable="true"
        
        >
=======
    </div>
    <h4 class="mb-3 ml-5">Les trois imprimantes les moins chères du marché</h4>
    <div class="mb-5 ml-5">
     '; foreach($cheap as $printer){echo $printer['priBrand'].' '.$printer['priModel'] .'<br>';} echo'
    </div>
    <h4 class="mb-3 ml-5">Tableau des imprimantes :</h4>
    <table class="table table-striped m-auto" style="width:95%;">
>>>>>>> vsa
        <thead>
        <tr>
            <th data-field="brand" data-sortable="true" scope="col">Marque</th>
            <th data-field="model" data-sortable="true" scope="col">Modèle</th>
            <th data-field="tech" data-sortable="true" scope="col">Technologie</th>
            <th data-field="speed" data-sortable="true" scope="col">Vitesse</th>
            <th data-field="cap" data-sortable="true" scope="col">Capacité papier</th>
            <th data-field="weight" data-sortable="true" scope="col">Poids</th>
            <th data-field="resolution" data-sortable="true" scope="col">Résolution</th>
            <th data-field="size" data-sortable="true" scope="col">Dimensions</th>
            <th data-field="price" data-sortable="true" scope="col">Prix</th>
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
            </tr>';}echo'
           
        </tbody>
    </table>
    <script>
    $(function() {
        $(\'#sortable\').change(function () {
            $(\'#table\').bootstrapTable(\'refreshOptions\', {
                sortable: $(\'#sortable\').prop(\'checked\')
            })
        })
    })
</script>

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