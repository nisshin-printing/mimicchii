'use strict';

/**
 * スクリプトタスク
 * JSファイルをwebpackを使ってコンパイルして出力する
 */

let gulp = require('gulp'),
	config = require('../config'),
	$ = require('./plugins'),
	webpack = require('webpack');

gulp.task('webpack', () => {
	return gulp.src(config.path.js.src)
		.pipe($.webpack({
			entry: {
				app: 'assets/js/src/dtdsh-app.js',
				prefetch: 'assets/js/src/prefetch-onload.js',
			},
			output: {
				filename: '[name].js'
			},
			resolve: {
				modulesDirectories: [
					'node_modules',
					'assets/js/src'
				]
			},
			module: {
				preLoaders: [
					{
						test: /\.js$/,
						exclude: /Spec\.js$/i,
						loaders: ['eslint']
					}
				],
				loaders: [{
					test: /Spec\.js$/i,
					exclude: /node_modules/,
					loaders: ['webpack-espower', 'babel']
				}]
			},
			plugins: [
				
			]
		}, webpack))
		.pipe($.uglify())
		.pipe(gulp.dest(config.path.js.dest));
});