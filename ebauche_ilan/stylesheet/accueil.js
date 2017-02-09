init();

function init() {
  $(".description").css("display", "none");
};

$('.wrapper li').on('click', function(){
  $('.wrapper li').toggleClass('plier');
	$(this).toggleClass('active');
});

$(".wrapper li").on("click", function() {
		$(".description").slideUp(400, function() {
		    $(".description").css("display", "bnone");
		}); 
	});

$(".wrapper li").on("click", function() {
  	$(".active .description").slideDown(400, function() {
  		$(".active .description").css("display", "block");
  	});	  
});
