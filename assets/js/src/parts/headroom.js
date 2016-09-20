let Headroom = require('../vendor/headroom');

// Headroom.js
let headerMain = {
	ele: {
		background: document.querySelector('#header-main .js-header-background'),
		container: document.querySelector('#header-main .js-header-container'),
		nav: document.querySelector('#header-main .js-header-nav')
	},
	options: {
		classes: {
			initial: 'js-headroom',
			pinned: 'is-pinned',
			unpinned: 'is-unpinned',
			top: 'is-top',
			notTop: 'is-not-top'
		}
	}
};
let headroomContainer = new Headroom(headerMain.ele.container, headerMain.options),
	headroomBackground = new Headroom(headerMain.ele.background, headerMain.options),
	headroomNav = new Headroom(headerMain.ele.nav, headerMain.options);
if (window.matchMedia("(max-width: 1023px)").matches) {
	headroomBackground.destroy();
	headroomNav.destroy();
	headroomContainer.init();
} else if (window.matchMedia("(min-width: 1024px)").matches) {
	headroomContainer.destroy();
	headroomBackground.init();
	headroomNav.init();
}