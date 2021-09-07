<?php
require 'vendor/autoload.php';
require 'bootstrap.php';
use Durcevic\Ontologija;
use Composer\Autoload\ClassLoader;

Flight::route('/', function () {

  $foaf = \EasyRdf\Graph::newAndLoad('https://oziz.ffos.hr/nastava20202021/mdurcevic_20/ontologija/durcevic_rdf/mdurcevic.rdf');
  $info = $foaf->dump();
  echo "<h2>Ontologija za projekt iz P3:</h2> <br/><br/>" . $info;
});

Flight::route('GET /search', function () {

  $doctrineBootstrap = Flight::entityManager();
  $em = $doctrineBootstrap->getEntityManager();
  $repozitorij = $em->getRepository('Durcevic\Ontologija');
  $zapisi = $repozitorij->findAll();
  echo $doctrineBootstrap->getJson($zapisi);
});


Flight::route(
  'GET /fill_table', function () {

    $foaf = \EasyRdf\Graph::newAndLoad('https://oziz.ffos.hr/nastava20202021/mdurcevic_20/ontologija/durcevic_rdf/mdurcevic.rdf');

    foreach ($foaf->resources() as $resource) {

      //if($foaf->get($resource, 'rdf:type') != ''){
        $i = 0;
        // $url = parse_url($foaf->get($resource, '<http://oziz.ffos.hr/isvalina/ontologija-mcu#Film>'));
        // $film = str_replace('_', ' ', $url["fragment"]);
        $naziv = ''.$foaf->get($resource, '<http://oziz.ffos.hr/mdurcevic/ontologija-rock#imaNaslov>');

        //$url = parse_url($foaf->get($resource, '<http://oziz.ffos.hr/isvalina/ontologija-mcu#imaGlumce>'));
        //$glumac = str_replace('#', ' ', $url["fragment"]);

        $izvodac = ''.$foaf->get($resource, '<http://oziz.ffos.hr/mdurcevic/ontologija-rock#imaIzvodaca>');
        
        $rockZanr = ''.$foaf->get($resource, '<http://oziz.ffos.hr/mdurcevic/ontologija-rock#RockZanr>');
        $drzava = ''.$foaf->get($resource, '<http://oziz.ffos.hr/mdurcevic/ontologija-rock#dolaziIz>');
        //$godina = ''.$foaf->get($resource, '<http://oziz.ffos.hr/mdurcevic/ontologija-rock#godinaIzlaska>');
        $brojPjesama = ''.$foaf->get($resource, '<http://oziz.ffos.hr/mdurcevic/ontologija-rock#BrojPjesama>');



        $ontologija = new Ontologija();
        $ontologija->setPodaci(Flight::request()->data);

        $ontologija->setNaziv($naziv);
        $ontologija->setIzvodac($izvodac);
        $ontologija->setRockZanr($rockZanr);
        $ontologija->setDrzava($drzava);
        //$ontologija->setGodina($godina);
        $ontologija->setBrojPjesama($brojPjesama);


        $doctrineBootstrap = Flight::entityManager();
        $em = $doctrineBootstrap->getEntityManager();
  
        $em->persist($ontologija);
        $em->flush();
        //}
      }

      echo "Ma tooo!";

});

Flight::route('GET /search/@naziv', function($naziv){

  $doctrineBootstrap = Flight::entityManager();
  $em = $doctrineBootstrap->getEntityManager();
  $repozitorij=$em->getRepository('Durcevic\Ontologija');
  $zapisi = $repozitorij->createQueryBuilder('p')
                        ->where('p.naziv LIKE :naziv')
                        ->setParameter('naziv', '%'.$naziv.'%')
                        ->getQuery()
                        ->getResult();
  echo $doctrineBootstrap->getJson($zapisi);

});


$cl = new ClassLoader('Durcevic', __DIR__, '/src');
$cl->register();
require_once 'bootstrap.php';
Flight::register('entityManager', 'DoctrineBootstrap');

Flight::start();
?>