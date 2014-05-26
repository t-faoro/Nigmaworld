// JavaScript Document

$(document).ready (function () {

	//$( "textarea#editor1" ).CKEDITOR();

	


	$(function() {
    	$( "#sortable" ).sortable();
    	$( "#sortable" ).disableSelection();
  	});
	
	$(function() {
    $( 'img.icon' ).tooltip({
      position: {
        my: "center bottom-20",
        at: "center top",
        using: function( position, feedback ) {
          $( this ).css( position );
          $( "<div>" )
            .addClass( "arrow" )
            .addClass( feedback.vertical )
            .addClass( feedback.horizontal )
            .appendTo( this );
        }
      }
    });
  });

});

