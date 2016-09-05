'use strict';
/*
 * ユニットテスト
 * Karmaを使ってユニットテストを実行
 */

let gulp = require('gulp'),
	Server = require('karma').Server;
const CONFILE = process.cwd() + '/karma.conf.js';

gulp.task('test', (callback) => {
	let server = new Server({
		configFile: CONFILE,
		singleRun: true,
		autoWatch: false
	});
	server.start(callback);
});

gulp.task('watchTest', () => {
	let server = new Server({
		configFile: CONFILE,
		singleRun: false,
		autoWatch: true
	});
	server.start();
});