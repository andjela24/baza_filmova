<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/bioskop/baza/Konekcija.php';

class Zanr{
    //Sva polja su privatna
    private $zanr_id;
    private $naziv;

    //Getteri i setter
    function set_zanr_id($zanr_id) {
        $this->zanr_id = $zanr_id;
      }
      function get_zanr_id() {
        return $this->zanr_id;
      }
      function set_naziv($naziv) {
        $this->naziv = $naziv;
      }
      function get_naziv() {
        return $this->naziv;
      }
}