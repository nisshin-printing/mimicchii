(function(document) {
	var servers = [
		/* google */
		'maps.googleapis.com',
		'apis.google.com',
		'maps.gstatic.com',
		'ssl.gstatic.com',
		'csi.gstatic.com',
		'fonts.gstatic.com',
		's.ytimg.com',
		'www.youtube.com',
		'www.google.com',
		'www.google-analytics.com',
		'www.googleadservices.com',
		'fonts.googleapis.com',
		'www.google.co.jp',
		'accounts.google.com',
		'www.googletagmanager.com',
		'yt3.ggpht.com',
		'lh3.googleusercontent.com',
		'lh4.googleusercontent.com',
		'googleads.g.doubleclick.net',
		'stats.g.doubleclick.net',

		/* facebook */
		'static.xx.fbcdn.net',
		'scontent.xx.fbcdn.net',
		'external.xx.fbcdn.net',
		'www.facebook.com',
		'staticxx.facebook.com',
		'connect.facebook.net',
		'graph.facebook.com',

		/* SNSカウント Json */
		'uh.nakanohito.jp',
		'urlsapi.azurewebsites.net',

		/* hatena */
		'cdn.api.b.hatena.ne.jp',
		'api.b.hatena.ne.jp',

		/* MyBestPro */
		'mbp-hiroshima.com',

		// CDN
		'cdn.jsdelivr.net',
		'maxcdn.bootstrapcdn.com',

		// Jetpack - Photon
		'i0.wp.com',
		'i1.wp.com',
		'i2.wp.com',
	], i, e, link = document.createDocumentFragment();

	for (i = servers.length-1; i >= 0; i--) {
		e = document.createElement('link');
		e.setAttribute('rel', 'dns-prefetch');
		e.setAttribute('href', '//' + servers[i]);
		link.appendChild(e);
	}

	document.getElementsByTagName('head')[0].appendChild(link);
}(document));