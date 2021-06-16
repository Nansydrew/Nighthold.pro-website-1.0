(function(f){if(typeof exports==="object"&&typeof module!=="undefined"){module.exports=f()}else if(typeof define==="function"&&define.amd){define([],f)}else{var g;if(typeof window!=="undefined"){g=window}else if(typeof global!=="undefined"){g=global}else if(typeof self!=="undefined"){g=self}else{g=this}g.navbar = f()}})(function(){var define,module,exports;return (function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
/*
 * classList.js: Cross-browser full element.classList implementation.
 * 1.1.20160811
 *
 * By Eli Grey, http://eligrey.com
 * License: Dedicated to the public domain.
 *   See https://github.com/eligrey/classList.js/blob/master/LICENSE.md
 */
/*! @source http://purl.eligrey.com/github/classList.js/blob/master/classList.js */
(function (win) {
	"use strict";
	if (!("document" in win)) return;
	// Full polyfill for browsers with no classList support
	// Including IE < Edge missing SVGElement.classList
	if (!("classList" in document.createElement("_"))
		|| document.createElementNS && !("classList" in document.createElementNS("http://www.w3.org/2000/svg", "svg").appendChild(document.createElement("g")))) {
		if (!('Element' in win)) return;
		var classListProp = "classList"
			, protoProp = "prototype"
			, elemCtrProto = win.Element[protoProp]
			, objCtr = Object
			, strTrim = String[protoProp].trim || function () {
					return this.replace(/^\s+|\s+$/g, "");
				}
			, arrIndexOf = Array[protoProp].indexOf || function (item) {
					var
						i = 0
						, len = this.length
						;
					for (; i < len; i++) {
						if (i in this && this[i] === item) {
							return i;
						}
					}
					return -1;
				}
		// Vendors: please allow content code to instantiate DOMExceptions
			, DOMEx = function (type, message) {
				this.name = type;
				this.code = DOMException[type];
				this.message = message;
			}
			, checkTokenAndGetIndex = function (classList, token) {
				if (token === "") {
					throw new DOMEx(
						"SYNTAX_ERR"
						, "An invalid or illegal string was specified"
					);
				}
				if (/\s/.test(token)) {
					throw new DOMEx(
						"INVALID_CHARACTER_ERR"
						, "String contains an invalid character"
					);
				}
				return arrIndexOf.call(classList, token);
			}
			, ClassList = function (elem) {
				var
					trimmedClasses = strTrim.call(elem.getAttribute("class") || "")
					, classes = trimmedClasses ? trimmedClasses.split(/\s+/) : []
					, i = 0
					, len = classes.length
					;
				for (; i < len; i++) {
					this.push(classes[i]);
				}
				this._updateClassName = function () {
					elem.setAttribute("class", this.toString());
				};
			}
			, classListProto = ClassList[protoProp] = []
			, classListGetter = function () {
				return new ClassList(this);
			}
			;
		// Most DOMException implementations don't allow calling DOMException's toString()
		// on non-DOMExceptions. Error's toString() is sufficient here.
		DOMEx[protoProp] = Error[protoProp];
		classListProto.item = function (i) {
			return this[i] || null;
		};
		classListProto.contains = function (token) {
			token += "";
			return checkTokenAndGetIndex(this, token) !== -1;
		};
		classListProto.add = function () {
			var
				tokens = arguments
				, i = 0
				, l = tokens.length
				, token
				, updated = false
				;
			do {
				token = tokens[i] + "";
				if (checkTokenAndGetIndex(this, token) === -1) {
					this.push(token);
					updated = true;
				}
			}
			while (++i < l);
			if (updated) {
				this._updateClassName();
			}
		};
		classListProto.remove = function () {
			var
				tokens = arguments
				, i = 0
				, l = tokens.length
				, token
				, updated = false
				, index
				;
			do {
				token = tokens[i] + "";
				index = checkTokenAndGetIndex(this, token);
				while (index !== -1) {
					this.splice(index, 1);
					updated = true;
					index = checkTokenAndGetIndex(this, token);
				}
			}
			while (++i < l);
			if (updated) {
				this._updateClassName();
			}
		};
		classListProto.toggle = function (token, force) {
			token += "";
			var
				result = this.contains(token)
				, method = result ?
				force !== true && "remove"
					:
				force !== false && "add"
				;
			if (method) {
				this[method](token);
			}
			if (force === true || force === false) {
				return force;
			} else {
				return !result;
			}
		};
		classListProto.toString = function () {
			return this.join(" ");
		};
		if (objCtr.defineProperty) {
			var classListPropDesc = {
				get: classListGetter
				, enumerable: true
				, configurable: true
			};
			try {
				objCtr.defineProperty(elemCtrProto, classListProp, classListPropDesc);
			} catch (ex) { // IE 8 doesn't support enumerable:true
				if (ex.number === -0x7FF5EC54) {
					classListPropDesc.enumerable = false;
					objCtr.defineProperty(elemCtrProto, classListProp, classListPropDesc);
				}
			}
		} else if (objCtr[protoProp].__defineGetter__) {
			elemCtrProto.__defineGetter__(classListProp, classListGetter);
		}
	} else {
		// There is full or partial native classList support, so just check if we need
		// to normalize the add/remove and toggle APIs.
		var testElement = document.createElement("_");
		testElement.classList.add("c1", "c2");
		// Polyfill for IE 10/11 and Firefox <26, where classList.add and
		// classList.remove exist but support only one argument at a time.
		if (!testElement.classList.contains("c2")) {
			var createMethod = function (method) {
				var original = DOMTokenList.prototype[method];
				DOMTokenList.prototype[method] = function (token) {
					var i, len = arguments.length;
					for (i = 0; i < len; i++) {
						token = arguments[i];
						original.call(this, token);
					}
				};
			};
			createMethod('add');
			createMethod('remove');
		}
		testElement.classList.toggle("c3", false);
		// Polyfill for IE 10 and Firefox <24, where classList.toggle does not
		// support the second argument.
		if (testElement.classList.contains("c3")) {
			var _toggle = DOMTokenList.prototype.toggle;
			DOMTokenList.prototype.toggle = function (token, force) {
				if (1 in arguments && !this.contains(token) === !force) {
					return force;
				} else {
					return _toggle.call(this, token);
				}
			};
		}
		testElement = null;
	}
}(typeof window !== "undefined" ? window : {}));

// requestAnimationFrame polyfill by Erik M�ller. fixes from Paul Irish and Tino Zijdel
// MIT license
(function () {
	var lastTime = 0;
	var vendors = ['ms', 'moz', 'webkit', 'o'];
	for (var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x) {
		window.requestAnimationFrame = window[vendors[x] + 'RequestAnimationFrame'];
		window.cancelAnimationFrame = window[vendors[x] + 'CancelAnimationFrame']
			|| window[vendors[x] + 'CancelRequestAnimationFrame'];
	}
	if (!window.requestAnimationFrame) {
		window.requestAnimationFrame = function (callback, element) {
			var currTime = new Date().getTime();

			function call() {
				callback(currTime + timeToCall);
			}

			var timeToCall = Math.max(0, 16 - (currTime - lastTime));
			lastTime = currTime + timeToCall;
			return window.setTimeout(call, timeToCall);
		};
	}
	if (!window.cancelAnimationFrame) {
		window.cancelAnimationFrame = function (id) {
			clearTimeout(id);
		};
	}
}());

},{}],2:[function(require,module,exports){
var Navbar = {
	TICK_MULTIPLIER: 1 / Math.cos(Math.PI / 4),  // Width multiplier for CSS rotated "tick mark" element = 1 / cos(45deg)
	DEFAULT_ANIMATION_DURATION: 200,             // 200ms, duration of most CSS animations for sync purposes
	DEFAULT_POPUP_DELAY: 1000,                   // 1s, delay before we check for promotions
	MAX_PROMOTION_LENGTH: 100,                   // 100 characters, max length of promotion popup body text

	MAX_NUM_GAMES_PER_ROW: 8,										 // max number of games per row in games dropdown, used for size calculations
	MARGIN_BETWEEN_GAMES: 20,										 // 20 pixels, amount of spacing between each game poster

	KEY_PROMOTIONS_READ: 'NavbarPromotionsRead', // Local storage key for read promotion IDs
	KEY_COOKIES_AGREED: 'CookiesAgreed',   			 // Local storage key indicating that EU user has acknowledged cookies

	DATA_PROMOTION_ID: 'data-promotion-id',      // Attribute key for promotion popup ID

	EXTERNAL_EVENTS: {
		CLOSE_ALL_MENUS: 'navbarCloseAllMenus',		 // Event that consuming apps can dispatch to close Navbar modals
		UPDATE_LOGIN_URL:'updateLoginUrl'					 // Event that consuming apps can dispatch to update the Login endpoint e.g /login?redirect=http://targetUrl
	},
	MODE_SIMPLE: 'simple',
	MODE_COMPACT: 'compact',
	MODE_DEFAULT: 'default',
	WINDOW_LOAD_EVENT: 'load',

	DURATION_LOAD_DELAY: 500,										 // Duration to wait on the onLoad event

	viewportWidth: 0,
	viewportWidthFooter: 0,
	loadTimeoutId: null,
	lastUpdateTimestamp: 0,
	lastFooterUpdateTimestamp: 0,

	getCurrentMode: function() {
		var root = document.querySelector('.Navbar');

		if (!root) { return 'default'; }

		if (root.classList.contains('is-compact')) {
			return Navbar.MODE_COMPACT;
		} else if (root.classList.contains('is-simple')) {
			return Navbar.MODE_SIMPLE;
		} else {
			return Navbar.MODE_DEFAULT;
		}
	},

	calcViewportWidth: function() {
		return Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
	},

	/**
	 * Initialize the specified Navbar instance
	 */
	init: function (root) {
		if (root.classList.contains('is-disabled')) return;

		// Register root click handler
		root.addEventListener('click', Navbar.rootClickHandler.bind(root));

		// Close all modals when a click is registered on the transparent overlay behind the navbar
		Navbar.forEach(root.querySelectorAll('.Navbar-overlay'), function (overlay) {
			overlay.addEventListener('click', Navbar.closeModals.bind(root));
		});

		// Close all modals on window resize
		window.addEventListener('resize', Navbar.resize.bind(root));

		// Setup listeners for all External events
		Navbar.setupExternalEventListeners(root);

		// Add close handler for all modal panels
		Navbar.forEach(root.querySelectorAll('.Navbar-modalToggle'), function (toggle) {
			toggle.addEventListener('click', Navbar.toggleModal.bind({
				root: root,
				toggle: toggle
			}));
		});

		// Add event handlers for mobile slideout menus
		Navbar.forEach(root.querySelectorAll('.Navbar-modal'), function (modal) {
			if (modal.classList.contains('is-animated')) {
				modal.addEventListener('animationend', Navbar.setModalDisplayStateAfterAnimation.bind(modal));
				modal.addEventListener('transitionend', Navbar.setModalDisplayStateAfterAnimation.bind(modal));
			}
			Navbar.forEach(modal.querySelectorAll('.Navbar-modalClose, .Navbar-modalCloseGutter'), function (closer) {
				closer.addEventListener('click', Navbar.toggleModal.bind({
					root: root,
					target: modal
				}));
			});
		});

		// Add expandable toggles for mobile menu options
		Navbar.forEach(root.querySelectorAll('.Navbar-expandable'), function (expandable) {
			expandable.querySelector('.Navbar-expandableToggle').addEventListener('click', Navbar.toggleExpandable.bind(root, expandable));
		});

		// If in AJAX mode, get auth data from local webapp endpoint
		if (root.hasAttribute('data-ajax')) {
			Navbar.authenticate(root);
		}

		// Check for promotional notifications
		setTimeout(
			function() {
				Navbar.showCookieCompliance(root);
				Navbar.checkPromotions.call(Navbar, root);
			},
			Navbar.DEFAULT_POPUP_DELAY
		);

		// Check support ticket count immediately if we're already authenticated via webapp
		if (root.classList.contains('is-authenticated')) {
			if (root.getAttribute('data-notification-count')) {
				Navbar.setSupportNotificationCount.call(Navbar, root, {total: parseInt(root.getAttribute('data-notification-count'))});
			} else {
				Navbar.checkSupportNotifications(root);
			}
		}

		// Highlight "current site" top nav element if it exists
		var currentSite = root.getAttribute('data-current-site');
		if (currentSite) {
			var current = root.querySelector('.Navbar-desktop .Navbar-item[data-name="' + currentSite + '"]');
			if (current) {
				current.classList.add('is-current');
			}
		}

		// iOS scroll fix
		var userAgent = navigator.userAgent.toLowerCase();
		var isIOS = userAgent.indexOf('iphone') >= 0 || userAgent.indexOf('ipad') >= 0;
		if (isIOS) {
			root.addEventListener('touchmove', Navbar.touchMoveHandler);
			root.addEventListener('touchend', Navbar.touchEndHandler);
			Navbar.forEach(root.querySelectorAll('.Navbar-accountModal .Navbar-modalContent, .Navbar-siteMenu .Navbar-modalContent'), function (content) {
				Navbar.forEach(content.querySelectorAll('a, .Navbar-expandableToggle'), function (clickable) {
					clickable.addEventListener('click', Navbar.touchClickHandler);
				});
			});
		}

	},

	initFooter: function (footer) {
		// Conditional on selector being enabled
		if (footer.querySelector('.NavbarFooter-selector')) {
			// Click handler for toggling locale selector
			var selectorToggle = footer.querySelector('.NavbarFooter-selectorToggle');
			if (selectorToggle) {
				selectorToggle.addEventListener('click', Navbar.toggleLocaleSelector.bind(footer));
			}

			// Click handler for locale selector close anchor (mobile)
			var selectorCloser = footer.querySelector('.NavbarFooter-selectorCloserAnchor');
			if (selectorCloser) {
				selectorCloser.addEventListener('click', Navbar.closeLocaleSelector.bind(footer));
			}

			// Close locale selector if overlay gets clicked
			var selectorOverlay = footer.querySelector('.NavbarFooter-overlay');
			if (selectorOverlay) {
				selectorOverlay.addEventListener('click', Navbar.closeLocaleSelector.bind(footer));
			}

			// Close locale selector on window resize
			window.addEventListener('resize', Navbar.resizeFooter.bind(footer));

			// If in hybrid or region-limited mode, add event handler for region switching
			if (footer.classList.contains('is-region-limited') || footer.classList.contains('is-region-hybrid')) {
				Navbar.forEach(footer.querySelectorAll('.NavbarFooter-selectorRegion:not(.is-external)'), function (link) {
					link.addEventListener('click', Navbar.changeFooterRegionLimit.bind(footer, link));
				});
			}

			// If in AJAX mode, get legal data from local webapp endpoint
			if (footer.hasAttribute('data-ajax-mode')) {
				Navbar.getLegal(footer);
			}
		}
	},

	updateNavbar: function (root, timestamp) {
		if (timestamp > Navbar.lastUpdateTimestamp) {
			Navbar.lastUpdateTimestamp = timestamp;
			var width = Navbar.calcViewportWidth();
			if (width === Navbar.viewportWidth) {
				return;
			}
			Navbar.viewportWidth = width;
			if (root && root.classList.contains('is-focused')) {
				Navbar.closeModals.call(root);
			}
			Navbar.testForOverlappingElementsAndSwitchToCollapsed();
		}
	},

	resize: function () {
		var _this = this;
		requestAnimationFrame(
			function(timestamp) {
				Navbar.updateNavbar(_this, timestamp);
			}
		);
	},
	setupExternalEventListeners: function (root) {
		for (var eventKey in Navbar.EXTERNAL_EVENTS) {
			window.addEventListener(Navbar.EXTERNAL_EVENTS[eventKey], Navbar.handleExternalEvent.bind(root));
		}
	},
	handleExternalEvent: function (event) {
		switch(event.type){
			case Navbar.EXTERNAL_EVENTS.CLOSE_ALL_MENUS:
				Navbar.closeModals.call(this);
			break;
			case Navbar.EXTERNAL_EVENTS.UPDATE_LOGIN_URL:
				Navbar.updateLoginUrl.call(this, event);
			break;
		}
	},
	testForOverlappingElementsAndSwitchToCollapsed: function() {
		var navbarItems = document.querySelector('.Navbar-desktop .Navbar-items');

		// Early bailout if the Mobile header is displaying.
		if (!navbarItems || navbarItems.offsetHeight == 0) {
			return;
		}

		var collapsedItems = document.querySelector('.Navbar-collapsedItems');
		if (collapsedItems) {
			if (Navbar.useCollapsedDesktop(navbarItems)) {
				navbarItems.classList.add('is-visible');
				collapsedItems.classList.remove('is-hidden');
			} else {
				navbarItems.classList.remove('is-visible');
				collapsedItems.classList.add('is-hidden');
			}
		}
	},
	useCollapsedDesktop: function (navbarItemsDiv) {
		var profileItemsRect = document.querySelector('.Navbar-desktop .Navbar-profileItems').getBoundingClientRect();
		var navbarItemsRect = navbarItemsDiv.getBoundingClientRect();
		var viewportWidth = Navbar.calcViewportWidth();
		var widthOfNavItems = navbarItemsRect.right;
		var widthOfAccountMenu = viewportWidth - profileItemsRect.left;
		var totalWidth = widthOfNavItems + widthOfAccountMenu;

		var isOverlapping = totalWidth >= viewportWidth;
		return isOverlapping;
	},

	/**
	 * Root tag click handler
	 */
	rootClickHandler: function () {
		// Close promotion popup if open
		var promo = this.querySelector('.Navbar-promotion.is-open');
		if (promo) Navbar.dismissPromotion.call(promo);
	},

	// Handlers for iOS scroll fix
	touchMoving: false,
	touchMoveHandler: function () {
		Navbar.touchMoving = true;
	},
	touchEndHandler: function () {
		Navbar.touchMoving = false;
	},
	touchClickHandler: function (event) {
		if (Navbar.touchMoving) {
			event.stopPropagation();
			event.preventDefault();
			return false;
		}
	},

	/**
	 * Toggle a modal section (dropdowns, slide-out menus, etc)
	 */
	toggleModal: function (event) {
		var toggle = this.toggle;
		var target = toggle ? toggle.getAttribute('data-target') : null;
		// The trigger is for a specific site mode (compact, etc); need to evaluate Navbar mode
		var evalSiteMode = toggle ? toggle.getAttribute('data-site-mode') : null;
		var navbarMode = Navbar.getCurrentMode();
		var isActive = false;
		Navbar.forEach(this.root.querySelectorAll('.Navbar-modal'), function (modal) {
			var toggle = this.toggle;
			var isCorrectMode = !evalSiteMode || modal.getAttribute('data-' + navbarMode + '-mode');

			if ((modal === this.target || modal.classList.contains(target)) && isCorrectMode) {
				// toggle targeted modal
				if (Navbar.isOpen(modal)) {
					Navbar.close(modal);
					if (modal.classList.contains('is-scroll-blocking')) {
						Navbar.unblockScrolling();
					}
					if (toggle) toggle.classList.remove('is-active');
				} else {
					Navbar.open(modal);
					if (modal.classList.contains('is-scroll-blocking')) {
						Navbar.blockScrolling();
					}

					if (toggle) toggle.classList.add('is-active');
					// sync tick mark
					var tick = modal.querySelector('.Navbar-tick');
					if (tick) {
						tick.style.left = '';
						var anchor = toggle.querySelector('.Navbar-dropdownIcon');
						if (!anchor || anchor.offsetLeft === 0) {
							anchor = toggle.querySelector('.Navbar-label');
						}
						if (!anchor || anchor.offsetLeft === 0) {
							anchor = toggle;
						}
						// align tick mark with dropdown arrow (or label if arrow isn't present)
						var diff = Navbar.setTickOffset(anchor, tick);

						// adjust opacity to match gradient if unconstrained
						if (!modal.classList.contains('is-constrained')) {
							var midpoint = modal.offsetWidth / 2;
							var adj = diff > midpoint ? diff - midpoint : midpoint - diff;
							var tan = modal.offsetHeight / midpoint;
							var angle = Math.atan(tan);
							var max = midpoint / Math.cos(angle);
							tick.querySelector('.Navbar-tickInner').style.opacity = adj / max;
						}
					}
					isActive = true;
				}
			} else {
				// close all other modals
				Navbar.close(modal);

				Navbar.forEach(this.root.querySelectorAll('.Navbar-modalToggle[data-name="' + modal.getAttribute('data-toggle') + '"]'), function (toggle) {
					toggle.classList.remove('is-active');
				});
			}
		}.bind(this));

		// Fade out other toggles
		Navbar.forEach(this.root.querySelectorAll('.Navbar-item'), function (modalToggle) {
			if (isActive) {
				if (modalToggle.getAttribute('data-target') === target) {
					modalToggle.classList.remove('is-faded');
				} else {
					modalToggle.classList.add('is-faded');
				}
			} else {
				modalToggle.classList.remove('is-faded');
			}
		}.bind(this));

		// Set focus on the root navbar tag to promote its layer
		this.root.classList.toggle('is-focused', isActive);

		// Soft dismiss promo popup if present
		Navbar.rootClickHandler.call(this.root);

		// Close all expandables
		Navbar.toggleExpandable.call(this.root);

		event.stopPropagation();
		event.preventDefault();
		return false;
	},

	/**
	 * Close all Navbar modals (dropdowns, slide-out menus, etc)
	 */
	closeModals: function () {
		Navbar.forEach((this || document).querySelectorAll('.Navbar .Navbar-item'), function (modalToggle) {
			modalToggle.classList.remove('is-active');
			modalToggle.classList.remove('is-faded');
		});

		Navbar.forEach((this || document).querySelectorAll('.Navbar .Navbar-modal.is-open'), function (modal) {
			Navbar.close(modal);
		});

		if (this && this.classList) {
			this.classList.remove('is-focused');
		} else {
			Navbar.forEach(document.querySelectorAll('.Navbar'), function (navbar) {
				navbar.classList.remove('is-focused');
			});
		}

		// Close all expandables
		if (this) Navbar.toggleExpandable.call(this);

		Navbar.unblockScrolling();
	},

	/**
	 * Changes the login 'a href' to the parameter specified in CustomeEvent.detail
	 * Useful when page is switching and we want to redirect the user to the current page
	 */
	updateLoginUrl: function(event) {
		Navbar.forEach( (this || document).querySelectorAll('div.Navbar-accountDropdownLoggedOut > div > a'), function(anchor) {
			anchor.href=event.detail;
  	});
	},

	isOpen: function (element) {
		return element.classList.contains('is-open');
	},
	open: function (element) {
		element.classList.add('is-open');
	},
	close: function (element) {
		element.classList.remove('is-open');
	},
	blockScrolling: function () {
		document.body.classList.add('Navbar-blockScrolling');
	},
	unblockScrolling: function () {
		document.body.classList.remove('Navbar-blockScrolling');
	},
	/**
	 * Set appropriate display value for modal after animating/transitioning
	 */
	setModalDisplayStateAfterAnimation: function (event) {
		if (Navbar.isOpen(this)) {
			Navbar.showModal(this);
		} else {
			Navbar.hideModal(this);
		}

		event.stopPropagation();
		event.preventDefault();
		return false;
	},
	/**
	 * Helper methods for toggling modal display states
	 */
	showModal: function (modal) {
		modal.classList.add('is-displayed');
	},
	hideModal: function (modal) {
		modal.classList.remove('is-displayed');
	},

	toggleExpandable: function (trigger) {
		Navbar.forEach(this.querySelectorAll('.Navbar-expandable'), function (expandable) {
			var container = expandable.querySelector('.Navbar-expandableContainer');
			// If this is the trigger and it's not open, open it
			if (expandable == trigger && !Navbar.isOpen(expandable)) {
				if (expandable.NavbarAnimationTimeout) clearTimeout(expandable.NavbarAnimationTimeout);
				container.style.height = '0px';
				Navbar.open(expandable);
				var content = expandable.querySelector('.Navbar-expandableContent');
				container.style.height = content.offsetHeight + 'px';
			}
			// Otherwise if it's open, close it
			else {
				container.style.height = '0px';
				expandable.NavbarAnimationTimeout = setTimeout(
					function () {
						Navbar.close(expandable);
					}.bind(expandable),
					Navbar.DEFAULT_ANIMATION_DURATION
				);
			}
		});
	},

	checkDisabled: function(root) {
		return (root && root.classList && root.classList.contains('is-disabled'));
	},

	checkPromotionId: function (id) {
		if (localStorage) {
			var readPromotions = localStorage.getItem(Navbar.KEY_PROMOTIONS_READ) ? JSON.parse(localStorage.getItem(Navbar.KEY_PROMOTIONS_READ)) : {};
			return !!(readPromotions[id]);
		}
		return false;
	},
	savePromotionId: function (id) {
		if (localStorage) {
			var readPromotions = localStorage.getItem(Navbar.KEY_PROMOTIONS_READ) ? JSON.parse(localStorage.getItem(Navbar.KEY_PROMOTIONS_READ)) : {};
			readPromotions[id] = true;
			localStorage.setItem(Navbar.KEY_PROMOTIONS_READ, JSON.stringify(readPromotions));
		}
	},

	checkPromotions: function (root) {
		if (Navbar.checkDisabled(root)) return;
		var authUrl = root.getAttribute('data-notification-url');

		// No promotions while cookie compliance is on-screen
		var cookieCompliance = root.querySelector('.Navbar-cookieCompliance.is-open');
		if (cookieCompliance) {
			return;
		}

		Navbar.get(
			authUrl,
			function (res) {
				if (!res) {
					// not logged in
					return;
				}
				if (Navbar.checkDisabled(root)) return;
				var data = {};
				try {
					data = JSON.parse(res);
					var notifications = data.notifications || data.notificationsList;
					if (data.totalNotifications && notifications) {
						for (var index in notifications) {
							var notification = notifications[index];
							if (!Navbar.checkPromotionId(notification.id)) {
								var promotion = root.querySelector('.Navbar-promotion');
								Navbar.showPromotion(
									promotion,
									notification.id,
									notification.img ? notification.img.url : null,
									notification.title,
									notification.content,
									notification.httpLink ? notification.httpLink.content : '',
									notification.httpLink ? notification.httpLink.link : ''
								);
								promotion.querySelector('.Navbar-promotionLink').addEventListener('click', Navbar.setPromotionAsRead.bind(promotion));
								promotion.querySelector('.Navbar-toastClose').addEventListener('click', Navbar.dismissPromotion.bind(promotion, true));
								break;
							}
						}
					}
				} catch (err) {
					console.error(err);
				}
			},
			function (err) {
				console.error('Couldn\'t retrieve notification count', err);
			}
		);
	},
	showPromotion: function (promotion, promotionId, imageUrl, label, text, linkText, linkUrl) {
		if (promotionId) promotion.setAttribute(Navbar.DATA_PROMOTION_ID, promotionId);
		if (imageUrl) promotion.querySelector('.Navbar-promotionImage').src = imageUrl;
		if (label) promotion.querySelector('.Navbar-promotionLabel').innerHTML = label;
		if (text && typeof text === 'string') {
			text = text.trim();
			promotion.querySelector('.Navbar-promotionText').innerHTML = text;
		}
		if (linkText) promotion.querySelector('.Navbar-promotionLink').innerHTML = linkText;
		if (linkUrl) {
			var link = promotion.querySelector('.Navbar-promotionLink');
			link.href = linkUrl;
			promotion.addEventListener('click', Navbar.promotionClickHandler);
			link.addEventListener('click', Navbar.promotionLinkClickHandler.bind(promotion));
		}
		promotion.classList.add('is-open');
		promotion.addEventListener('click', Navbar.promotionClickHandler);

		// This needs to be pulled back out to replace HTML Entities with actual unicode characters.
		var labelString = promotion.querySelector('.Navbar-promotionLabel').innerHTML;
		Navbar.pushGlobalNotificationAnalyticsEvent('Open - Automatic', promotionId, labelString);
	},
	dismissPromotion: function (isHardDismiss) {
		var hideToast = Navbar.hideToast.bind(this);
		this.hideToast = hideToast;
		this.addEventListener('animationend', hideToast);
		this.classList.add('is-dismissed');

		var id = parseInt(this.getAttribute(Navbar.DATA_PROMOTION_ID));
		var label = this.querySelector('.Navbar-promotionLabel').innerHTML;
		if (isHardDismiss) {
			Navbar.setPromotionAsRead.call(this);
			event.stopPropagation();
			event.preventDefault();
		}
		Navbar.pushGlobalNotificationAnalyticsEvent(isHardDismiss ? 'Close - X' : 'Close - Background', id, label);
	},
	setPromotionAsRead: function () {
		var id = parseInt(this.getAttribute(Navbar.DATA_PROMOTION_ID));
		Navbar.savePromotionId(id);
	},
	hideToast: function () {
		if (this.hideToast) this.removeEventListener('animationend', this.hideToast);
		this.classList.remove('is-dismissed');
		this.classList.remove('is-open');
	},
	promotionClickHandler: function () {
		event.stopPropagation();
		return false;
	},
	promotionLinkClickHandler: function () {
		var id = parseInt(this.getAttribute(Navbar.DATA_PROMOTION_ID));
		var label = this.querySelector('.Navbar-promotionLabel').innerHTML;
		try {
			Navbar.pushGlobalNotificationAnalyticsEvent('Click - Button', id, label);
		} catch (err) {
			console.error(err);
		}
		return true;
	},

	showCookieCompliance: function (root) {
		var popup = root.querySelector('.Navbar-cookieCompliance');
		var showAgreement = true;

		// Not an EU site
		if (!popup) { return; }

		if (localStorage) {
			agreedMillis = localStorage.getItem(Navbar.KEY_COOKIES_AGREED);
			if (agreedMillis) {
				// Ensure previous agreement was less than 1 calendar year ago
				var oneYearAgo = new Date(new Date().setFullYear(new Date().getFullYear() - 1)).getTime();
				if (agreedMillis > oneYearAgo) {
					showAgreement = false;
				}
			}
		}

		if (showAgreement) {
			popup.classList.add('is-open');
			popup.querySelector('#cookie-compliance-agree').addEventListener('click', Navbar.dismissCookieCompliance.bind(popup));
			popup.querySelector('.Navbar-toastClose').addEventListener('click', Navbar.dismissCookieCompliance.bind(popup, true));
		}
	},
	dismissCookieCompliance: function() {
		var hideToast = Navbar.hideToast.bind(this);
		this.hideToast = hideToast;
		this.addEventListener('animationend', hideToast);
		this.classList.add('is-dismissed');

		if (localStorage) {
			localStorage.setItem(Navbar.KEY_COOKIES_AGREED, (new Date()).getTime());
		}
	},


	checkSupportNotifications: function (root) {
		var supportEndpoint = root.getAttribute('data-support-url');
		var callbackName = 'NavbarSupportTicketCallback' + (new Date()).getTime() + '_' + Math.round(Math.random() * 100000);
		window[callbackName] = Navbar.setSupportNotificationCount.bind(Navbar, root);

		var script = document.createElement('script');
		script.src = supportEndpoint + 'window.' + callbackName;

		document.getElementsByTagName('head')[0].appendChild(script);
	},
	setSupportNotificationCount: function (root, payload) {
		var count = (payload && payload.total) ? payload.total : 0;
		if (count && count > 0) {
			this.forEach(root.querySelectorAll('.Navbar-supportCounter, .Navbar-accountDropdownSupport .Navbar-accountDropdownCounter'), function (counter) {
				counter.innerHTML = ('' + count);
			});
			root.classList.add('is-support-active');
		} else {
			root.classList.remove('is-support-active');
			this.forEach(root.querySelectorAll('.Navbar-supportCounter, .Navbar-accountDropdownSupport .Navbar-accountDropdownCounter'), function (counter) {
				counter.innerHTML = '0';
			});
		}
	},

	/**
	 * Helper method to execute a callback method against an array-like structure.
	 *
	 * @param collection An array-like structure to iterate over.
	 * @param callback
	 */
	forEach: function (collection, callback) {
		if (collection && collection.length && typeof callback === 'function') {
			for (var i = 0; i < collection.length; i++) {
				callback(collection[i], i, collection);
			}
		}
	},

	request: function (method, url, callback, error) {
		var xhr = new XMLHttpRequest();
		xhr.open(method, url);
		xhr.onreadystatechange = function (callback, error) {
			if (this.readyState === 4) {
				if (this.status === 200) {
					callback(this.responseText);
				} else {
					error(this.status);
				}
			}
		}.bind(xhr, callback, error);
		xhr.send();
	},

	get: function (url, callback, error) {
		return Navbar.request('GET', url, callback, error);
	},

	/**
	 * Pull user account info via AJAX.
	 */
	authenticate: function (root) {
		var authUrl = root.getAttribute('data-auth-url');
		Navbar.get(
			authUrl,
			function (res) {
				if (!res) {
					// not logged in
					return;
				}
				var user = {};
				try {
					user = JSON.parse(res);
					Navbar.login(root, user);
				} catch (err) {
					console.error(err);
				}
			},
			function (err) {
				console.error('Couldn\'t verify user', err);
			}
		);
	},

	login: function (root, user) {
		if (user) {
			var battleTagFull = '';
			var battleTagName = '';
			var battleTagCode = '';
			var email = (user.email || '').toLowerCase();

			if (user.account && user.account.battleTag) {
				battleTagFull = battleTagName = user.account.battleTag.name || battleTagName;
				battleTagCode = user.account.battleTag.code || battleTagCode;
				if (battleTagCode && battleTagCode.charAt(0) !== '#') {
					battleTagCode = '#' + battleTagCode;
				}
			} else if (user.battletag) {
				var tokens = user.battletag.split('#');
				battleTagFull = battleTagName = tokens[0] || battleTagName;
				battleTagCode = tokens[1] || battleTagCode;
				if (battleTagCode && battleTagCode.charAt(0) !== '#') {
					battleTagCode = '#' + battleTagCode;
				}
			} else if (email) {
				battleTagFull = email.length > 12 ? email.substring(0,12) : email;
			}

			root.classList.add('is-authenticated');
			if (user.flags && user.flags.employee) {
				root.classList.add('is-employee');
			}

			// Account Dropdown button
			root.querySelector('.Navbar .Navbar-accountAuthenticated').innerHTML = battleTagFull;

			// Contents of Account Dropdown
			Navbar.forEach(root.querySelectorAll('.Navbar-accountDropdownLoggedIn'), function (accountSection) {
				accountSection.querySelector('.Navbar-accountDropdownBattleTag').innerHTML = battleTagName;
				accountSection.querySelector('.Navbar-accountDropdownBattleTagNumber').innerHTML = battleTagCode;
				accountSection.querySelector('.Navbar-accountDropdownEmail').innerHTML = email;
			});

			// Check support tickets after ajax auth
			Navbar.checkSupportNotifications(root);
		}
	},


	/**
	 * Retrieve footer legal info via AJAX.
	 */
	getLegal: function(root) {
		var locale = root.getAttribute('data-locale');

		var legalRootElem = (root || document).querySelector('.NavbarFooter-legal');
		var disableLegal = !!legalRootElem.getAttribute('data-disable');
		var disableAdditionalLegal = !!legalRootElem.getAttribute('data-disable-additional');
		var legalUrl = legalRootElem.getAttribute('data-legal-url') || '/{locale}/navbar/legal?id={legalId}';
		var legalId = legalRootElem.getAttribute('data-legal-id');
		var country = legalRootElem.getAttribute('data-country');

		legalUrl = legalUrl.replace('{locale}', locale);
		legalUrl = legalUrl.replace('{legalId}', legalId);
		legalUrl = legalUrl.replace('{country}', country);

		Navbar.get(
			legalUrl,
			function (res) {
				if (!res) {
					// not logged in
					return;
				}
				var legal = {};
				try {
					legal = JSON.parse(res);
					Navbar.generateLegal(legalRootElem, legal, disableLegal, disableAdditionalLegal);
				} catch (err) {
					console.error(err);
				}
			},
			function (err) {
				console.error('Couldn\'t retrieve legal data', err);
			}
		);
	},

	generateLegal: function(legalRoot, data, disableLegal, disableAdditionalLegal) {
		if (data.success) {
			if (!disableAdditionalLegal && data.additional && data.additional.length) {
				legalRoot.innerHTML = data.additional.join('');
			} else {
				while (legalRoot.lastChild) {
					legalRoot.removeChild(legalRoot.lastChild);
				}
			}

			if (!disableLegal) {
				// Add ratings
				var ratingsElem = document.createElement('div');
				ratingsElem.className = 'NavbarFooter-legalRatings';

				Navbar.forEach(data.ratings, function (rating) {
					var wrapperElem = document.createElement('div');
					wrapperElem.className = 'NavbarFooter-legalRatingWrapper';
					Navbar.forEach(rating.assets, function (asset) {
						var assetElem = document.createElement('a');
						assetElem.className = 'NavbarFooter-legalLink';
						assetElem.href = asset.url;

						var assetImage = document.createElement('img');
						assetImage.className = 'NavbarFooter-legalRatingDetailImage';
						assetImage.src = asset.imageUrl;
						assetImage.alt = asset.alt;
						assetImage.title = asset.alt;
						assetElem.appendChild(assetImage);

						wrapperElem.appendChild(assetElem);
					});
					if (rating.localizedDescriptors && rating.localizedDescriptors.length) {
						var descriptorWrapperElem = document.createElement('div');
						descriptorWrapperElem.className = 'NavbarFooter-legalRatingDescriptorsWrapper';

						Navbar.forEach(rating.localizedDescriptors, function (descriptor) {
							var descriptorElem = document.createElement('div');
							descriptorElem.className = 'NavbarFooter-esrbDescriptor';
							descriptorElem.title = descriptor.description;

							var descriptorText = document.createTextNode(descriptor.name);
							descriptorElem.appendChild(descriptorText);

							descriptorWrapperElem.appendChild(descriptorElem);
						});

						wrapperElem.appendChild(descriptorWrapperElem);
					}
					ratingsElem.appendChild(wrapperElem);
				});

				legalRoot.appendChild(ratingsElem);
			}
		}
	},

	setTickOffset: function (anchor, tick) {
		tick.style.left = '';
		var offset = (anchor.offsetWidth / 2) + anchor.getBoundingClientRect().left - tick.getBoundingClientRect().left - (Navbar.TICK_MULTIPLIER * tick.offsetWidth / 2);
		tick.style.left = offset + 'px';
		return offset;
	},

	setVerticalTickOffset: function (anchor, tick) {
		tick.style.top = '';
		// Anchor offsetHeight is ignored so we can top-align with row content
		var offset = tick.offsetHeight + anchor.getBoundingClientRect().top - tick.getBoundingClientRect().top - (Navbar.TICK_MULTIPLIER * tick.offsetHeight / 2);
		tick.style.top = offset + 'px';
		return offset;
	},

	toggleLocaleSelector: function () {
		if (this.querySelector('.NavbarFooter-selector').classList.contains('is-open')) {
			Navbar.closeLocaleSelector.call(this);
		} else {
			Navbar.openLocaleSelector.call(this);
		}
	},

	openLocaleSelector: function () {
		this.classList.add('is-focused');
		this.querySelector('.NavbarFooter-selector').classList.add('is-open');
		var arrow = this.querySelector('.NavbarFooter-selectorToggleArrow');
		var tick = this.querySelector('.NavbarFooter-selectorTick');
		Navbar.setTickOffset(arrow, tick);

		if (this.classList.contains('is-region-limited') || this.classList.contains('is-region-hybrid')) {
			Navbar.changeFooterRegionLimit.call(this, this.querySelector('.NavbarFooter-selectorRegion.is-active'));
		}

		var promo = document.querySelector('.Navbar-promotion.is-open');
		if (promo) Navbar.dismissPromotion.call(promo, false);

		Navbar.blockScrolling();
	},
	closeLocaleSelector: function () {
		this.classList.remove('is-focused');
		this.querySelector('.NavbarFooter-selector').classList.remove('is-open');

		Navbar.unblockScrolling();
	},

	updateFooter: function (timestamp) {
		if (timestamp > Navbar.lastFooterUpdateTimestamp) {
			Navbar.lastFooterUpdateTimestamp = timestamp;

			var width = Navbar.calcViewportWidth();
			if (width === Navbar.viewportWidthFooter) {
				return;
			}
			Navbar.viewportWidthFooter = width;

			if (this && this.classList.contains('is-focused')) {
				Navbar.closeLocaleSelector.call(this);
			}
		}
	},
	resizeFooter: function () {
		var _this = this;
		requestAnimationFrame(function(timestamp) {
			Navbar.updateFooter.call(_this, timestamp);
		});
	},

	changeFooterRegionLimit: function (link) {
		var regionId = link.getAttribute('data-id');

		Navbar.forEach(this.querySelectorAll('.NavbarFooter-selectorSectionPage.is-open:not([data-region=\'' + regionId + '\'])'), function (page) {
			page.classList.remove('is-open');
		});
		this.querySelector('.NavbarFooter-selectorSectionPage[data-region=\'' + regionId + '\']').classList.add('is-open');

		Navbar.forEach(this.querySelectorAll('.NavbarFooter-selectorRegion.is-selected:not([data-id=\'' + regionId + '\'])'), function (page) {
			page.classList.remove('is-selected');
		});
		link.classList.add('is-selected');

		var tick = this.querySelector('.NavbarFooter-selectorRegionTick');
		var offset = Navbar.setVerticalTickOffset(link, tick);
		var tickOverlay = tick.querySelector('.NavbarFooter-selectorRegionTickOverlay');
		tickOverlay.style.opacity = (offset / this.querySelector('.NavbarFooter-selectorRegions').offsetHeight);
	},

	getLocalDomainName: function () {
		var url = window.location.href;
		var domain;
		// find & remove protocol (http, ftp, etc.) and get domain
		if (url.indexOf("://") > -1) {
			domain = url.split('/')[2];
		}
		else {
			domain = url.split('/')[0];
		}
		// find & remove port number
		domain = domain.split(':')[0];

		return domain;
	},
	pushAnalyticsEvent: function (data) {
		if (!window.dataLayer) window.dataLayer = [];
		window.dataLayer.push(data);
	},
	pushGlobalNotificationAnalyticsEvent: function (event, id, title) {
		Navbar.pushAnalyticsEvent({
			event: 'globalNotification',
			analytics: {
				eventPlacement: event,
				eventPanel: 'id:' + id + ' || ' + title
			}
		});
	},
	loadHandler: function () {
		Navbar.testForOverlappingElementsAndSwitchToCollapsed();

		// Remove the timeout now that we've run the load test properly
		if (Navbar.loadTimeoutId) {
			clearTimeout(Navbar.loadTimeoutId);
			Navbar.loadTimeoutId = null;
		}
	}
};

(function () {
	var navbars = [];
	Navbar.forEach(document.querySelectorAll('.Navbar'), function (root) {
		Navbar.init(root);
		navbars.push(root);
	});

	Navbar.forEach(document.querySelectorAll('.NavbarFooter'), function (footer) {
		Navbar.initFooter(footer);
	});

	document.addEventListener("DOMContentLoaded", function(event) {
		Navbar.forEach(navbars, Navbar.updateNavbar);

		// Wait a reasonable time for the load event to occur. If it has not fired, then we will go ahead and run the overlap test
		Navbar.loadTimeoutId = setTimeout(Navbar.loadHandler, Navbar.DURATION_LOAD_DELAY);
	});

	// Try to wait on the Load event. Ideally, we hope to receive the event before the defined timeout
	window.addEventListener(Navbar.WINDOW_LOAD_EVENT, Navbar.loadHandler);
})();

if (module) module.exports = Navbar;

},{}]},{},[1,2])(2)
});