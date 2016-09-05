'use strict';
/**
 * 複製タスク
 * 指定されたファイルを指定されたディレクトリに複製
 */
let gulp = require('gulp'),
	ms = require('merge-stream'),
	config = require('../config'),
	$ = require('./plugins');

gulp.task('copy', () => {
	let files = config.path.copy || [],
		stream = ms();
	files.forEach((file) => {
		let st = gulp.src(file.from)
			.pipe(gulp.dest(file.to));
		stream.add(st);
	});
	stream.on('end', () => {
		$.browser.stream();
	});
	return stream;
});