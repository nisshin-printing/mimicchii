{
	'use strict';
	// Save cookie.
	let cName = 'lastVisit=',
		cDays = 365,
		now = new Date(),
		days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Saturday'),
		year = now.getFullYear(),
		month = now.getMonth() + 1,
		date = now.getDate(),
		day = now.getDay(),
		hours = now.getHours(),
		minutes = now.getMinutes(),
		seconds = now.getSeconds(),
		aDay = year + '-' + month + '-' + date + '(' + days[day] + ')' + hours + ':' + minutes + ':' + seconds,
		prd,
		esDay,
		cCookie,
		str,
		end,
		lastTime;
	
	function saveCookie() {
		now.setTime(now.getTime() + cDays * 1000 * 24 * 3600);
		prd = now.toGMTString();
		document.cookie = cName + escape(aDay); + ';expires=' + prd;
	}
	
	// Read cookie.
	cName = 'lastVisit=';
	cCookie = document.cookie + ';';
	str = cCookie.indexOf(cName);
	if (str !== -1) {
		end = cCookie.indexOf(';', str);
		lastTime = unescape(cCookie.substring(str + cName.length, end));
		console.log('You\'ve visited the "dtdsh.com" at the end is ' + lastTime + '.');
		saveCookie();
	} else {
		console.log('You\'ve visited for the first time "dtdsh.com".');
		saveCookie();
	}
}