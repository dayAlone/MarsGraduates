delay = (ms, func) -> setTimeout func, ms
carousel = undefined

sizeMain = ()->
	if($('#main').length > 0)

		mainColHeightList = []
		$('#main .col, #main .frame').removeAttr 'style'
		
		$('#main .col').one 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', ()->
			$('#main .col, #main .frame').each ()->
				mainColHeightList.push($(this).height());
				console.log $(this).height()
			$('#main .col').height Math.max.apply(Math,mainColHeightList)


scrollHeight = ()->
	
	$('#page.academy, #page.career, #page.about').removeAttr 'style'

	if($('body').width() > 800)
		$('#page.academy, #page.career, #page.about').height ()->
			w = $(window).height()
			t = $('#toolbar').height()+40
			i = $('#page .elm:last-of-type()').height()
			p = $('#page').height()
			return p + (w-i)-t - $('a.top').height()
	

size = ()->
	
	sizeMain()
	###
	$('#page.about .scheme svg').removeAttr 'style'
	$('#page.about .scheme svg').height $('#page.about .scheme svg > g')[0].getBoundingClientRect().height

	$('#page.about .scheme .description, #page.about .scheme .frame')
		.height $('#page.about .scheme svg').height()
		.css 'line-height', $('#page.about .scheme svg').height() + 'px'
	###
	
	$('a.video-replace').click (e)->
		height = $(this).find('img').height()
		width = $(this).find('img').width()
		$(this)
			.html "<iframe width='#{width}' height='#{height}' src='//www.youtube.com/embed/#{$(this).data('code')}?autoplay=1' frameborder='0' allowfullscreen></iframe>"
		e.preventDefault()

	$('#page.academy .items').css 'min-height', $("#page .item:visible").height()

	if($(window).width()<=991)
		$('#main .col').height($('#main .frame').height())
	if carousel
		carousel.reload()
	$('.history .slick-track').height($('.history .slick-active .row').height())
	$('#page.academy, #page.career, #page.about').removeAttr 'style'

	scrollHeight()

	if window.location.hash
		direction = window.location.hash.split('#go-')[1]
		

	if $("##{direction}").length > 0
		offset = $("##{direction}").offset().top
		$('html, body').animate({'scrollTop' : offset - $('#toolbar').height() - 10 },300)

	if window.location.hash
		direction = window.location.hash.split('#modal')[1]
		if $("#{window.location.hash}").length > 0 && direction
			$("#{window.location.hash}").modal()
		window.location.hash = ""

	

	$('.speakers, .principles, .history').unslick()	if $('body').hasClass 'loaded'

	$('#main a.internship').height($('#main a.leadership').height())

	$('.speakers').slick
		infinite: false

	$('.principles').slick
		infinite: true
		onInit: ()->
			scrollHeight()
		slidesToShow: 2
		slidesToScroll: 1
		responsive: [
			breakpoint: 570
			settings:
				slidesToShow: 1
				slidesToScroll: 1
		]

	history = $('.history').slick
		infinite: false
		speed: 1000
		onInit: ()->
			scrollHeight()
			if($(window).width()<=570)
				$('.history .slick-track').height($('.history .slick-active .row').height())
		onAfterChange : (e)->
			$(".history-page a").removeClass 'active'
			if($(window).width()<=570)
				$('.history .slick-track').height($('.history .slick-active .row').height())
			$(".history-page a[data-id='#{e.currentSlide}']").addClass('active')

	$('.history-page a').click (e)->
		history.slickGoTo($(this).data('id'))
		e.preventDefault()

	$('body').addClass 'loaded'

###
	$('a .flag svg').width ()->
		return $(this).height()/1.6666666667
###	
animate = (el, eff, act, out)->
	if act == 'show'
		$(el).show()
	$(el).addClass('animated '+eff).one 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', ()->
		$(this).removeClass('animated '+eff);
		if act == 'hide'
			$(el).hide()

loadMonth = (a)->
	link = "/include/month.php"
	if a 
		link += "?a=#{a}"
	$.get link, (data)->
     $("#page.month .frame").replaceWith(data);
     initCalendar()
		

initCalendar = ()->
	$('#cities_list a, body, #page.month .title a.arrow, #page.month .title .select').off('click')

	$('#cities_list a').on 'click', (e)->
		if $(this).data('id') > 0
			$('#page.month .title .select span').text($(this).text())
		$.cookie('city', $(this).data('id'), { expires: 1, path: '/' });
		loadMonth()
		e.preventDefault()

	$('body').on 'click', (e)->
		if !$('#cities_list').is ':hidden'
			$('#cities_list').velocity("fadeOut", { duration: 400, display: "none" })

	$('#page.month .title .select').on 'click', (e)->
		if $('#cities_list').is ':hidden'
			$('#cities_list').velocity("fadeIn", { duration: 400, display: "block" })
		else
			$('#cities_list').velocity("fadeOut", { duration: 400, display: "none" })

		e.preventDefault()

	$('#page.month .title a.arrow').on 'click', (e)->
		loadMonth($(this).data('direction'))
		console.log $(this).data('direction')
		e.preventDefault()

