'use strict';
/*
 * style タスク
 * SCSSをコンパイルしてAutoprefixerにかける。
 */
let gulp = require('gulp'),
	config = require('../config'),
	$ = require('./plugins');

gulp.task('style', () => {
	return gulp.src(config.path.style.src)
		.pipe($.plumber({
			errorHandler: $.notify.onError('<%= error.message %>')
		}))
		.pipe($.sassLint())
		.pipe($.sassLint.format())
		.pipe($.sassLint.failOnError())
		.pipe($.if(!config.IS_PRODUCTION, $.sourcemaps.init()))
		.pipe($.sass(config.style.sass))
		.pipe($.autoprefixer(config.style.autoprefixer))
		.pipe($.if(!config.IS_PRODUCTION, $.sourcemaps.write(config.style.soucemaps)))
		.pipe($.cssmin())
		.pipe(gulp.dest(config.path.style.dest))
		.pipe($.browser.stream({match: '**/*.css'}));
});