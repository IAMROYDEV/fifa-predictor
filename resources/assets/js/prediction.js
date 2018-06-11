window.load=function(){
	require(['jquery'],function($){
		$(document).ready(function() {
			alert(2);
			console.log( "ready!" );
		   $('.prediction-form input').change(function() {
		                alert('santosh fodo');
			}); 
		});
	})
}