var Init = {
  //colors
  red : '#DC3D24',
  grey : '#232B2B',
  foreground : '#232B2B',
  dark_red : '#9E3B33',
  
  //important numbers, in pixels
  gap_width : 5,
  border_radius : 40,
  menu_item_connector_height : 5,
  h_w_margin_ratio : 1,
  login_dialog_ratio : 0.2,
  
  init: function(){
    $('#content_wrapper').css('border-top-right-radius',this.border_radius+'px');
    $('#content_wrapper').css('border-top-left-radius', this.border_radius+'px');
    
    var width = $('#content_wrapper').position().left*this.h_w_margin_ratio;
    var footer_height = parseInt($('#footer').height());
    var total_height = parseInt($('#wrapper').height());
    $('#content_wrapper').height(total_height-width-footer_height);    
    
    this.setColors();
    this.setUpHeader();
    this.setUpMenu($('#menu').width());
    this.setUpDialogs();
    this.makeUnselectable('#header');
    this.setUpFooter();
    
    $('.menu_item').on('click',function(e){Init.menuButtonClicked(e.target.id);});
  },
  setColors: function(){
    var midground  = this.red;
    var background = this.grey;
    var foreground = '#232B2B';
    var selected   = this.dark_red;
    $('#header').css('color',midground);
    $('#content_wrapper').css('border-color',midground);
    $('#content_wrapper').css('background-color',foreground);
    $('#wrapper').css('background-color',background);
    $('#footer').css('background-color',midground);
    $('#menu').css('background-color',background); 
  },
  setUpHeader: function(){
    var width = $('#content_wrapper').position().left*this.h_w_margin_ratio;
    var border_width = parseInt($('#content_wrapper').css('border-left-width'));
    $('#header').height(width-30);
    $('#header').css('margin-left',width+this.border_radius+'px');
    $('#header').css('font-size',width+10*this.h_w_margin_ratio+'px');
  },
  setUpMenu: function(menu_length){
    var num_menu_items = -1;
    num_menu_items = parseInt($('.menu_item').length);
    if( num_menu_items > 0 ){
      var item_width = parseInt((menu_length-(this.gap_width*num_menu_items+1))/num_menu_items);
      var red = this.dark_red;
      var border_radius = parseInt(this.border_radius/5)+'px';
      $('.menu_item').each(function(index){
        $(this).width(item_width);
        $(this).css('background-color',red);
        Init.makeUnselectable(this);
        if( index==0 ){
          $(this).css('border-bottom-left-radius',border_radius);
          $(this).css('border-top-left-radius',border_radius);
        }else if( index == num_menu_items-1 ){
          $(this).css('border-bottom-right-radius',border_radius);
          $(this).css('border-top-right-radius',border_radius);
        }
        if( index>0 )
          $(this).before("<div class=\"space\" style=\"display:table-cell\"></div>");
        
      });
      Init.setMenuItemGaps();
    }
  },
  setUpFooter: function(){
    var total_wrapper_width = parseInt($('#content_wrapper').width());
                            //+ parseInt($('#content_wrapper').css('border-right'))
                            //+ parseInt($('#content_wrapper').css('border-right'));
                            //Taking the borders into account isn't necessary because
                            //the padding in the footer makes up for it.
    var wrapper_border_width = parseInt($('#content_wrapper').css('border-left'));
    //console.log(total_wrapper_width);
    //console.log(2*wrapper_border_width);
    //console.log(total_wrapper_width+2*wrapper_border_width);
    $('#footer').width(total_wrapper_width);//+2*wrapper_border_width);
    $('#footer').css('padding', wrapper_border_width);
  },
  setUpDialogs: function(){
    /**
     * ui-dialog: The outer container of the dialog.
     * ui-dialog-titlebar: The title bar containing the dialog's title and close button.
     * ui-dialog-title: The container around the textual title of the dialog.
     * ui-dialog-titlebar-close: The dialog's close button.
     * ui-dialog-content: The container around the dialog's content. This is also the element the widget was instantiated with.
     * ui-dialog-buttonpane: The pane that contains the dialog's buttons. This will only be present if the buttons option is set.
     * ui-dialog-buttonset: The container around the buttons themselves.
     */
    var side_length = $(document).width()*this.login_dialog_ratio;
    var options = {
      width:side_length,
      height:'auto',//side_length/2,
      dialogClass:'login',
      closeOnEscape:true,
      modal:true,
      resizable:false
    }
    var border_width = $('#content_wrapper').css('border-top-width');
    var border_color = $('#content_wrapper').css('border-color');
    $('#login_dialog').dialog(options);
    $('#login_dialog').dialog('close');
    $('#login_dialog label').css('color',this.foreground);
    $('.ui-dialog').css('border-width',border_width);
    $('.ui-dialog').css('border-color',border_color);
    $('#login_dialog').css('background-color:',this.dark_red);
    $('.ui-dialog-titlebar-close').css('display','none');
    $(document).on("click",'.ui-widget-overlay', function(e){
      //From http://stackoverflow.com/a/15810916/1955559
      var dialogAria = $(this).next().attr('aria-describedby');        
      $('#'+dialogAria).dialog("close");
    });
  },
  setMenuItemGaps: function(){
    var spaces = $('.space');
    spaces.css('width',this.gap_width+'px');
    spaces.html("<div class=\"connector\"></div>");
    
    var connectors = $('.connector');//the little lines between menu items
    connectors.width('100%');
    connectors.height(this.menu_item_connector_height+'px');
    connectors.css('background-color',$('.menu_item').css('background-color'));
    
    var middle = parseInt(($('.menu_item').height()/2)-(this.menu_item_connector_height/2))+'px';
    var bottom = parseInt($('.menu_item').height()-this.menu_item_connector_height)+'px';
    /**
     * This places the little lines between the menu items. It can be set to either of the
     * numbers retrieved above. Or, comment it out and they'll appear at the top of the menu.
     */
    connectors.css('margin-top',middle);
  },
  makeUnselectable: function(selector){
    $(selector).css('-webkit-touch-callout', 'none');
    $(selector).css('-webkit-user-select', 'none');
    $(selector).css('-khtml-user-select', 'none');
    $(selector).css('-moz-user-select', '-moz-none');
    $(selector).css('-ms-user-select', 'none');
    $(selector).css('user-select', 'none');
  },
  menuButtonClicked: function(id){
    var parameters={
      type : 'post',
      url : './getContents.php',
      data : {target:id+'.html'},
      context : this,
      complete : function(res){$('#content').html(res.responseText);},
      async: false
    }
    $.ajax(parameters).responseText;
  }
}