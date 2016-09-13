 $(document).ready(function(){
 	$( "#greeting" ).fadeIn(5000);

 	$("#items ul li").each(function() {
      	if($(this).index() % 2 == 0){
      		$(this).css('background', '#999999');
      	}
	});

 	$("#items").on('click','ul li', function() {
      	$(this).css('background', '#ff0000');
      	$( this ).animate({'marginLeft' : "+=50px"});
	});

 });

