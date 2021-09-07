<?php

namespace Durcevic;

/**
 * @Entity @Table(name="ontologija")
 **/


class Ontologija 

{
    /** @id @Column(type="integer") @GeneratedValue **/
    protected $sifra;

    /**
    * @Column(type="string")
    */
    private $naziv;

     /**
    * @Column(type="string")
    */
    private $izvodac;

     /**
    * @Column(type="string")
    */
    private $rockZanr;

     /**
    * @Column(type="string")
    */
    private $drzava;

     /**
    * @Column(type="integer")
    */
    //private $godina;

    /**
    * @Column(type="string")
    */
    private $brojPjesama;

    public function getSifra(){
      return $this->sifra;
    }
  
    public function setSifra($sifra){
      $this->sifra = $sifra;
    }
  
    public function getNaziv(){
      return $this->naziv;
    }
  
    public function setNaziv($naziv){
      $this->naziv = $naziv;
    }
  
    public function getIzvodac(){
      return $this->izvodac;
    }
  
    public function setIzvodac($izvodac){
      $this->izvodac = $izvodac;
    }
  
    public function getRockZanr(){
      return $this->rockZanr;
    }
  
    public function setRockZanr($rockZanr){
      $this->rockZanr = $rockZanr;
    }
  
    public function getDrzava(){
      return $this->drzava;
    }
  
    public function setDrzava($drzava){
      $this->drzava = $drzava;
    }
  
    //public function getGodina(){
      //return $this->godina;
    //}
  
    //public function setGodina($godina){
      //$this->godina = $godina;
    //}
  
    public function getBrojPjesama(){
      return $this->brojPjesama;
    }
  
    public function setBrojPjesama($brojPjesama){
      $this->brojPjesama = $brojPjesama;
    }
    public function setPodaci($podaci)
    {
      foreach($podaci as $kljuc => $vrijednost){
        $this->{$kljuc} = $vrijednost;
      }
    }

}

?>