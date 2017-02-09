init();

function init() {
  $("#signin-button").css("border-bottom", "3px solid black");
  $("#signin-form").css("display", "block");
}

$("#signin-button").on("click", function() {
  $(this).css("border-bottom", "3px solid black");
  $("#signup-button").css("border-bottom", "3px solid white");
  
  	$("#signup-form").slideUp(400, function() {
	    $("#signup-form").css("display", "none");
	  });
    $("#signin-form").slideDown(400, function() {
    $(this).css("display", "block");
  });
});

$("#signup-button").on("click", function() {
  $(this).css("border-bottom", "3px solid black");
  $("#signin-button").css("border-bottom", "3px solid white");

	$("#signin-form").slideUp(400, function() {
	    $("#signin-form").css("display", "none");
	  });
  $("#signup-form").slideDown(400, function() {
    $(this).css("display", "block");
  });

});