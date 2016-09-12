'use strict';
/**
 * サーバ起動タスク
 */
let gulp = require('gulp'),
	config = require('../config'),
	$ = require('./plugins');

gulp.task('server', () => {
	$.browser({
		server: {
			proxy: config.server.proxy
		}
	});
});
gulp.task('reload', () => {
	$.browser.reload();
});