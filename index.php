<html>
<head>
    <title>printlookup - Votre comparateur d'imprimante</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://unpkg.com/bootstrap-table@1.18.1/dist/bootstrap-table.min.css" rel="stylesheet">


</head>

<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark w-100 m-0 mb-4">
        <a class="navbar-brand" href="index.php">Printlookup - Comparateur d'imprimantes</a>
    </nav>
</header>

<div class="toolbar">
    <label>
        <input type="checkbox" id="sortable" checked/> sortable
    </label>
</div>

<?php
include 'database.php';
$database = new Database();
$printers = $database->getAllPrinters();
$bestresolution = $database->getBestResolution();
$bestSpeed = $database->getBestSpeeds();
$expensive = $database->getMostExpensive();
$cheap = $database->getCheapest();


echo '
<main>
    <div class="container">
        <div class="card border mb-3">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn btn-smbtn " data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    Les meilleures ventes : (5 meilleures ventes sur 3 ans)
                </button>
                </h2>
            </div>
    
            <div id="collapseOne" class="collapse" aria-labelledby="headingOne">
                <div class="card-body">
                INSERT MEILLEURES VENTES 5 MEILLEURES SUR 3 ANS ICI
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="card border mb-3">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn btn-smbtn " data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseOne">
                    10 meillleures imprimantes selon leurs vitesse d\'impression :
                </button>
                </h2>
            </div>
    
            <div id="collapseTwo" class="collapse" aria-labelledby="headingOne">
                <div class="card-body">';
foreach ($bestSpeed as $printer) {
    echo $printer['priBrand'] . ' ' . $printer['priModel'] . '<em> Vitesse d\'impression : </em>' . $printer['priSpeed'] . '<br>';
}
echo '
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="card border mb-3">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn btn-smbtn " data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseOne">
                    Les 5 imprimantes à plus haute résolution :
                </button>
                </h2>
            </div>
    
            <div id="collapseThree" class="collapse" aria-labelledby="headingOne">
                <div class="card-body">';
foreach ($bestresolution as $printer) {
    echo $printer['priBrand'] . ' ' . $printer['priModel'] . '<br>';
}
echo '
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="card border mb-3">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn btn-smbtn " data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseOne">
                    Les trois imprimantes les plus chères du marché :
                </button>
                </h2>
            </div>
    
            <div id="collapseFour" class="collapse" aria-labelledby="headingOne">
                <div class="card-body">';
foreach ($expensive as $printer) {
    echo $printer['priBrand'] . ' ' . $printer['priModel'] . '<br>';
}
echo '
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="card border mb-3">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn btn-smbtn " data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseOne">
                    Les trois imprimantes les moins chères du marché :
                </button>
                </h2>
            </div>
    
            <div id="collapseFive" class="collapse" aria-labelledby="headingOne">
                <div class="card-body">';
foreach ($cheap as $printer) {
    echo $printer['priBrand'] . ' ' . $printer['priModel'] . '<br>';
}
echo '
                </div>
            </div>
        </div>
    </div>
    ';
echo '<br>
    <h1>Tableau des imprimantes :</h1><br>
  
   
    
    <table class="table table-striped m-auto" style="width:95%;" id="table"
        data-toggle="table"
        data-toolbar=".toolbar"
        data-sortable="true">
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
foreach ($printers as $printer) {
    echo ' <tr>
                <td>' . $printer['priBrand'] . '</td>
                <td>' . $printer['priModel'] . '</td>
                <td>' . $printer['priTechnology'] . '</td>
                <td>' . $printer['priSpeed'] . ' PPM</td>
                <td>' . $printer['priCapacity'] . ' feuilles</td>
                <td>' . $printer['priWeight'] . 'KG</td>
                <td>' . $printer['priResolution'] . 'PPI</td>
                <td>' . $printer['priHeight'] . ' x ' . $printer['priWidth'] . ' x ' . $printer['priDepth'] . '</td>
                <td>' . $printer['priPrice'] . 'chf</td>
            </tr>';
}
echo '
           
        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
            integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.18.1/dist/bootstrap-table.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
            crossorigin="anonymous"></script>
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
<footer>

</footer>
</body>

</html>