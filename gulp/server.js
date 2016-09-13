'use strict';
/**
 * サーバ起動タスク
 */
let gulp = require('gulp'),
	config = require('../config'),
	$ = require('./plugins');

gulp.task('server', () => {
	$.browser({
		proxy: config.server.url
	});
});
gulp.task('reload', () => {
	$.browser.reload();
});