<?php 

switch($_GET['page']){

	case "modify":
		$id = $_GET['id'];
		
		if( !isset( $_POST['modifyPage'] ) ){
			$Main->add( $Nigma->modifyPage($id) );
		}
		else{
			$pageID		= $_POST['pageID'];
			$pageTitle 	= $_POST['pageTitle'];
			$pageLink  	= $_POST['pageLinkTitle'];
			$content	= $_POST['pageContent'];
			
			//$fields = array("pageTitle", "pageLinkTitle", "pageContent");
			//$values = array($pageTitle, $pageLink, $content);
			
			//$DB->insertInto("page", $fields, $values);

			
			
			$sql  = 'UPDATE page ';
			$sql .= 'SET pageTitle = "'.$pageTitle.'", pageLinkTitle = "'.$pageLink.'", pageContent = "'.$content.'" ';
			$sql .= 'WHERE pageID = "'.$pageID.'"';
			
			
			$DB->executeQuery($sql);
			
			
			$Main->add( $Nigma->modifyPage(1) );	
		}
	break;
	
	case "create":
		if( !isset( $_POST['createPage'] ) ){
			$Main->add( $Nigma->createPage() );
		}
		else{			
			$pageTitle 	= $_POST['pageTitle'];
			$pageLink  	= $_POST['pageLinkTitle'];
			$content	= $_POST['pageContent'];
			
			$field = array("pageTitle", "pageLinkTitle", "pageContent");
			$value = array($pageTitle, $pageLink, $content);
			
			$error = '';
			
			$test = $DB->checkForDupes("page", "pageTitle", $pageTitle);
			
			if($test < 1){
				$error = 'That is a Duplicate entry, please try another value.';
			}
			else{
				$error = 'Success!!';
				$DB->insertInto("page", $field, $value);
			}
			
			$Main->add( $Nigma->createPage($error) );		
		}		
	
	break;	
	
	case "delete":
		$Nigma->deletePage();
		
	
	
	break;
	
	
	default:
		$Main->add('<h2>Page Management Interface:</h2>');
		$Main->add( $Nigma->drawInterface() );
		
		

	
	break;

	

}




?>