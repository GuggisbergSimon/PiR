
<?php

  /**
     * ETML
     * Auteur: Toine R., Simon G., Elias V., Vitor P., Pierre M.
     * Date: 1.12.2020
     * Description: Page config.php du projet imprimante
     */

include 'config.php';

class Database {


// Variable de classe
private $connector;

/**
 * fonction construct qui sert à se connecter à la database
 */
public function __construct(){
    $user = $GLOBALS['MM_CONFIG']['database']['username'];
    $pass = $GLOBALS['MM_CONFIG']['database']['password'];
    $dbname = $GLOBALS['MM_CONFIG']['database']['dbname'];
    $host = $GLOBALS['MM_CONFIG']['database']['host'];
    $port = $GLOBALS['MM_CONFIG']['database']['port'];
    $charset = $GLOBALS['MM_CONFIG']['database']['charset'];

    try {
        $this->connector = new PDO(
            'mysql:host=' . $host . ';port=' . $port . ';dbname=' . $dbname . ";charset=" . $charset, $user, $pass,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (exception $e) {
        echo "Connexion à la base de donnée impossible veuillez réessayer plus tard";
    }
    //$this->connector = new PDO('mysql:host=localhost;dbname=db_nickname_toiriedo;charset=utf8' , 'dbNicknameUser', '.etml-');

}



/**
 * function qui préprare la query a être traité
 * 
 * on utilise binds pour rendre la requête sécurisé
 * 
 * @param [string] $query
 * @param [string] $binds
 * @return $req
 */
private function queryPrepareExecute($query, $binds){
    $req = $this->connector->prepare($query);
    
    if($binds != null)
    {                
        foreach($binds as $bind){
            $req->bindValue($bind['marker'], $bind['var'], $bind['type']);
        }
    };
      
    $req->execute();

    return $req;
    
}

/**
 * fonction formatData qui sert à formater les données
 * retourner result qui est donc formater pour de la lisibilité
 *
 * @param [string] $req
 * @return $result 
 */
public function formatData($req){

    $result =  $req->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

/**
 * cette function sert à vider le jeu d'enregistrement
 *
 * @param [string] $req
 * @return void
 */
private function unsetData($req){

    $req->closeCursor();
}

/**
 * afficher toutes les imprimantes du site internet
 */
public function getAllPrinters(){

    // TODO: avoir la requête sql
    $query = "SELECT * FROM t_printer ";
    $req = $this->queryPrepareExecute($query, null );
    
    $result = $this->formatData($req);
    $this->unsetData($req);
    return $result;
    // TODO: appeler la méthode pour executer la requête
    // TODO: appeler la méthode pour avoir le résultat sous forme de tableau
    // TODO: retour tous les enseignants

}

/**
 * TODO: à compléter
 */
public function getOnePrinter($id){

    $query = "SELECT * FROM t_printer where idPrinter = ".$id." ";
    
    $req = $this->queryPrepareExecute($query, null );
    $result = $this->formatData($req);
    return $result;

}

public function getBestSales(){

}

public function getBestSpeeds(){

}

public function getBestResolution(){

}

public function getMostExpensive(){

}

public function getCheapest(){

}

// + tous les autres méthodes dont vous aurez besoin pour la suite (insertTeacher ... etc)
}


?>