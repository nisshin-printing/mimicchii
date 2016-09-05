'use strict';
/**
 * clean タスク
 * 指定されたディレクトリ以下を全て削除する
 */
let gulp = require('gulp'),
	del = require('del'),
	config = require('../config');

gulp.task('clean', (callback) => {
	del.sync([config.dist]);
	callback();
});