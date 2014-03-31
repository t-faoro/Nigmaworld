<?php 

class eNigma extends Database{

public $siteName;


public function __contruct($name){
	$this->siteName = name;
}

public function modifyPage($id){	
	$pageID = $id;
	$pageTitle = '';
	$pageLinkTitle = '';
	$pageContent = '';
	
	
	$sql = 'SELECT * ';
	$sql .= 'FROM page ';
	$sql .= 'WHERE pageID = '.$id.' ';
	
	$query = $this->executeQuery($sql);
	
	foreach($query as $values){
		$pageTitle = $values['pageTitle'];
		$pageLinkTitle = $values['pageLinkTitle'];
		$pageContent = $values['pageContent'];
	}	
	
	$markUp  = '<form method="POST">';
	$markUp .= '<label>Page ID: '.$pageID.'</label><br /><br />';
	
	$markUp .= '<label for="pageTitle">Page Title:</label><br />';
	$markUp .= '<input type="text" name="pageTitle" value="'.$pageTitle.'" /><br />';
	$markUp .= '<label for="pageTitle">Page Link Title:</label><br />';
	$markUp .= '<input type="text" name="pageLinkTitle" value="'.$pageLinkTitle.'"/><br />';
	$markUp .= '<label for="pageTitle">Page Content:</label><br />';
	$markUp .= '<textarea class="ckeditor" name="pageContent">'.$pageContent.'</textarea>';
	
	$markUp .= '<input name="modifyPage" type="submit" />';
	
	$markUp .= '</form>';
	
	
	return $markUp;	
	
}

public function createPage(){
	
	$markUp  = '<form method="POST">';
	$markUp .= '<label for="pageTitle">Page Title:</label>';
	$markUp .= '<input type="text" name="pageTitle" />';
	$markUp .= '<label for="pageTitle">Page Link Title:</label>';
	$markUp .= '<input type="text" name="pageLinkTitle" />';
	$markUp .= '<label for="pageTitle">Page Content:</label>';
	$markUp .= '<textarea class="ckeditor" name="pageContent"></textarea>';
	
	$markUp .= '<input name="createPage" type="submit" />';
	
	$markUp .= '</form>';
	
	return $markUp;
}

public function deletePage($page){

}



}


?>