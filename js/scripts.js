jQuery(document).ready(function($){ // START

  // Input title
  $('input[title], textarea[title]').each(function() {if($(this).val() === '') {$(this).val($(this).attr('title'));}
    $(this).focus(function() {if($(this).val() == $(this).attr('title')) {$(this).val('').addClass('focused');}});
    $(this).blur(function() {if($(this).val() === '') {$(this).val($(this).attr('title')).removeClass('focused');}});
  });

  // Fade in and out
  $('.fade').hover(
    function() {$(this).fadeTo("medium", 1);},
    function() {$(this).fadeTo("medium", 0.5);}
  );

  // Colorbox
  $(".colorbox-cats").colorbox({rel:'colorbox-cats'});
  $(".colorbox").colorbox({rel:'colorbox'});
  $(".colorbox-video").colorbox({iframe:true, innerWidth:"80%", innerHeight:"80%"});
  $(".colorbox-iframe").colorbox({iframe:true, width:"80%", height:"80%"});

  // Fluid video
  $(".article").fitVids();

}); // END