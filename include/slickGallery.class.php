<?php 

class SlickGallery extends Database{
	
	public $albumName;
	public $gallery;
	public $photo = array();
	public $duplicate;
	
	private $link;
	private $id;	


	//:: Constructor for Gallery
	public function __construct($name){
		$this->albumName = $name;
	}
	
	//:: Displays all gallery's
	public function getAlbums(){
				
		$sql  = "SELECT * ";
		$sql .= "FROM album ";
		
		
		$query = Database::executeQuery($sql);
		
		
		$markUp  = '<div id="gallery">';
		
		while($album = mysqli_fetch_array($query)){
			
			$albumID = $this->getAlbumId($album['Album_Name']);
			
			$markUp .= '<div id="galleryContainer">';
			$markUp .= '<div class="albumTitle">'.$album['Album_Name'].'</div>';
			$markUp .= '<div class="thumbnail"><a href="index.php?page='.$this->albumName.'&action=viewAlbum&id='.$albumID.'"><img class="thumbnail" src="'. IMG . 'photoGallery.png" /></a></div>';
			$markUp .= '<div class="noDecoration">'.$this->getToolBox($albumID).'</div>';
			$markUp .= '</div>';

		}
		 
		$markUp .= '</div>';
		
		return $markUp;
		
		
	}
	
	//:: Creates the Form to create an Album
	public function createAlbumForm(){
		
		$markUp  = '<form method="POST" action="index.php?page='.$this->albumName.'&action=addAlbum">';
		$markUp .= '<label>Album Name</label>'."<br />";
		$markUp .= '<input type="text" name="album" />'."<br />";
		$markUp .= '<br />';
		$markUp .= '<label>Album Description</label>'.'<br />';
		$markUp .= '<textarea name="description"></textarea>'.'<br />';
		$markUp .= '<input type="submit" name="createAlbum" value="Create Album" />';
		$markUp .= '</form>';
		
		return $markUp;
	}

	//:: Creates the Album in the database.
	public function createAlbum($title, $description){
							
			$album = Database::sanitize($title);
			$description = Database::sanitize($description);	
				
				if(strlen($description) <= 0){
		
					Database::insertInto("album", array("Album_Name"), array($album) );
				}
				else{	
					
					Database::insertInto("album", array("Album_Name", "Album_Description"), array($album, $description) );
		
				}

	}
	
	//:: Retrieves the Album ID from the Database from the Album Name.

	private function getAlbumId($albumName) {
		$sql = "SELECT gal_Field_ID ";
		$sql .= "FROM album ";
		$sql .= 'WHERE Album_Name = "' . $albumName . '"';
	
		$query = Database::executeQuery($sql);
		while ($album = mysqli_fetch_array($query)) {
	
			$id = $album['gal_Field_ID'];

		}
		return $id;
	}

	//:: Displays the "Toolbox" on the "Manage Gallery Page"
	private function getToolBox($id){
		$markUp  = '<div class="toolbox noDecoration">';
		$markUp .= '<a href="index.php?page='.$this->albumName.'&action=viewAlbum&id='.$id.'"><img class="icon" src="'. IMG . 'viewIcon.png" /></a>';
		$markUp .= '<a href="index.php?page='.$this->albumName.'&action=modifyAlbum&id='.$id.'"><img class="icon" src="'. IMG . 'editIcon.png" /></a>';
		$markUp .= '<a href="index.php?page='.$this->albumName.'&action=deleteAlbum&id='.$id.'"><img class="icon" src="'. IMG . 'deleteIcon.png" /></a>';
		$markUp .= '</div>';
		
		return $markUp;
	}
	
	/**
	 * Checks the database for duplicates of the current entry. This method is relatively abstract so it can be used
	 * with other functions in other programs.
	 * @author Tylor Faoro
	 * 
	 * 
	 * @param String $table The EXACT table name from the database
	 * @param String $fieldName the EXACT field name from the database
	 * @param String $desiredName The user desired name of an album
	 * 
	 * @return Integer Returns the value 1 or 0. 1 meaning the entry is unique; 0 a duplicate entry is present. 
	 */
	public function checkForDupes($table, $fieldName, $desiredName){
				
			$sql  = 'SELECT * ';
			$sql .= 'FROM '.$table.' ';
			$sql .= 'WHERE '.$fieldName.' = "'.$desiredName.'"';
			

			$check = Database::executeQuery($sql);

			// If 1 is returned: No Duplicates are present
			// If 0 is returned: There is a Duplicate entry in the database.
			if(mysqli_num_rows($check) == 0){
				return 1;
			}
			else{
				return 0;
			} 	
	}
	

}



?>