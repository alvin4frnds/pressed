jQuery(document).ready(function(){

	
	$('.content-area .owl-carousel').owlCarousel({
	    'items': 1,
		'autoPlay': true,
		'loop': true,
		'nav': true,
		'pagination': true,
		'dots': true,
		'navText': ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>']
	});
});