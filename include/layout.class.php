<?php
/**
 * Class: Layout
 * Date: May 5, 2013
 * 
 * Purpose: To create starter layouts for PHP websites, using an Object Oriented Method
 * @author Tylor Faoro 
 * 
 */ 	
	
class Layout{

public $content = array();
public $styleSheet = array();
public $javaScript = array();
public $page = "";
public $pageTitle = TITLE;
public $head = "";
public $body = "";
	

	public function setTitle($pageTitle){
		$this->pageTitle = TITLE." ".$pageTitle;
	}


	
	/**
	 * Adds CSS into the <HEAD> of the HTML page. The stylesheets are passed as an array, so all adds will be put
	 * into the site in its appropriate spot.
	 * @author Tylor Faoro
	 * 
	 * @param mixed $style The array of Stylesheets 
	 */
	public function addCSS($style){
		$this->styleSheet[] .= $style;
		
	}
	
	/**
	 * Adds Javascript into the <HEAD> of the HTML page. The Javascripts are passed as an array, so all adds will be put
	 * into the site in its appropriate spot.
	 * @author Tylor Faoro
	 * 
	 * @param mixed $js The array of Javascript 
	 */
	public function addJS($js){
		$this->javaScript[] .= $js;
	}
	
	/**
	 * Declares the DOCTYPE and <HTML> Tag at the top of the page.
	 * @author Tylor Faoro
	 * 
	 * @param none
	 * @return String $page The HTML Markup for the front end.
	 */
	public function setPage(){
		$page  = "<!DOCTYPE html>"."\n";	
		$page .= "<HTML>"."\n";
		
		return $page;
		
	}
	
	/**
	 * Declares the <HEAD> and <TITLE> sections of the website. This method will also place the array of javascript
	 * and CSS into the HEAD where it belongs.
	 * @author Tylor Faoro
	 * 
	 * @param String $title The Site's Title, declared as a Constant in config.php
	 * @return String $head The actual <HEAD></HEAD> Information is returned to the Front End.
	 */
	public function setHeader(/*$title*/){
		$javascript = "";
		$style = "";	
			
		if(is_array($this->styleSheet)){
			foreach($this->styleSheet as $value){
				$style .= '<link rel="stylesheet" type="text/css" href="'. CSS_PATH .$value.'">'."\n";
			}
		}
		if(is_array($this->javaScript)){
			foreach($this->javaScript as $value){
				$javascript .= '<script defer src="'. JS_PATH .$value.'"></script>'."\n";
			}
		}	
				
		$head  = "<head>"."\n";
		
		$head .= '<meta http-equiv="X-UA-Compatible" content="IE=9,chrome=1">';
		$head .= '<meta charset="utf-8">';
				
		$head .= $style;
		$head .= $javascript;
		$head .= "<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>";
		$head .= "\n".'<title>'.$this->pageTitle.'</title>'."\n";		
		$head .= "\n"."</head>"."\n";
		
		return $head;
	}
	
	/**
	 * Simply places an opening <BODY> tag on the Front End.
	 * @author Tylor Faoro
	 * 
	 * @return String $body The Opening Body Tag 
	 */
	public function openBody(){
		$body = "\n"."<body>"."\n";
		$body .= '<div id="fb-root"></div>
					<script>(function(d, s, id) {
					  var js, fjs = d.getElementsByTagName(s)[0];
					  if (d.getElementById(id)) return;
					  js = d.createElement(s); js.id = id;
					  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
					  fjs.parentNode.insertBefore(js, fjs);
					}(document, "script", "facebook-jssdk"));</script>';
		$body .= '<noscript><div id="noScript"><img src="img/error.png" alt="Javascript Disabled Error" class="icon" />Elegant Weddings &amp; Events is best viewed with Javascript On. To do this, please consult your browser\'s help files. Or, visit this <a class="noScript" href="http://enable-javascript.com/" alt="How to Enable Javascript" target="_blank">website</a> for instructions.</div></noscript>';
		
		return $body;
	}
	
	/**
	 * Simply places a closing </BODY> tag on the front end.
	 * @author Tylor Faoro
	 * 
	 * @return String $body The Closing Body Tag 
	 */
	public function closeBody(){
		$body = "\n"."</body>"."\n";
		
		return $body;
	}
	
	/**
	 * Places the closing </HTML> tag at the very bottom of the page. No more information may be placed after this tag.
	 * @author Tylor Faoro
	 * 
	 * @return String $page The ending HTML Tag. 
	 */
	public function endPage(){
		$page = "\n"."</html>";
		
		return $page;
	}
	


	 
	
}

?>