package ffos.p3.ontologija;

import java.io.Serializable;

public class Ontologija implements Serializable {

    public Ontologija() {
        this.sifra = sifra;
        this.naziv = naziv;
        this.izvodac = izvodac;
        this.rockZanr = rockZanr;
        this.drzava = drzava;
        //this.godina = godina;
        this.brojPjesama = brojPjesama;

    }

    private int sifra;
    private String naziv;
    private String izvodac;
    private String rockZanr;
    private String drzava;
    //private String godina;
    private String brojPjesama;

    public int getSifra() {
        return sifra;
    }

    public void setSifra(int sifra) {
        this.sifra = sifra;
    }

    public String getNaziv() {
        return naziv;
    }

    public void setNaziv(String naziv) {
        this.naziv = naziv;
    }

    public String getIzvodac() {
        return izvodac;
    }

    public void setIzvodac(String izvodac) {
        this.izvodac = izvodac;
    }

    public String getRockZanr() {
        return rockZanr;
    }

    public void setRockZanr(String rockZanr) {
        this.rockZanr = rockZanr;
    }

    public String getDrzava() {
        return drzava;
    }

    public void setDrzava(String drzava) {
        this.drzava = drzava;
    }

    public String getBrojPjesama() {
        return brojPjesama;
    }

    public void setBrojPjesama(String brojPjesama) {
        this.brojPjesama = brojPjesama;
    }
}
