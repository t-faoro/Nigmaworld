<?php 

switch($_GET['page']){
	case "gallery":
	$Main->add('<a href="index.php?page=upload">Upload More</a><br /><br />');
	$Main->add( $File->drawGallery( "Tommy" ) );
	
/*	$Main->add("<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />");*/
	//$Main->add( $File->drawGallery( "George" ) );
	break;
	
	case "upload":
		$Main->add('<a href="index.php?page=gallery">See Gallery</a><br /><br />');
		
		$Main->add( $File->uploadProcess() );
		
	
	break;
	
	case "ckeditor":
/*		$Main->add('<form>');	
		$Main->add('<label>CKEditor Test</label>');	
		$Main->add('<textarea class="ckeditor" name="editor1"></textarea>');
		$Main->add('</form>');*/
	
	break;
	
	default:
/*		$Main->add('<a href="index.php?page=upload">Upload</a><br /><br />');
		$Main->add('<a href="index.php?page=gallery">Gallery</a>');*/
/*		$Main->add('<form>');	
		$Main->add('<label>CKEditor Test</label>');	
		$Main->add('<textarea class="ckeditor" name="editor1"></textarea>');
		$Main->add('</form>');*/
		
		$Main->add( $Nigma->modifyPage(1) );
	
	break;

	

}




?>