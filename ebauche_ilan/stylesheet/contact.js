init();

function init() {
  $("#contact-button").css("border-bottom", "3px solid black");
  $("#signin-form").css("display", "block");
}

$("#signin-button").on("click", function() {
  $(this).css("border-bottom", "3px solid black");
  $("#signup-button").css("border-bottom", "3px solid white");
  

});