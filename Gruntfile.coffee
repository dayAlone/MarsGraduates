module.exports = (grunt)->

	grunt.initConfig
		pkg: grunt.file.readJSON 'package.json'

		# Переменные папок
		path:
			sources : 'sources'
			layout  : 'bitrix/layout'

		files:
			css:
				frontend : '<%= path.layout %>/css/frontend.css'
				develop  : '<%= path.sources %>/css/style.styl'
				sources : [
							'./bower_components/bootstrap/dist/css/bootstrap.css'
							'./bower_components/animate.css/animate.css'
							'./bower_components/slick/slick/slick.css'
							'./bower_components/scroll/src/perfect-scrollbar.css'
							'./bower_components/owl.carousel/dist/assets/owl.carousel.css'
							'<%= path.sources %>/css/style.css'
					]
			js:
				frontend : '<%= path.layout %>/js/frontend.js'
				develop  : '<%= path.sources %>/js/script.coffee'
				sources  : [
							'./bower_components/jquery/dist/jquery.js'
							'./bower_components/bootstrap/dist/js/bootstrap.js'
							'./bower_components/carousel/js/jquery.waterwheelCarousel.js'
							'./bower_components/slick/slick/slick.js'
							'./bower_components/owl.carousel/dist/owl.carousel.js'
							'./bower_components/scroll/src/jquery.mousewheel.js'
							'./bower_components/scroll/src/perfect-scrollbar.js'
							'./bower_components/hoverIntent/jquery.hoverIntent.js'
							'./bower_components/jquery.browser/dist/jquery.browser.js'
							'./bower_components/icheck/icheck.js'
							'./bower_components/velocity/jquery.velocity.js'
							'./bower_components/velocity/velocity.ui.js'
							'./bower_components/jquery.cookie/jquery.cookie.js'
							'./bower_components/Snap.js/dist/snap.svg.js'
							'<%= path.sources %>/js/script.js'
						]

		# Настройка уведомлений
		notify_hooks: 
			options:
				enabled: true
				max_jshint_notifications: 5
		notify:
			css:
				options:
					title: 'CSS Compile Complete'
					message: 'Stylus, CSS Comb, CSS Min, Autoprefixee & Concat finished running'
			js:
				options:
					title: 'JavaScript Compile Complete'
					message: 'CoffeScript, Concat & Uglify finished running'
			image:
				options:
					title: 'Images Compile Complete'
					message: 'ImageMin finished running'
			svg:
				options:
					title: 'SVG Files Compile Complete'
					message: 'SVGMin finished running'
			html:
				options:
					title: 'HTMLs Compile Complete'
					message: 'Jade finished running'

		# Оптимизируем SVG
		svgmin:
			options: 
				plugins: [{
					removeViewBox: false
					}, {
					removeUselessStrokeAndFill: false
					}, {
					cleanupIDs: false
					}, {
					removeComments: true
					}, {
					convertPathData: { 
					    straightCurves: false
					}
				}]
			dist:
				files: [{
					expand: true
					cwd: '<%= path.sources %>/images/svg/'
					src: ['**/*.svg']
					dest: '<%= path.layout %>/images/svg/'
				}]

		# Копирование картинок из плагинов
		copy:
			main:
				files: [
					{ expand: true, flatten: true, src: ['./bower_components/fotorama/*.png'], dest: '<%= path.sources %>/images/plugins/', filter: 'isFile' }
					{ expand: true, flatten: true, src: ['./bower_components/slick/slick/fonts/*'], dest: '<%= path.layout %>/fonts/', filter: 'isFile' }

				]

		# Уменьшение размера изображений
		imagemin:
			png:
				options: 
					optimizationLevel: 7
				files: [{
					expand: true
					cwd: '<%= path.sources %>/images/'
					src: ['**/*.png']
					dest: '<%= path.layout %>/images/'
					}]
			jpg:
				options: 
					progressive: true
				files: [{
					expand: true
					cwd: '<%= path.sources %>/images/'
					src: ['**/*.jpg']
					dest: '<%= path.layout %>/images/'
					}]

		# Конвертируем Stylus -> CSS
		stylus:
			options:
				compress: false
			compile:
				files:
					'<%= path.sources %>/css/style.css' : '<%= path.sources %>/css/style.styl'

		# Конвертируем CoffeeScript -> JavaScript
		coffee:
			compile:
				files: 
					'<%= path.sources %>/js/script.js' : ['<%= files.js.develop %>']

		# Собираем JS и CSS в один файл
		concat:
			js_frontend:
				src  : ['<%= files.js.sources %>']
				dest : '<%= files.js.frontend %>'
				options:
					separator: ';'
			css_frontend:
				src  : ['<%= files.css.sources %>']
				dest : '<%= files.css.frontend %>'

		# Причесываем CSS
		csscomb:
			css_frontend:
				options:
					config: './node_modules/grunt-csscomb/node_modules/csscomb/config/yandex.json'
				files:
					'<%= files.css.frontend %>' : [ '<%= files.css.frontend %>' ]

		# Сжимаем CSS
		cssmin:
			options:
				keepSpecialComments: 0
				report: 'gzip'
			css_frontend:
				files:
					'<%= files.css.frontend %>' : [ '<%= files.css.frontend %>' ]

		# Сжимаем JS
		uglify:
			options:
				mangle: true
				compress: true
				report: 'gzip'
			frontend:
				files:
					'<%= files.js.frontend %>' : [ '<%= files.js.frontend %>' ]


		# Генерируем HTML страницы
		jade:
			compile:
				options:
					pretty: true
					#data: 
						#products : grunt.file.readJSON('./sources/html/includes/products.json')
				files:	[{
					expand : true
					cwd    : '<%= path.sources %>/html/'
					src    : ['**/*.jade', '!**/includes/**']
					dest   : '<%= path.layout %>/../'
					ext    : '.html'
				}]
					
		# Конвертируем шрифты
		ziti:
			convert_only:
				options:
					subset: false
					convert: true
				files: [{
					expand : true
					cwd    : '<%= path.sources %>/fonts/'
					src    : ['**/*.ttf']
					dest   : '<%= path.layout %>/fonts/'
				}]

		# Бдим за изменениями и все пересобираем при необходимости
		watch:
			js_frontend:
				files   : ['<%= files.js.sources %>', '<%= files.js.develop %>']
				tasks   : ['coffee', 'concat:js_frontend', 'notify:js' ]
				options :
						livereload: true
			css_frontend:
				files   : ['<%= files.css.sources %>', '<%= files.css.develop %>']
				tasks   : ['stylus', 'concat:css_frontend', 'notify:css' ]
				options :
						livereload: true
			images:
				files: ['<%= path.sources %>/images/**/*.jpg', '<%= path.sources %>/images/**/*.png']
				tasks   : ['copy', 'imagemin', 'notify:image' ]
				options :
						livereload: true
			svg:
				files   : ['<%= path.sources %>/images/svg/*.svg']
				tasks   : ['svgmin', 'jade', 'notify:svg' ]
				options :
						livereload: true
			html:
				files   : ['<%= path.sources %>/html/*.jade', '<%= path.sources %>/html/**/*.jade']
				tasks   : ['jade', 'notify:html']
				options :
						livereload: true

	
	
	grunt.loadNpmTasks 'grunt-autoprefixer'
	grunt.loadNpmTasks 'grunt-contrib-coffee'
	grunt.loadNpmTasks 'grunt-contrib-concat'
	grunt.loadNpmTasks 'grunt-contrib-copy'
	grunt.loadNpmTasks 'grunt-contrib-cssmin'
	grunt.loadNpmTasks 'grunt-contrib-imagemin'
	grunt.loadNpmTasks 'grunt-contrib-stylus'
	grunt.loadNpmTasks 'grunt-contrib-uglify'
	grunt.loadNpmTasks 'grunt-contrib-jade'
	grunt.loadNpmTasks 'grunt-contrib-watch'
	grunt.loadNpmTasks 'grunt-notify'
	grunt.loadNpmTasks 'grunt-csscomb'
	grunt.loadNpmTasks 'grunt-svgmin'
	grunt.loadNpmTasks 'grunt-ziti'

	grunt.registerTask 'default', ['watch']
	# 
	grunt.registerTask 'compile', ['svgmin', 'copy', 'imagemin', 'stylus', 'coffee', 'concat', 'csscomb', 'cssmin', 'uglify','jade', 'ziti']

	grunt.task.run 'notify_hooks'
