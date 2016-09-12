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
				'assets/sass/',
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
	styleguide: {
		css: '../../css/style.css',
		script: '../../js/dtdsh-app.js',
		out: 'public/styleguide',
		clean: true
	},
	server: {
		src: '**/*',
		url: 'dtdsh.dev/'
	},
	path: {
		php: {
			src: '**/*.scss'
		},
		style: {
			src: ['assets/sass/**/*.scss', '!assets/sass/**/_*.scss'],
			watch: ['assets/sass/**/*.scss'],
			dest: 'assets/css'
		},
		svg: {
			src: 'assets/svg/icon/*.svg',
			watch: ['assets/svg/*'],
			dest: 'assets/svg',
		},
		js: {
			src: ['assets/js/**/*.js'],
			watch: ['assets/js/**/*.js'],
			dest: 'assets/js'
		},
		image: {
			src: 'assets/img/src',
			dest: 'assets/img/'
		}
	}
};