'use strict';

/**
 * スクリプトタスク
 * JSファイルをwebpackを使ってコンパイルして出力する
 */

let gulp = require('gulp'),
	config = require('../config'),
	$ = require('./plugins');

gulp.task('babel', () => {
	return gulp.src(config.path.es6.src)
		.pipe($.babel())
		.pipe(gulp.dest(config.path.js.dest));
});