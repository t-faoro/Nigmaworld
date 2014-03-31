<?php 

class Testimonial{

	function __construct(){
	
	}
	
	public function createTestimonialForm(){
		$markUp  = '<form action="#" method="POST" enctype="multipart/form-data" id="testimonialForm"> ';
		$markUp .= '<label for="name">Name:</label>';
		$markUp .= '<input type="text" name="name" />';
		$markUp .= '<label for="testimonial">Testimonial:</label>';
		$markUp .= '<textarea name="testimonial"></textarea>';
		$markUp .= '<label for="testimonialImg">Testimonial Image: </label>';
		$markUp .= '<input type="file" name="testimonialImg" />';
		$markUp .= '<br /><br />';
		$markUp .= '<input type="submit" name="submit" />';
		$markUp .= '</form>';
		
		return $markUp;
	
	}

}



?>