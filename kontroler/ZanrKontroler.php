<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/bioskop/baza/Konekcija.php';
include $_SERVER['DOCUMENT_ROOT'].'/bioskop/model/Zanr.php';

class ZanrKontroler{

    //Polje koje oznacava PDO konekciju
    public $pdo;
    //Konstruktor za konekciju
    public function __construct()
    {
        //Inicijalizacija konekcije
        $this->pdo = Konekcija::getInstance();
    }
    //Kreiranje zanra
    public function kreiraj_zanr($naziv){

        $query = $this->pdo->prepare('INSERT INTO baza_filmova.zanr (zanr.naziv) VALUES (?)');
        $query->bindParam(1, $naziv);

        $query->execute();
    }

    //Vracanje zanra sa odredjenim ID-jem
    public  function vrati_zanr($zanr_id){
        $statement = $this->pdo->prepare('SELECT * FROM baza_filmova.zanr WHERE zanr.zanr_id = ?');

        $statement->bindParam(1, $zanr_id);
        $statement->execute();

        //Vraca objekat Zanr
        return  $statement->fetch(PDO::FETCH_OBJ);
    }

    public function vrati_sve_zanrove(){
        $query =$this->pdo->query('SELECT * FROM baza_filmova.zanr');
        $query->execute();
        
        //Vraca asociajtivni niz
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        return $results ;
    }
    //Azuriranje zanra
    public  function izmeni_zanr($zanr_id)
    {
        //Vraca podatke iz forme
        $naziv = $_POST['naziv'];

        $query = $this->pdo->prepare('UPDATE baza_filmova.zanr SET zanr.naziv = ? WHERE zanr.zanr_id = ?');
       
        //Povezujem parametre 
        $query->bindParam(1, $naziv);
        $query->bindParam(2, $zanr_id);
        $query->execute();
    }
    //Brisanje zanra
    public  function obrisi_zanr($zanr_id)
    {
        $query = $this->pdo->prepare('DELETE FROM baza_filmova.zanr WHERE zanr.zanr_id = ?');
        $query->bindParam(1, $zanr_id);
        $query->execute();
    }
}