initDay = ()->
	$('#cal-day a.arrow').click (e)->
		date = $(this).data('date')
		x = $(this)
		$.get "/include/calendar.php?date=#{date}", (data)->
     		x.parents("#cal-day").replaceWith(data);
     		sizeMain()
     		initDay()
		e.preventDefault()

$(document).ready ->

	$('.slide__trigger').click (e)->
		parent = $(this).parents('.slide')
		content = parent.find('.slide__content')
		if !parent.hasClass 'slide--open'
			parent.addClass 'slide--open'
			parent.css 'min-height', $(this).height()+content.height()
			content.velocity
					properties: "transition.slideDownIn"
					options:
						duration: 300
		else
			parent.css 'min-height', $(this).height()
			content.velocity
				properties: "transition.slideUpOut"
				options:
					duration: 300
					complete: ()->
						parent.removeClass 'slide--open'
		e.preventDefault()

	if $('#event').length > 0
		$(window).scroll ()->
			g = $('#page').offset()
			b = $('#cal-day .counter').offset().top + $('#cal-day .counter').height()
			if b > g.top
				$('#cal-day .counter').addClass 'blue'
			else
				$('#cal-day .counter').removeClass 'blue'

	shown = false
	side = (id)->
		if !$("##{id}").is ':visible'
			$("##{id}")
				.addClass 'open'
				.velocity
					properties: "transition.slideLeftIn"
					options:
						duration: 300, 
						complete: ()-> 
							$("##{id} input[type='email']").focus().select()
		else
			$("##{id}")
				.velocity
					properties: "transition.slideRightOut"
					options:
						duration: 300, 
						complete: ()-> 
							$("##{id}").removeClass 'open'
	
	$('#nav .maillist, #nav .question').click (e)->
		id = $(this).attr('class')
		second = $("#nav .footer > a:not(.#{id})").attr('class')

		if !$("##{id}").is(':visible') && $("##{second}").is(':visible')
			side(second)
		side(id)

		e.preventDefault()

	$('.scheme svg g[id^="scheme-"]').hover ()->
		$(".scheme-description span[data-id='#{$(this).attr('id')}']").addClass 'hover'
	, ()->
		$(".scheme-description span").removeClass 'hover'

	$('.scheme svg g[id^="scheme-"]').click ()->
		$('.scheme svg g[id^="scheme-"]').css 'opacity', .1
		$('.scheme .description .item').removeClass 'active'
		$(this).css 'opacity', 1
		$(".scheme .description .item[data-id='#{$(this).attr('id')}']").addClass 'active'
		$('.scheme').addClass 'open'

	$(document).on 'click', (e)->
		if $('.scheme').hasClass('open') && $('.scheme').length > 0 && $(e.target).parents('.scheme').length == 0
			$('.scheme').removeClass 'open'
			$('.scheme svg g[id^="scheme-"]').css 'opacity', 1
			$('.scheme .description .item').removeClass 'active'

	$('.cell a.more').click (e)->
		date = $(this).data('date')
		$.get "/include/day.php?date=#{date}", (data)->
     		$("#day").replaceWith(data);
     		$('#day_events').modal()
		e.preventDefault()

	$('a.video').click (e)->
		$(this)
			.hide()
			.after('<iframe width="560" height="315" src="//www.youtube.com/embed/uEeb8DQEtRA?autoplay=1" frameborder="0" allowfullscreen></iframe>')
		e.preventDefault()

	initCalendar()
	initDay()

	$('body').addClass $.browser.platform

	$('#modalInternship, #modalLeadership').on 'shown.bs.modal', ()->
		if $(window).width() > 540
			$(this).find('.scroll').perfectScrollbar
				suppressScrollX:true

	$('.select .trigger').click (e)->
		$(this).parents('.select').toggleClass 'open'
		if $('.select').hasClass 'open'
			$('.select .city-list').velocity("transition.slideDownIn", { duration: 400, display: "block" })
		else
			$('.select .city-list').velocity("transition.slideUpOut", { duration: 400, display: "none" })
		e.preventDefault()

	$('.select .city-list a').click (e)->
		$('.select').removeClass 'open'
		$('.select .city-list').velocity("transition.slideUpOut", { duration: 400, display: "none" })

	$('#maillist form').submit (e)->
		$(this).find('input[type=email]').removeClass 'error'
		if $(this).find('input[type=email]').val().length > 0
			$.post '/include/mail.php',
		        EMAIL: $(this).find('input[type=email]').val()
		        (data) -> 
		        	if data == "true"
		        		$("#subscribe-check").modal()
		        	else
		        		$("#subscribe-error").modal()
		else
			$(this).find('input[type=email]').addClass 'error'

		e.preventDefault()

	$(window).on 'scroll touchmove gesturechange', ()->
		$('body.color #toolbar').css
			'background-position-y' : -$(window).scrollTop()

	$('body.color #toolbar').css
		'background-color' : $('body.color').css('background-color')
		'background-image' : $('body.color').css('background-image')

	$('a.top').click (e)->
		$('html, body').animate({'scrollTop' : 0},300)
		e.preventDefault()

	$('#signup').submit (e)->
		path = '/include/signup.php'
		formData = $(this).serialize()
		$.post path, data: formData, (data)->
			console.log data
			if data == "success"
				$('#event-success').modal()
		e.preventDefault()

	$('#page .sections a, .parts a, .scrollspy a, a.reg').click (e)->
		href = $(this).attr('href').split('#')[1]
		x = $(this)
		if $(this).parents('.parts').length > 0
			if($(this).hasClass('active'))
				return false
			$(this).parents('.parts').find('a').removeClass 'active'
			$(this).addClass 'active'
			
			$(this).parents('.parts').addClass 'open'
			if !$('#page .items').hasClass 'open'
				$('#page .items')
					.addClass 'open'

			$('#page .items').css 'min-height', $("#page a[name='#{href}']").parents('.item').height()
			
			$('#page .item')
				.velocity
					properties: "transition.slideUpOut"
					options:
						duration: 400, 
						display: "none", 
						complete: ()-> 
							$("#page a[name='#{href}']").parents('.item')
								.velocity
									properties: "transition.slideDownIn"
									options:
										duration: 400, 
										display: "block"
			
			
		else
			offset = $("#page a[name='#{href}']").offset()
			$('html, body').animate({'scrollTop' : offset.top-140},300)

		e.preventDefault()


	options =  
		onKeyPress: (cep, x) ->
			cep = cep.split('+7 (').join('').split('8 (').join('')
			console.log cep[0]
			masks = ['+7 (000) 000 00 00', '8 (000) 000 00 00'];
			if cep[0] == '8'
				mask = masks[1]
			else
				mask = masks[0];
			$('input[name="PERSONAL_MOBILE"]').mask(mask, this);
	

	$('input[name="PERSONAL_MOBILE"]')
		.mask('+7 (000) 000 00 00', options)
		.on 'focus', ()->
			$(this).val('+7 (')

	$('input[name="PERSONAL_BIRTHDAY"]').mask('00.00.0000');
	
	$('.brands .title').click (e)->
		$(this).parent().toggleClass('open')
		x = $(this).parent().find('.slide')
		
		if $(this).parent().hasClass('open')
			x.velocity("transition.slideDownIn", { duration: 300, display: "block" })
		else
			x.velocity("transition.slideUpOut", { duration: 300, display: "none" })
		e.preventDefault()

	
	$('.reasons').owlCarousel
		merge:true
		mouseDrag : false
		responsive :
			0 :
				items : 1
			480 : 
				items : 1
			768 :
				items : 2

	###
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
	###

	$('#page.career h4.toggle').click (e)->
		x = $('#page.career .reasons');
		if x.is(':hidden')
			x.velocity("transition.slideDownIn", { duration: 400, display: "block", complete: ()-> 
				size()
				$('body').scrollspy('refresh')
				})
			reasons.slickGoTo(0)
		else
			x.velocity("transition.slideUpOut", { duration: 400, display: "none", complete: ()-> 
				size()
				$('body').scrollspy('refresh')
				})
		
		e.preventDefault()

	# Carousel
	carousel = $(".carousel").waterwheelCarousel()

	$(".carousel .left").click (e)->
		carousel.prev()
		e.preventDefault()
	$(".carousel .right").click (e)->
		carousel.next()
		e.preventDefault()

	$('#toolbar .nav-trigger, #nav a.trigger').click ()->
		$('#nav').toggleClass 'open'

	$('#question, #maillist').hoverIntent 
		over: ()-> $(this).addClass 'open'
		out: ()-> 
			if($(window).width()>1024)
				$(this).removeClass 'open'

	$('form input[type=checkbox]').iCheck()


	delay 300, ()->
		size()


	x = undefined
	$(window).resize ->
		clearTimeout(x)
		x = delay 400, ()->
			size()
   
