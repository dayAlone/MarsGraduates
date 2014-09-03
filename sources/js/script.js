(function() {
  var animate, carousel, delay, initCalendar, initDay, loadMonth, scrollHeight, size, sizeMain;

  delay = function(ms, func) {
    return setTimeout(func, ms);
  };

  carousel = void 0;

  sizeMain = function() {
    var mainColHeightList;
    if ($('#main').length > 0) {
      mainColHeightList = [];
      $('#main .col, #main .frame').removeAttr('style');
      return $('#main .col').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
        $('#main .col, #main .frame').each(function() {
          mainColHeightList.push($(this).height());
          return console.log($(this).height());
        });
        return $('#main .col').height(Math.max.apply(Math, mainColHeightList));
      });
    }
  };

  scrollHeight = function() {
    $('#page.academy, #page.career, #page.about').removeAttr('style');
    if ($('body').width() > 800) {
      return $('#page.academy, #page.career, #page.about').height(function() {
        var i, p, t, w;
        w = $(window).height();
        t = $('#toolbar').height() + 40;
        i = $('#page .elm:last-of-type()').height();
        p = $('#page').height();
        return p + (w - i) - t - $('a.top').height();
      });
    }
  };

  size = function() {
    var direction, history, offset;
    sizeMain();

    /*
    	$('#page.about .scheme svg').removeAttr 'style'
    	$('#page.about .scheme svg').height $('#page.about .scheme svg > g')[0].getBoundingClientRect().height
    
    	$('#page.about .scheme .description, #page.about .scheme .frame')
    		.height $('#page.about .scheme svg').height()
    		.css 'line-height', $('#page.about .scheme svg').height() + 'px'
     */
    $('#page.academy .items').css('min-height', $("#page .item:visible").height());
    if ($(window).width() <= 991) {
      $('#main .col').height($('#main .frame').height());
    }
    if (carousel) {
      carousel.reload();
    }
    $('.history .slick-track').height($('.history .slick-active .row').height());
    $('#page.academy, #page.career, #page.about').removeAttr('style');
    scrollHeight();
    if (window.location.hash) {
      direction = window.location.hash.split('#go-')[1];
    }
    if ($("#" + direction).length > 0) {
      offset = $("#" + direction).offset().top;
      $('html, body').animate({
        'scrollTop': offset - $('#toolbar').height() - 10
      }, 300);
    }
    if (window.location.hash) {
      direction = window.location.hash.split('#modal')[1];
      if ($("" + window.location.hash).length > 0 && direction) {
        $("" + window.location.hash).modal();
      }
      window.location.hash = "";
    }
    if ($('body').hasClass('loaded')) {
      $('.speakers, .principles, .history').unslick();
    }
    $('#main a.internship').height($('#main a.leadership').height());
    $('.speakers').slick({
      infinite: false
    });
    $('.principles').slick({
      infinite: true,
      onInit: function() {
        return scrollHeight();
      },
      slidesToShow: 2,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 570,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });
    history = $('.history').slick({
      infinite: false,
      speed: 1000,
      onInit: function() {
        scrollHeight();
        if ($(window).width() <= 570) {
          return $('.history .slick-track').height($('.history .slick-active .row').height());
        }
      },
      onAfterChange: function(e) {
        $(".history-page a").removeClass('active');
        if ($(window).width() <= 570) {
          $('.history .slick-track').height($('.history .slick-active .row').height());
        }
        return $(".history-page a[data-id='" + e.currentSlide + "']").addClass('active');
      }
    });
    $('.history-page a').click(function(e) {
      history.slickGoTo($(this).data('id'));
      return e.preventDefault();
    });
    return $('body').addClass('loaded');
  };


  /*
  	$('a .flag svg').width ()->
  		return $(this).height()/1.6666666667
   */

  animate = function(el, eff, act, out) {
    if (act === 'show') {
      $(el).show();
    }
    return $(el).addClass('animated ' + eff).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
      $(this).removeClass('animated ' + eff);
      if (act === 'hide') {
        return $(el).hide();
      }
    });
  };

  loadMonth = function(a) {
    var link;
    link = "/include/month.php";
    if (a) {
      link += "?a=" + a;
    }
    return $.get(link, function(data) {
      $("#page.month .frame").replaceWith(data);
      return initCalendar();
    });
  };

  initCalendar = function() {
    $('#cities_list a, body, #page.month .title a.arrow, #page.month .title .select').off('click');
    $('#cities_list a').on('click', function(e) {
      if ($(this).data('id') > 0) {
        $('#page.month .title .select span').text($(this).text());
      }
      $.cookie('city', $(this).data('id'), {
        expires: 1,
        path: '/'
      });
      loadMonth();
      return e.preventDefault();
    });
    $('body').on('click', function(e) {
      if (!$('#cities_list').is(':hidden')) {
        return $('#cities_list').velocity("fadeOut", {
          duration: 400,
          display: "none"
        });
      }
    });
    $('#page.month .title .select').on('click', function(e) {
      if ($('#cities_list').is(':hidden')) {
        $('#cities_list').velocity("fadeIn", {
          duration: 400,
          display: "block"
        });
      } else {
        $('#cities_list').velocity("fadeOut", {
          duration: 400,
          display: "none"
        });
      }
      return e.preventDefault();
    });
    return $('#page.month .title a.arrow').on('click', function(e) {
      loadMonth($(this).data('direction'));
      console.log($(this).data('direction'));
      return e.preventDefault();
    });
  };

  initDay = function() {
    return $('#cal-day a.arrow').click(function(e) {
      var date, x;
      date = $(this).data('date');
      x = $(this);
      $.get("/include/calendar.php?date=" + date, function(data) {
        x.parents("#cal-day").replaceWith(data);
        sizeMain();
        return initDay();
      });
      return e.preventDefault();
    });
  };

  $(document).ready(function() {
    var shown, side, x;
    shown = false;
    side = function(id) {
      if (!$("#" + id).is(':visible')) {
        return $("#" + id).addClass('open').velocity({
          properties: "transition.slideLeftIn",
          options: {
            duration: 300,
            complete: function() {
              return $("#" + id + " input[type='email']").focus().select();
            }
          }
        });
      } else {
        return $("#" + id).velocity({
          properties: "transition.slideRightOut",
          options: {
            duration: 300,
            complete: function() {
              return $("#" + id).removeClass('open');
            }
          }
        });
      }
    };
    $('#nav .maillist, #nav .question').click(function(e) {
      var id, second;
      id = $(this).attr('class');
      second = $("#nav .footer > a:not(." + id + ")").attr('class');
      if (!$("#" + id).is(':visible') && $("#" + second).is(':visible')) {
        side(second);
      }
      side(id);
      return e.preventDefault();
    });
    $('.scheme svg g[id^="scheme-"]').hover(function() {
      return $(".scheme-description span[data-id='" + ($(this).attr('id')) + "']").addClass('hover');
    }, function() {
      return $(".scheme-description span").removeClass('hover');
    });
    $('.scheme svg g[id^="scheme-"]').click(function() {
      $('.scheme svg g[id^="scheme-"]').css('opacity', .1);
      $('.scheme .description .item').removeClass('active');
      $(this).css('opacity', 1);
      $(".scheme .description .item[data-id='" + ($(this).attr('id')) + "']").addClass('active');
      return $('.scheme').addClass('open');
    });
    $(document).on('click', function(e) {
      if ($('.scheme').hasClass('open') && $('.scheme').length > 0 && $(e.target).parents('.scheme').length === 0) {
        $('.scheme').removeClass('open');
        $('.scheme svg g[id^="scheme-"]').css('opacity', 1);
        return $('.scheme .description .item').removeClass('active');
      }
    });
    $('.cell a.more').click(function(e) {
      var date;
      date = $(this).data('date');
      $.get("/include/day.php?date=" + date, function(data) {
        $("#day").replaceWith(data);
        return $('#day_events').modal();
      });
      return e.preventDefault();
    });
    $('a.video').click(function(e) {
      $(this).hide().after('<iframe width="560" height="315" src="//www.youtube.com/embed/uEeb8DQEtRA?autoplay=1" frameborder="0" allowfullscreen></iframe>');
      return e.preventDefault();
    });
    initCalendar();
    initDay();
    $('body').addClass($.browser.platform);
    $('#modalInternship, #modalLeadership').on('shown.bs.modal', function() {
      if ($(window).width() > 540) {
        return $(this).find('.scroll').perfectScrollbar({
          suppressScrollX: true
        });
      }
    });
    $('.select .trigger').click(function(e) {
      $(this).parents('.select').toggleClass('open');
      if ($('.select').hasClass('open')) {
        $('.select .city-list').velocity("transition.slideDownIn", {
          duration: 400,
          display: "block"
        });
      } else {
        $('.select .city-list').velocity("transition.slideUpOut", {
          duration: 400,
          display: "none"
        });
      }
      return e.preventDefault();
    });
    $('.select .city-list a').click(function(e) {
      $('.select').removeClass('open');
      return $('.select .city-list').velocity("transition.slideUpOut", {
        duration: 400,
        display: "none"
      });
    });
    $('#maillist form').submit(function(e) {
      $(this).find('input[type=email]').removeClass('error');
      if ($(this).find('input[type=email]').val().length > 0) {
        $.post('/include/mail.php', {
          EMAIL: $(this).find('input[type=email]').val()
        }, function(data) {
          if (data === "true") {
            return $("#subscribe-check").modal();
          } else {
            return $("#subscribe-error").modal();
          }
        });
      } else {
        $(this).find('input[type=email]').addClass('error');
      }
      return e.preventDefault();
    });
    $(window).on('scroll touchmove gesturechange', function() {
      return $('body.color #toolbar').css({
        'background-position-y': -$(window).scrollTop()
      });
    });
    $('body.color #toolbar').css({
      'background-color': $('body.color').css('background-color'),
      'background-image': $('body.color').css('background-image')
    });
    $('a.top').click(function(e) {
      $('html, body').animate({
        'scrollTop': 0
      }, 300);
      return e.preventDefault();
    });
    $('#signup').submit(function(e) {
      var formData, path;
      path = '/include/signup.php';
      formData = $(this).serialize();
      $.post(path, {
        data: formData
      }, function(data) {
        console.log(data);
        if (data === "success") {
          return $('#event-success').modal();
        }
      });
      return e.preventDefault();
    });
    $('#page .sections a, .parts a, .scrollspy a, a.reg').click(function(e) {
      var href, offset, x;
      href = $(this).attr('href').split('#')[1];
      x = $(this);
      if ($(this).parents('.parts').length > 0) {
        if ($(this).hasClass('active')) {
          return false;
        }
        $(this).parents('.parts').find('a').removeClass('active');
        $(this).addClass('active');
        $(this).parents('.parts').addClass('open');
        if (!$('#page .items').hasClass('open')) {
          $('#page .items').addClass('open');
        }
        $('#page .items').css('min-height', $("#page a[name='" + href + "']").parents('.item').height());
        $('#page .item').velocity({
          properties: "transition.slideUpOut",
          options: {
            duration: 400,
            display: "none",
            complete: function() {
              return $("#page a[name='" + href + "']").parents('.item').velocity({
                properties: "transition.slideDownIn",
                options: {
                  duration: 400,
                  display: "block"
                }
              });
            }
          }
        });
      } else {
        offset = $("#page a[name='" + href + "']").offset();
        $('html, body').animate({
          'scrollTop': offset.top - 140
        }, 300);
      }
      return e.preventDefault();
    });
    $('input[name="PERSONAL_MOBILE"]').mask('+7 (000) 000 00 00');
    $('input[name="PERSONAL_BIRTHDAY"]').mask('00.00.0000');
    $('.brands .title').click(function(e) {
      var x;
      $(this).parent().toggleClass('open');
      x = $(this).parent().find('.slide');
      if ($(this).parent().hasClass('open')) {
        x.velocity("transition.slideDownIn", {
          duration: 300,
          display: "block"
        });
      } else {
        x.velocity("transition.slideUpOut", {
          duration: 300,
          display: "none"
        });
      }
      return e.preventDefault();
    });
    $('.reasons').owlCarousel({
      merge: true,
      mouseDrag: false,
      responsive: {
        0: {
          items: 1
        },
        480: {
          items: 1
        },
        768: {
          items: 2
        }
      }
    });

    /*
    	reasons = $('.reasons').slick
    		dots: true
    		arrows: false
    		infinite: true
    		slidesToShow: 2
    		slidesToScroll: 2
    		responsive: [
    			breakpoint: 570
    			settings:
    				slidesToShow: 1
    				slidesToScroll: 1
    		]
    
    	$('.reasons').velocity("transition.slideUpOut", { duration: 0, display: "none", complete: ()-> 
    		size()
    		$('body').scrollspy('refresh')
    	 })
     */
    $('#page.career h4.toggle').click(function(e) {
      var x;
      x = $('#page.career .reasons');
      if (x.is(':hidden')) {
        x.velocity("transition.slideDownIn", {
          duration: 400,
          display: "block",
          complete: function() {
            size();
            return $('body').scrollspy('refresh');
          }
        });
        reasons.slickGoTo(0);
      } else {
        x.velocity("transition.slideUpOut", {
          duration: 400,
          display: "none",
          complete: function() {
            size();
            return $('body').scrollspy('refresh');
          }
        });
      }
      return e.preventDefault();
    });
    carousel = $(".carousel").waterwheelCarousel();
    $(".carousel .left").click(function(e) {
      carousel.prev();
      return e.preventDefault();
    });
    $(".carousel .right").click(function(e) {
      carousel.next();
      return e.preventDefault();
    });
    $('#toolbar .nav-trigger, #nav a.trigger').click(function() {
      return $('#nav').toggleClass('open');
    });
    $('#question, #maillist').hoverIntent({
      over: function() {
        return $(this).addClass('open');
      },
      out: function() {
        if ($(window).width() > 1024) {
          return $(this).removeClass('open');
        }
      }
    });
    $('form input[type=checkbox]').iCheck();
    delay(300, function() {
      return size();
    });
    x = void 0;
    return $(window).resize(function() {
      clearTimeout(x);
      return x = delay(400, function() {
        return size();
      });
    });
  });

}).call(this);
