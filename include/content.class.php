<?php 

class Content{
	public $content;	
	public $id;
	public $class = null;
	public $blockContent = array();
	
	
	function __construct($id){
		$this->id = $id;	
	}
	
	public function buildBlock(){
		$data = "";
			
		if(is_array($this->blockContent)){
				
			foreach($this->blockContent as $value){
				$data .= $value;
			}
			
			
		}	
			
		$content = "\n".'<div id="'.$this->id.'">';
		$content .= $data;
		$content .= '</div>'."\n";
		
		return $content;		
	}
	
	public function add($content){
		$this->blockContent[] .= $content;
	}
}

?>