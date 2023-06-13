<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/bioskop/baza/Konekcija.php';

class Korisnik{
    //Sva polja su privatna
    private $korisnik_id;
    private $username;
    private $password;
    private $ime;
    private $prezime;

    //Getteri i setteri
    function set_korisnik_id($korisnik_id) {
        $this->korisnik_id = $korisnik_id;
      }
      function get_korisnik_id() {
        return $this->korisnik_id;
      }

      function set_username($username) {
        $this->username = $username;
      }
      function get_username() {
        return $this->username;
      }

      function set_password($password) {
        $this->password = $password;
      }
      function get_password() {
        return $this->password;
      }

      function set_ime($ime) {
        $this->ime = $ime;
      }
      function get_ime() {
        return $this->ime;
      }

      function set_prezime($prezime) {
        $this->prezime = $prezime;
      }
      function get_prezime() {
        return $this->prezime;
      }
}
