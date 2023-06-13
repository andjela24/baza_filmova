<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/bioskop/baza/Konekcija.php';

class Film{
    //Sva polja su privatna
    private $film_id;
    private $naslov;
    private $godina;
    private $dodato_at;
    private $zanr_id;

    //Getteri i setteri
  function set_film_id($film_id) {
    $this->film_id = $film_id;
  }
  function get_film_id() {
    return $this->film_id;
  }

  function set_naslov($naslov) {
    $this->naslov = $naslov;
  }
  function get_naslov() {
    return $this->naslov;
  }

  function set_godina($godina) {
    $this->godina = $godina;
  }
  function get_godina() {
    return $this->godina;
  }

  function set_dodato_at($dodato_at) {
    $this->dodato_at = $dodato_at;
  }
  function get_dodato_at() {
    return $this->dodato_at;
  }

  function set_zanr_id($zanr_id) {
    $this->zanr_id = $zanr_id;
  }
  function get_zanr_id() {
    return $this->zanr_id;
  }
}