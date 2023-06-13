<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/bioskop/baza/Konekcija.php';
include $_SERVER['DOCUMENT_ROOT'].'/bioskop/model/Korisnik.php';

class KorisnikKontroler{

    //Polje koje oznacava PDO konekciju
    public $pdo;
    //Konstruktor za konekciju
    public function __construct()
    {
        //Inicijalizacija konekcije
        $this->pdo = Konekcija::getInstance();
    }
    //Kreiranje korisnika
    public function kreiraj_korinsika($username, $password, $ime, $prezime){

        $query = $this->pdo->prepare('INSERT INTO baza_filmova.korisnik(korisnik.username, korisnik.password, korisnik.ime, korisnik.prezime) VALUES (?, ?, ?, ?)');
        $query->bindParam(1, $username);
        $query->bindParam(2, $password);
        $query->bindParam(3, $ime);
        $query->bindParam(4, $prezime);

        $query->execute();
    }

    //Vracanje korisnika sa odredjenim ID-jem
    public  function vrati_korisnika($korisnik_id){
        $statement = $this->pdo->prepare('SELECT * FROM baza_filmova.korisnik WHERE korisnik.korisnik_id = ?');

        $statement->bindParam(1, $korisnik_id);
        $statement->execute();

        //Vraca objekat Korisnik
        return  $statement->fetch(PDO::FETCH_OBJ);
    }

    public function vrati_sve_korisnike(){
        $query =$this->pdo->query("SELECT * FROM baza_filmova.korisnik");
        $query->execute();
        //Vraca asocijativni niz korisnika
        return	$results = $query->fetchAll(PDO::FETCH_ASSOC);
    }
    //Azuriranje korisnika
    public  function izmeni_korisnika($korisnik_id)
    {
        //Vraca podatke iz forme
        $username = $_POST['username'];
        $password = $_POST['password'];
        $ime = $_POST['ime'];
        $prezime = $_POST['prezime'];

        $query = $this->pdo->prepare('UPDATE baza_filmova.korisnik SET korisnik.username = ?, korisnik.password = ?, korisnik.ime = ?, korisnik.prezime = ? WHERE korisnik.korisnik_id = ?');
       
        //Povezujem parametre 
        $query->bindParam(1, $username);
        $query->bindParam(2, $password);
        $query->bindParam(3, $ime);
        $query->bindParam(4, $prezime);
        $query->bindParam(5, $korisnik_id);
        $query->execute();
    }
    //Brisanje filma
    public  function obrisi_korisnika($korisnik_id)
    {
        $query = $this->pdo->prepare('DELETE FROM baza_filmova.korisnik WHERE korisnik.korisnik_id = ?');
        $query->bindParam(1, $korisnik_id);
        $query->execute();
    }
}
