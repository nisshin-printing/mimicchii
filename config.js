'use strigt';
/**
 * タスク設定ファイル
 */
module.exports = {
	IS_PRODUCTION: false,
	dist: 'public',
	autoTest: false,
	style: {
		sass: {
			errLogToConsole: true,
			outputStyle: 'compressed',
			sourcemap: true,
			souceComments: 'normal',
			includePaths: [
				'src/sass/',
				'node_modules/foundation-sites/scss'
			]
		},
		autoprefixer: {
			browsers: [
				'last 3 version',
				'ie 10',
				'Android 4.2'
			]
		},
		soucemaps: './maps'
	},
	htmlhint: '.htmlhintrc',
	styleguide: {
		css: '../../css/style.css',
		script: '../../js/app.js',
		out: 'public/styleguide',
		clean: true
	},
	server: {
		ghostMode: {
			clicks: false,
			location: false,
			forms: false,
			scroll: false
		}
	},
	path: {
		html: {
			src: 'public/**/*.html'
		},
		style: {
			src: ['src/sass/**/*.scss', '!src/sass/**/_*.scss'],
			watch: ['src/sass/**/*.scss'],
			dest: 'public/css'
		},
		ejs: {
			src: ['src/view/**/*.ejs', '!src/view/**/_*.ejs'],
			watch: ['src/view/**/*.ejs'],
			dest: 'public'
		},
		svg: {
			src: 'src/svg/icon/*.svg',
			watch: ['src/svg/*'],
			dest: 'src/svg',
		},
		es6: {
			src: 'src/js/**/*.es6',
			dest: 'src/js'
		},
		js: {
			src: ['src/js/**/*.js'],
			watch: ['src/js/**/*.js'],
			dest: 'public/js'
		},
		test: {
			src: [
				'public/js/*.js',
				'node_modules/power-assert/build/power-assert.js',
				'node_modules/sinon/pkg/sinon.js',
				'src/test/**/*.js'
			]
		},
		copy: [{
			from: 'src/lib/**/*',
			to: 'public/lib'
		},
		{
			from: 'src/images/**/*',
			to: 'public/img'
		}]
	}
};