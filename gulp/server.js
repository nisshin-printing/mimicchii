'use strict';
/**
 * サーバ起動タスク
 */
let gulp = require('gulp'),
	merge = require('merge'),
	rewrite = require('connect-modrewrite'),
	config = require('../config'),
	$ = require('./plugins');

gulp.task('server', () => {
	let options = merge(config.server, {
		server: {
			baseDir: config.dist,
			directory: false,
			middleware: [
				rewrite([
					'^[^\\.]*$ /index.html [L]'
				])
			]
		},
		notify: false
	});
	if (options.proxy) {
		delete options.server;
	}
	return $.browser(options);
});
gulp.task('reload', () => {
	$.browser.reload();
});