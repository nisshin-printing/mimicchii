'use strict';
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
		url: 'dtdsh.dev/'
	},
	path: {
		php: {
			watch: '**/*.php'
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
		preJs: {
			src: ['assets/js/pre-compress/**/*.js'],
			watch: ['assets/js/pre-compress/**/*.js'],
			dest: 'assets/js'
		},
		srcJs: {
			src: ['assets/js/src/**/*.js'],
			watch: ['assets/js/src/**/*.js'],
			dest: 'assets/js'
		},
		image: {
			src: 'assets/img/src/**/*',
			watch: 'assets/img/src/**/*',
			dest: 'assets/img/'
		}
	}
};