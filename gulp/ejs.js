'use strict';
/**
 * EJS タスク
 * EJSで作られたファイルを指定ディレクトリにコンパイルして出力
 */
let gulp   = require('gulp'),
	config = require('../config'),
	$      = require('./plugins');

gulp.task('ejs', () => {
	return gulp.src(config.path.ejs.src)
		.pipe($.plumber({
			errorHandler: $.notify.onError('<%= error.message %>')
		}))
		.pipe($.ejs(config.ejs, {ext: '.html'}))
		.pipe(gulp.dest(config.path.ejs.dest))
		.pipe($.browser.stream());
});