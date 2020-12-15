<?php

/**
 * ETML
 * Auteur: Toine R., Simon G., Elias V., Vitor P., Pierre M.
 * Date: 1.12.2020
 * Description: Page config.php du projet imprimante
 */

include 'config.php';

class Database
{


// Variable de classe
    private $connector;

    /**
     * fonction construct qui sert à se connecter à la database
     */
    public function __construct()
    {
        $user = $GLOBALS['MM_CONFIG']['database']['username'];
        $pass = $GLOBALS['MM_CONFIG']['database']['password'];
        $dbname = $GLOBALS['MM_CONFIG']['database']['dbname'];
        $host = $GLOBALS['MM_CONFIG']['database']['host'];
        $port = $GLOBALS['MM_CONFIG']['database']['port'];
        $charset = $GLOBALS['MM_CONFIG']['database']['charset'];

        try {
            $this->connector = new PDO(
                'mysql:host=' . $host . ';port=' . $port . ';dbname=' . $dbname . ";charset=" . $charset, $user, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
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
    private function queryPrepareExecute($query, $binds)
    {
        $req = $this->connector->prepare($query);

        if ($binds != null) {
            foreach ($binds as $bind) {
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
    public function formatData($req)
    {

        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * cette function sert à vider le jeu d'enregistrement
     *
     * @param [string] $req
     * @return void
     */
    private function unsetData($req)
    {

        $req->closeCursor();
    }

    /**
     * afficher toutes les imprimantes du site internet
     */
    public function getAllPrinters()
    {

        // TODO: avoir la requête sql
        $query = "SELECT * FROM t_printer ";
        $req = $this->queryPrepareExecute($query, null);

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
    public function getOnePrinter($id)
    {

        $query = "SELECT * FROM t_printer where idPrinter = " . $id . " ";

        $req = $this->queryPrepareExecute($query, null);
        $result = $this->formatData($req);
        return $result;

    }

    /**
     * Récupère les meilleures ventes d'imprimantes (n'affiche que le nombre d'imprimantes désiré)
     * @param [int] $nb
     */
    public function getBestSales($nb)
    {
        $query = "SELECT t_printer.priBrand, t_printer.priModel, COUNT(buy.idPrinter) AS 'ventes' FROM buy INNER JOIN t_printer ON buy.idPrinter = t_printer.idPrinter GROUP BY buy.idPrinter ORDER BY COUNT(buy.idPrinter) DESC LIMIT $nb";
        $req = $this->queryPrepareExecute($query, null);
        $result = $this->formatData($req);
        return $result;
    }

    public function getBestSpeeds()
    {
        $query = "SELECT * FROM t_printer ORDER BY t_printer.priSpeed DESC LIMIT 10";
        $req = $this->queryPrepareExecute($query, null);
        $result = $this->formatData($req);
        return $result;
    }

    public function getBestResolution()
    {
        $query = "SELECT * FROM t_printer WHERE 1 ORDER BY t_printer.priResolution DESC LIMIT 5";
        $req = $this->queryPrepareExecute($query, null);
        $result = $this->formatData($req);
        return $result;
    }

    public function getMostExpensive()
    {
        $query = "SELECT * FROM t_printer GROUP BY priPrice DESC LIMIT 3";
        $req = $this->queryPrepareExecute($query, null);
        $result = $this->formatData($req);
        return $result;
    }

    public function getCheapest()
    {
        $query = "SELECT * FROM t_printer GROUP BY priPrice ASC LIMIT 3";
        $req = $this->queryPrepareExecute($query, null);
        $result = $this->formatData($req);
        return $result;
    }

    /**
     * Compte le nombre de fois qu'une imprimante a été achetée
     * * @param [int] $id
     */
    public function getOnePrinterSales($id)
    {
        $query = "SELECT COUNT(idClient) FROM buy WHERE idPrinter = $id";
        $req = $this->queryPrepareExecute($query, null);
        $result = $this->formatData($req);
        return $result;
    }

    /**
     * Récupère les Imprimantes vendues (combien et lesquels)
     */
    public function getAllPrintersSales()
    {
        $query = "SELECT t_printer.priBrand, t_printer.priModel, COUNT(buy.idPrinter) FROM buy INNER JOIN t_printer ON buy.idPrinter = t_printer.idPrinter GROUP BY buy.idPrinter";
        $req = $this->queryPrepareExecute($query, null);
        $result = $this->formatData($req);
        return $result;
    }

      /**
     * Récupère les Imprimantes vendues (combien et lesquels)
     */
    public function getClientsbyPrinterSale($id)
    {
        $query = "SELECT t_client.cliFirstName,t_client.cliLastName FROM t_client INNER JOIN buy ON buy.idClient = t_client.idClient WHERE buy.idPrinter = $id";
        $req = $this->queryPrepareExecute($query, null);
        $result = $this->formatData($req);
        return $result;
    }


}

?>