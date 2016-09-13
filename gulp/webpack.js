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
				app: './assets/js/src/dtdsh-app.js',
				prefetch: './assets/js/src/prefetch-onload.js',
			},
			output: {
				filename: '[name].min.js'
			},
			resolve: {
				modulesDirectories: ['node_modules'],
				alias: {
					npm: 'node_modules',
					Foundation: '../node_modules/foundation-sites/dist/foundation.js',
					svg4everybody: '../node_modules/svg4everybody/dist/svg4everybody.js'
				}
			},
			module: {
				preLoaders: [{
					test: /\.js$/,
					exclude: /Spec\.js$/i,
					loaders: ['eslint']
				}],
				loaders: [{
					test: /Spec\.js$/i,
					exclude: /node_modules/,
					loaders: ['webpack-espower', 'babel']
				}]
			},
			plugins: [
				new webpack.optimize.DedupePlugin(),
				new webpack.optimize.AggressiveMergingPlugin(),
				new webpack.ProvidePlugin({
					jQuery: 'jquery',
					$: 'jquery',
					jquery: 'jquery'
				}),
				new webpack.optimize.UglifyJsPlugin({ minimize: true })
			]
		}))
		.pipe(gulp.dest(config.path.js.dest))
		.pipe($.browser.reload({stream: true}));
});