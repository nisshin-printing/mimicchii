'use strict';

/**
 * スクリプトタスク
 * JSファイルをwebpackを使ってコンパイルして出力する
 */

let gulp = require('gulp'),
	config = require('../config'),
	$ = require('./plugins'),

gulp.task('preJs', () => {
	return gulp.src(config.path.preJs.src)
		.pipe($.plumber({
			errorHandler: $.notify.onError('<%= error.message %>')
		}))
		.pipe($.sourcemaps.init())
		.pipe($.babel())
		.pipe($.sourcemaps.write(config.js.sourcemaps))
		.pipe($.uglify())
		.pipe($.rename({
			extname: '.min.js'
		}))
		.pipe(gulp.dest(config.path.preJs.dest))
		.pipe($.browser.reload({stream: true}));
});

gulp.task('srcJs', () => {
	return gulp.src(config.path.srcJs.src)
		.pipe($.plumber({
			errorHandler: $.notify.onError('<%= error.message %>')
		}))
		.pipe($.sourcemaps.init())
		.pipe($.babel())
		.pipe($.concat('vendor.js'))
		.pipe($.sourcemaps.write(config.js.sourcemaps))
		.pipe($.uglify())
		.pipe($.rename({
			extname: '.min.js'
		}))
		.pipe(gulp.dest(config.path.srcJs.dest))
		.pipe($.browser.reload({stream: true}));
});