$(document).ready(function(){
	$('.modal').modal();
});
$('.dropdown-trigger').dropdown();
$(document).ready(function(){
	$('.collapsible').collapsible();
});
$(document).ready(function(){
	$('#demo-carousel-content').carousel();
	setInterval(function() {
		$('#demo-carousel-content').carousel('next');
	}, 5000);   
});
$(document).ready(function(){
	$('.materialboxed').materialbox();
});