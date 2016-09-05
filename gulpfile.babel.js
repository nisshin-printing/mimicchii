'use strict';

let gulp = require('gulp'),
	runSequence = require('run-sequence');

// タスクの読み込み
let tasks = require('./gulp/load'),
	config = require('./config');

/**
 * 監視タスク
 */
gulp.task('watch', () => {
	gulp.watch(config.path.php.watch, ['reload']);
	gulp.watch(config.path.style.watch, ['style']);
	gulp.watch(config.path.js.watch, ['js']);
	gulp.watch(config.path.svg.watch, ['svg']);
	gulp.watch(config.path.img.watch, ['img']);
	gulp.watch(config.path.es6.src, ['babel']);
	
	var copyWatches = [];
	// 複製タスクはループで回して監視対象とする
	if (config.path.copy) {
		config.path.copy.forEach((src) => {
			copyWatches.push(src.from);
		});
		gulp.watch(copyWatches, ['copy']);
	}
});

/**
 * build タスク
 */
gulp.task('build', ['clean'], (callback) => {
	return runSequence(['ejs', 'script', 'style', 'copy'], callback);
});

/**
 * production タスク
 */
gulp.task('production', (callback) => {
	config.IS_PRODUCTION = true;
	return runSequence('build', callback);
});

/**
 * default タスク
 */
var defaultTasks = ['server','watch'];
if (config.autoTest) {
	defaultTasks.push('watchTest');
}
gulp.task('default', () => {
	return runSequence(defaultTasks);
});