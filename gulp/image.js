'use strict';

/**
 * Image圧縮
 */
let gulp = require('gulp'),
	config = require('../config'),
	$ = require('./plugins'),
	imagemin = require('imagemin-pngquant');

gulp.task('image', () => {
	return gulp.src(config.path.image.src)
		.pipe(imagemin())
		.pipe(gulp.dest(config.path.image.dest));
});