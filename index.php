<?php 
//error_reporting(E_ALL);
include_once "config.php";

//$Connection = new Connection();
$DB =  new Database();
$DevSite = new Layout();
$File = new FileManager();
$Nigma = new Enigma("Test");

//$Connection->connect();

$Container = new Content("container");
$Main = new Content("main");


$Main->add("<h1>Nigmaworld Development Environment</h1>");


//$Main->add( $Testimonial->createTestimonialForm() );

$DevSite->addJS("jquery-2.0.3.min.js");
$DevSite->addJS("../ckeditor/ckeditor.js");
//$DevSite->addJS("lightbox-2.6.min.js");
//$DevSite->addJS("scrollingcarousel.2.0.js");
$DevSite->addJS("site.js");

$DevSite->addCSS("style.css");
//$DevSite->addCSS("files.css");
//$DevSite->addCSS("lightbox.css");


include "page/page.switch.php";
//$Main->add( $File->uploadProcess() );

//$Main->add("<p>Bazinga</p>");
//$Main->add( $File->uploadProcess() );
//$Main->add( $File->drawGallery( "Tommy" ) );
//$Main->add( $File->drawGallery( "George" ) );






$Container->Add($Main->buildBlock() );


echo $DevSite->setPage();
echo $DevSite->setHeader(/*TITLE*/);
echo $DevSite->openBody();

echo $Container->buildBlock();

echo $DevSite->closeBody();
echo $DevSite->endPage();

?>