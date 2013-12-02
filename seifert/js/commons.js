function trimString_30() {
  var limit = 30;
  var str = trim_obj.html();
  var strtemp = str.substr(0, limit);
  if (str.length > 30) {
    str.substr(0, limit);
    str = strtemp + '<span class="excerpt"> ...</span>';
  }
  trim_obj.html(str);     
}

$(function(){
  if($('.slides').length) {
    initSlide();
    $(window).resize(function() {
      initSlide();
    });
  }
  
  function initSlide(){
  $('#carousel_holder .images').width($(window).width()+30);

    $('.slides').carouFredSel( {
      direction: 'left',
      circular: false,
      infinite: false,
      width: '100%',
      height: 450,
      items: parseInt($('#carousel_holder .images').width()/350),
      auto 		: false,
      scroll: {
        fx: "fade"
      },
      prev : {
    		button		: "#prev",
    		key			: "left",
    		items		: parseInt($('#carousel_holder .images').width()/350),
    		duration	: 200
    	},
    	next : {
    		button		: "#next",
    		key			: "right",
    		items		: parseInt($('#carousel_holder .images').width()/350),
    		duration	: 200
    	}
    });
  }
  
  $('#container #right_sb_menu.article .listing ul li').each(function () {
    if($(this).find('a').length) {
      trim_obj = $(this).find('a');
    } else {
      trim_obj = $(this);
    }
    trimString_30();
  });
  
  $('#container #right_sb_menu .listing li.fb').prev('li').find('ul').addClass('noBorder');
  $('.comments .posts').each(function(){
    $(this).find('h1').insertBefore(this);
    if( $(this).find('ul ul li').length ){
      $(this).find('ul ul li').each(function(){
        var tempText = $(this).html();
        $(this).empty().append('<h5>' + tempText + '</h5>');
        $(this).insertAfter($(this).closest('.posts').find('ul'))
        $(this).wrap('<ul style="height:40px" class="gray_white_bg widget_recent_entries"></ul>');
        
      });
    }
    $(this).find('ul:first').remove();
    $(this).find('ul:last').addClass('last');
    if($(this).find('li').not($(this).find('ul li'))) {
      $(this).find('li').not($(this).find('ul li')).remove();
    }
  });
  
  $('#commentstemplate.closed').children().hide();
  $('#commentstemplate.closed').append('<span class="corners submits">Write a comment</span>');
  
  $('#commentstemplate.closed span').click(function(){
    $(this).closest('li').children().show();
    $(this).closest('li').addClass('opened').removeClass('closed');
    $(this).remove();
    
  });
  
  if($('#content').height() > $('#right_sb_menu').height()) {
    $('#right_sb_menu').height($('#content').height()-5);
  } else {
    $('#content').css('min-height', $('#right_sb_menu').height()+25);
  }
  
  $('#bcrumb span.floater').each(function(){
    if($(this).contents().length === 0) {
      $(this).addClass('inactive');
    }
  });
  
  $('#bcrumb span.floater').click(function(){
    window.location.href = $(this).find('a').attr('href');
  });
  
  $('#container #content img').closest('a').fancybox();
});