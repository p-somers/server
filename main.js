var Init = {
  init: function(){
    var border_radius = 40;
    $('#content_wrapper').css('border-top-right-radius',border_radius+'px');
    $('#content_wrapper').css('border-top-left-radius', border_radius+'px');
    
    var h_w_margin_ratio = 1;
    var width = $('#content_wrapper').position().left*h_w_margin_ratio;
    var border_width = parseInt($('#content_wrapper').css('border-left-width'));
    $('#top').height(width-30);
    console.log(border_radius+width);
    $('#top').css('margin-left',width+border_radius+'px');
    $('#top').css('font-size',width+10*h_w_margin_ratio+'px');
    
    var total_height = parseInt($('#wrapper').height());
    $('#content_wrapper').height(total_height-width);
    
    var midground  = '#DC3D24';//red
    var background = '#232B2B';//grey
    var foreground = '#232B2B';
    $('#top').css('color',midground);
    $('#content_wrapper').css('border-color',midground);
    $('#content_wrapper').css('background-color',foreground);
    $('#wrapper').css('background-color',background);
    console.log(border_width);
    Init.makeUnselectable('#top');
  },
  
  makeUnselectable: function(selector){
    $(selector).css('-webkit-touch-callout', 'none');
    $(selector).css('-webkit-user-select', 'none');
    $(selector).css('-khtml-user-select', 'none');
    $(selector).css('-moz-user-select', '-moz-none');
    $(selector).css('-ms-user-select', 'none');
    $(selector).css('user-select', 'none');
  }
}
