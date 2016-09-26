 $(document).ready(function(){
 	$( "#greeting" ).show(10000);
 	// alert("JQuery is just fine!");

 	$("#items ul li").each(function() {
      	if($(this).index() % 2 == 0){
      		$(this).css('background', '#999999');
      	}
	});

 	$("#items").on('click','ul li', function() {
      	$(this).css('background', '#ff0000');
      	$( this ).animate({'marginLeft' : "+=50px"});
	});

	$("#view_short_code").on('click', function(){
		$('.shortcode').show(10000);
	});

 });

