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
		$pageTitle 		= $values['pageTitle'];
		$pageLinkTitle 	= $values['pageLinkTitle'];
		$pageContent 	= $values['pageContent'];
	}	
	
	$markUp  = '<form method="POST" id="enigmaPageForm">';
	$markUp .= '<input type="hidden" name="pageID" value="'.$pageID.'" />';
	
	$markUp .= '<label for="pageTitle">Page Title:</label>';
	$markUp .= '<input type="text" name="pageTitle" value="'.$pageTitle.'" />';
	$markUp .= '<label for="pageTitle">Page Link Title:</label>';
	$markUp .= '<input type="text" name="pageLinkTitle" value="'.$pageLinkTitle.'"/>';
	//$markUp .= '<label for="pageTitle">Page Content:</label>';
	$markUp .= '<textarea class="ckeditor" name="pageContent">'.$pageContent.'</textarea>';
	
	$markUp .= '<input name="modifyPage" type="submit" />';
	$markUp .= '<input type="button" value="Cancel" onClick="window.location.href=\'index.php\'">';
	
	$markUp .= '</form>';
	
	
	return $markUp;	
	
}

public function createPage($message = NULL){
	
	$markUp  = '<div class="error"><span>'.$message.'</span></div>';
	$markUp .= '<form method="POST" id="enigmaPageForm">';
	$markUp .= '<label for="pageTitle">Page Title:</label>';
	$markUp .= '<input type="text" name="pageTitle" />';
	$markUp .= '<label for="pageTitle">Page Link Title:</label>';
	$markUp .= '<input type="text" name="pageLinkTitle" />';
	//$markUp .= '<label for="pageTitle">Page Content:</label>';
	$markUp .= '<textarea class="ckeditor" name="pageContent"></textarea>';
	
	$markUp .= '<input name="createPage" type="submit" />';
	$markUp .= '<input type="button" value="Cancel" onClick="window.location.href=\'index.php\'">';
	
	$markUp .= '</form>';
	
	return $markUp;
}

public function deletePage(){
	$id = $_GET['id'];
	
	$this->delete("page", "pageID", $id);
	$this->redirectToPage();
	

}

public function redirectToPage($destination = NULL){
	if($destination == NULL){
		header( 'Location: index.php' ) ;
	}
	else{
		header('location: '.$destination.'');
	}

}

public function drawInterface(){
	
	
	$sql = 'SELECT * ';
	$sql .= 'FROM page ';
	
	$query = $this->executeQuery($sql);
	$id = $this->getPageId($value['pageTitle']);
	
	$markUp  = '<div id="interfaceBlock">';
	$markUp .= '<div class="newPage"><a href="index.php?page=create" alt="New Page" title="Create a new page for your site."><img class="icon" src="'. IMG . 'newIcon.png" /></a></div>';
	$markUp .= '<div class="pageStage">';
	$markUp .= '<ul id="sortable">';
	//$markUp .= '<th>ID:</th>';
	//$markUp .= '<th>Page:</th>';
	//$markUp .= '<th>Link Title</th>';
	//$markUp .= '<th>Toolbox:</th>';
	//$markUp .= '</tr>';
	foreach($query as $value){		
		$id2 = $this->getPageId($value['pageTitle']);
		//$markUp .= '<tr>';
		$markUp .= '<li class="ui-state-default"><span>'.$value['pageTitle'].'</span><span class="toolbox">'.$this->getPageToolBox($id2).'</span></li>';
		//$markUp .= '<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 2</li>';
		//$markUp .= '<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 3</li>';
		//$markUp .= '<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 4</li>';
		//$markUp .= '<td>'.$value['pageID'].'</td>';
		//$markUp .= '<td>'.$value['pageTitle'].'</td>';
		//$markUp .= '<td>'.$value['pageLinkTitle'].'</td>';
		//$markUp .= '<td>'.$this->getPageToolBox($id2).'</td>';
		//$markUp .= '</tr>';
	}
	//$markUp .= '</table>';
	$markUp .= '</ul>';	
	
	$markUp .= '</div>';

	$markUp .= '</div>';
	
	return $markUp;
	
}


public function getPageToolBox($id){
	$markUp  = '<div class="toolbox noDecoration">';
	$markUp .= '<a href="index.php?page=modify&id='.$id.'" title="Make changes to this page."><img class="icon" src="'. IMG . 'editIcon.png" /></a>';
	$markUp .= '<a href="index.php?page=delete&id='.$id.'" title="Delete this page. *WARNING* Deletion is PERMANENT."><img class="icon" src="'. IMG . 'deleteIcon.png" /></a>';
	$markUp .= '</div>';
		
	return $markUp;
}

public function getPageId($pageTitle) {
	$sql = "SELECT pageID ";
	$sql .= "FROM page ";
	$sql .= 'WHERE pageTitle = "' . $pageTitle . '"';
	
	$query = Database::executeQuery($sql);
	while ($page = mysqli_fetch_array($query)) {
	
		$id = $page['pageID'];

	}
	return $id;
}




}


?>