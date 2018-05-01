var current=0;
$(document).ready(function(){
  $(this).scroll(function(){
    var scroll = ($(this).scrollTop());
    if(scroll>250){
      $('nav').removeClass('static'); 
    }else $('nav').addClass('static');
  });
  $("#aktivitas").click(function() {
    $.ajax({
      type: "GET",
      url: "../aktivitas.html",
      headers: {
        "Content-Type": "plain/text"
      },
      success: function(res) {
        $(".activity").html(res);
      },
      error: function(err) {
        console.log(err);
      }
    });
  });
  var children = $('.content-area').children().length;
  $('.content-area').children().each(function(index, val){
    current+=$(val).outerHeight();
  });
  $('.content-area').css('height',children>3?(current/3):300);
})