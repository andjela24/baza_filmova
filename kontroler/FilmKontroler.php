<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/bioskop//baza/Konekcija.php';
include $_SERVER['DOCUMENT_ROOT'] . '/bioskop/model/Film.php';

class FilmKontroler
{

    //Polje koje oznacava PDO konekciju
    public $pdo;
    //Konstruktor za konekciju
    public function __construct()
    {
        //Inicijalizacija konekcije
        $this->pdo = Konekcija::getInstance();
    }
    //Kreiranje filam
    public function kreiraj_film($naslov, $godina, $zanr_id)
    {

        $query = $this->pdo->prepare('INSERT INTO baza_filmova.film(film.naslov, film.godina, film.zanr_id) VALUES (?, ?, ?)');
        $query->bindParam(1, $naslov);
        $query->bindParam(2, $godina);
        $query->bindParam(3, $zanr_id);

        $query->execute();
    }

    //Vracanje filma sa odredjenim ID-jem
    public  function vrati_film($film_id)
    {
        $statement = $this->pdo->prepare('SELECT * FROM baza_filmova.film WHERE film.film_id = ?');

        $statement->bindParam(1, $film_id);
        $statement->execute();

        //Vraca objekat Film
        return  $statement->fetch(PDO::FETCH_OBJ);
    }

    public function vrati_sve_filmove()
    {
        $query = $this->pdo->query("SELECT * FROM baza_filmova.film");
        $query->execute();
        //Vraca asocijativni niz filmova
        return    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    }
    //Azuriranje filmova
    public  function izmeni_film($film_id)
    {
        //Vraca podatke iz forme
        $naslov = $_POST['naslov'];
        $godina = $_POST['godina'];
        //kastovan na int zbog forme koja vraca string
        $zanr_id = (int)$_POST['zanr_id'];
        var_dump($_POST);

        $query = $this->pdo->prepare('UPDATE baza_filmova.film SET film.naslov = :naslov, film.godina = :godina, film.zanr_id = :zanr_id  WHERE film.film_id = :film_id');

        //Povezujem parametre 
        $query->bindParam(':naslov', $naslov);
        $query->bindParam(':godina', $godina);
        $query->bindParam(':zanr_id', $zanr_id);
        $query->bindParam('film_id', $film_id);

        $query->execute();
    }
    //Brisanje filma
    public  function obrisi_film($film_id)
    {
        $query = $this->pdo->prepare('DELETE FROM baza_filmova.film WHERE film.film_id = ?');
        $query->bindParam(1, $film_id);
        $query->execute();
    }
}
