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
        $('#main .col, #main .frame').each(function() {});
        mainColHeightList.push($(this).height());
        $('#main .col').height(Math.max.apply(Math, mainColHeightList));
        return console.log(Math.max.apply(Math, mainColHeightList), mainColHeightList);
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
    if ($(window).width() <= 768) {
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
      window.location.hash = "";
    }
    if ($("#" + direction).length > 0) {
      offset = $("#" + direction).offset().top;
      $('html, body').animate({
        'scrollTop': offset - $('#toolbar').height() - 10
      }, 300);
    }
    if ($('body').hasClass('loaded')) {
      $('.speakers, .principles, .history').unslick();
    }
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
    var x;
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
      return $(this).find('.scroll').perfectScrollbar({
        suppressScrollX: true
      });
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
    $('#maillist form').submit(function(e) {
      $.post('/include/mail.php', {
        EMAIL: $(this).find('input[type=email]').val()
      }, function(data) {
        if (data === "true") {
          return alert("Вы успешно подписались на рассылку, теперь необходимо подтвердить адрес эл. почты");
        } else {
          return alert("Произошла ошибка: " + data);
        }
      });
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
    $('#page .sections a, .parts a, .scrollspy a, a.reg').click(function(e) {
      var href, offset;
      href = $(this).attr('href').split('#')[1];
      offset = $("#page a[name='" + href + "']").offset();
      $('html, body').animate({
        'scrollTop': offset.top - 140
      }, 300);
      return e.preventDefault();
    });
    $('.brands .title').click(function(e) {
      var x;
      $(this).parent().toggleClass('open');
      x = $(this).parent().find('.slide');
      if ($(this).parent().hasClass('open')) {
        x.velocity("transition.slideDownIn", {
          duration: 400,
          display: "block"
        });
      } else {
        x.velocity("transition.slideUpOut", {
          duration: 400,
          display: "none"
        });
      }
      return e.preventDefault();
    });
    $('.history-page a').click(function(e) {
      history.slickGoTo($(this).data('id'));
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
        return $(this).toggleClass('open');
      },
      out: function() {
        return $(this).toggleClass('open');
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
