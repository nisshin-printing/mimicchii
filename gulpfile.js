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
	gulp.watch(config.path.preJs.watch, ['preJs']);
	gulp.watch(config.path.srcJs.watch, ['srcJs']);
	gulp.watch(config.path.svg.watch, ['svg', 'svg2png']);
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
var defaultTasks = ['server', 'watch'];
gulp.task('default', () => {
	return runSequence(defaultTasks);
});