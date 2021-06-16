! function(e) {
    if ("object" == typeof exports && "undefined" != typeof module) module.exports = e();
    else if ("function" == typeof define && define.amd) define([], e);
    else {
        var t;
        t = "undefined" != typeof window ? window : "undefined" != typeof global ? global : "undefined" != typeof self ? self : this, t.navbar = e()
    }
}(function() {
    return function() {
        function e(t, o, a) {
            function i(r, s) {
                if (!o[r]) {
                    if (!t[r]) {
                        var c = "function" == typeof require && require;
                        if (!s && c) return c(r, !0);
                        if (n) return n(r, !0);
                        var l = new Error("Cannot find module '" + r + "'");
                        throw l.code = "MODULE_NOT_FOUND", l
                    }
                    var d = o[r] = {
                        exports: {}
                    };
                    t[r][0].call(d.exports, function(e) {
                        var o = t[r][1][e];
                        return i(o || e)
                    }, d, d.exports, e, t, o, a)
                }
                return o[r].exports
            }
            for (var n = "function" == typeof require && require, r = 0; r < a.length; r++) i(a[r]);
            return i
        }
        return e
    }()({
        1: [function(e, t, o) {
            ! function(e) {
                "use strict";
                if ("document" in e)
                    if ("classList" in document.createElement("_") && (!document.createElementNS || "classList" in document.createElementNS("http://www.w3.org/2000/svg", "svg").appendChild(document.createElement("g")))) {
                        var t = document.createElement("_");
                        if (t.classList.add("c1", "c2"), !t.classList.contains("c2")) {
                            var o = function(e) {
                                var t = DOMTokenList.prototype[e];
                                DOMTokenList.prototype[e] = function(e) {
                                    var o, a = arguments.length;
                                    for (o = 0; o < a; o++) e = arguments[o], t.call(this, e)
                                }
                            };
                            o("add"), o("remove")
                        }
                        if (t.classList.toggle("c3", !1), t.classList.contains("c3")) {
                            var a = DOMTokenList.prototype.toggle;
                            DOMTokenList.prototype.toggle = function(e, t) {
                                return 1 in arguments && !this.contains(e) == !t ? t : a.call(this, e)
                            }
                        }
                        t = null
                    } else {
                        if (!("Element" in e)) return;
                        var i = "classList",
                            n = "prototype",
                            r = e.Element[n],
                            s = Object,
                            c = String[n].trim || function() {
                                return this.replace(/^\s+|\s+$/g, "")
                            },
                            l = Array[n].indexOf || function(e) {
                                for (var t = 0, o = this.length; t < o; t++)
                                    if (t in this && this[t] === e) return t;
                                return -1
                            },
                            d = function(e, t) {
                                this.name = e, this.code = DOMException[e], this.message = t
                            },
                            u = function(e, t) {
                                if ("" === t) throw new d("SYNTAX_ERR", "An invalid or illegal string was specified");
                                if (/\s/.test(t)) throw new d("INVALID_CHARACTER_ERR", "String contains an invalid character");
                                return l.call(e, t)
                            },
                            f = function(e) {
                                for (var t = c.call(e.getAttribute("class") || ""), o = t ? t.split(/\s+/) : [], a = 0, i = o.length; a < i; a++) this.push(o[a]);
                                this._updateClassName = function() {
                                    e.setAttribute("class", this.toString())
                                }
                            },
                            v = f[n] = [],
                            p = function() {
                                return new f(this)
                            };
                        if (d[n] = Error[n], v.item = function(e) {
                            return this[e] || null
                        }, v.contains = function(e) {
                            return e += "", u(this, e) !== -1
                        }, v.add = function() {
                            var e, t = arguments,
                                o = 0,
                                a = t.length,
                                i = !1;
                            do e = t[o] + "", u(this, e) === -1 && (this.push(e), i = !0); while (++o < a);
                            i && this._updateClassName()
                        }, v.remove = function() {
                            var e, t, o = arguments,
                                a = 0,
                                i = o.length,
                                n = !1;
                            do
                                for (e = o[a] + "", t = u(this, e); t !== -1;) this.splice(t, 1), n = !0, t = u(this, e); while (++a < i);
                            n && this._updateClassName()
                        }, v.toggle = function(e, t) {
                            e += "";
                            var o = this.contains(e),
                                a = o ? t !== !0 && "remove" : t !== !1 && "add";
                            return a && this[a](e), t === !0 || t === !1 ? t : !o
                        }, v.toString = function() {
                            return this.join(" ")
                        }, s.defineProperty) {
                            var m = {
                                get: p,
                                enumerable: !0,
                                configurable: !0
                            };
                            try {
                                s.defineProperty(r, i, m)
                            } catch (h) {
                                h.number === -2146823252 && (m.enumerable = !1, s.defineProperty(r, i, m))
                            }
                        } else s[n].__defineGetter__ && r.__defineGetter__(i, p)
                    }
            }("undefined" != typeof window ? window : {}),
                function() {
                    for (var e = 0, t = ["ms", "moz", "webkit", "o"], o = 0; o < t.length && !window.requestAnimationFrame; ++o) window.requestAnimationFrame = window[t[o] + "RequestAnimationFrame"], window.cancelAnimationFrame = window[t[o] + "CancelAnimationFrame"] || window[t[o] + "CancelRequestAnimationFrame"];
                    window.requestAnimationFrame || (window.requestAnimationFrame = function(t, o) {
                        function a() {
                            t(i + n)
                        }
                        var i = (new Date).getTime(),
                            n = Math.max(0, 16 - (i - e));
                        return e = i + n, window.setTimeout(a, n)
                    }), window.cancelAnimationFrame || (window.cancelAnimationFrame = function(e) {
                        clearTimeout(e)
                    })
                }()
        }, {}],
        2: [function(e, t, o) {
            var a = {
                TICK_MULTIPLIER: 1 / Math.cos(Math.PI / 4),
                DEFAULT_ANIMATION_DURATION: 200,
                DEFAULT_POPUP_DELAY: 1e3,
                MAX_PROMOTION_LENGTH: 100,
                MAX_NUM_GAMES_PER_ROW: 8,
                MARGIN_BETWEEN_GAMES: 20,
                KEY_PROMOTIONS_READ: "NavbarPromotionsRead",
                KEY_COOKIES_AGREED: "CookiesAgreed",
                DATA_PROMOTION_ID: "data-promotion-id",
                EXTERNAL_EVENTS: {
                    CLOSE_ALL_MENUS: "navbarCloseAllMenus",
                    UPDATE_LOGIN_URL: "updateLoginUrl",
                    ADD_FOOTER_LINKS: "navbarAddFooterLinks",
                    UPDATE_LOCALE_SELECTOR_URLS: "navbarUpdateLocaleSelectorUrls",
                    UPDATE_USER_INFO: "navbarUpdateUserInfo"
                },
                MODE_SIMPLE: "simple",
                MODE_COMPACT: "compact",
                MODE_DEFAULT: "default",
                WINDOW_LOAD_EVENT: "load",
                DURATION_LOAD_DELAY: 500,
                viewportWidth: 0,
                viewportWidthFooter: 0,
                loadTimeoutId: null,
                lastUpdateTimestamp: 0,
                lastFooterUpdateTimestamp: 0,
                getCurrentMode: function() {
                    var e = document.querySelector(".Navbar");
                    return e ? e.classList.contains("is-compact") ? a.MODE_COMPACT : e.classList.contains("is-simple") ? a.MODE_SIMPLE : a.MODE_DEFAULT : "default"
                },
                calcViewportWidth: function() {

                },
                init: function(e) {
                    if (a.setupExternalEventListeners(e), !e.classList.contains("is-disabled")) {
                        e.addEventListener("click", a.rootClickHandler.bind(e)), a.forEach(e.querySelectorAll(".Navbar-overlay"), function(t) {
                            t.addEventListener("click", a.closeModals.bind(e))
                        }), window.addEventListener("resize", a.resize.bind(e)), a.forEach(e.querySelectorAll(".Navbar-modalToggle"), function(t) {
                            t.addEventListener("click", a.toggleModal.bind({
                                root: e,
                                toggle: t
                            }))
                        }), a.forEach(e.querySelectorAll(".Navbar-modal"), function(t) {
                            t.classList.contains("is-animated") && (t.addEventListener("animationend", a.setModalDisplayStateAfterAnimation.bind(t)), t.addEventListener("transitionend", a.setModalDisplayStateAfterAnimation.bind(t))), a.forEach(t.querySelectorAll(".Navbar-modalClose, .Navbar-modalCloseGutter"), function(o) {
                                o.addEventListener("click", a.toggleModal.bind({
                                    root: e,
                                    target: t
                                }))
                            })
                        }), a.forEach(e.querySelectorAll(".Navbar-expandable"), function(t) {
                            t.querySelector(".Navbar-expandableToggle").addEventListener("click", a.toggleExpandable.bind(e, t))
                        }), e.hasAttribute("data-ajax") && a.authenticate(e), setTimeout(function() {
                            a.showCookieCompliance(e), a.checkPromotions.call(a, e)
                        }, a.DEFAULT_POPUP_DELAY), e.classList.contains("is-authenticated") && (e.getAttribute("data-notification-count") ? a.setSupportNotificationCount.call(a, e, {
                            total: parseInt(e.getAttribute("data-notification-count"))
                        }) : a.checkSupportNotifications(e));
                        var t = e.getAttribute("data-current-site");
                        if (t) {
                            var o = e.querySelector('.Navbar-desktop .Navbar-item[data-name="' + t + '"]');
                            o && o.classList.add("is-current")
                        }
                        var i = navigator.userAgent.toLowerCase(),
                            n = i.indexOf("iphone") >= 0 || i.indexOf("ipad") >= 0;
                        n && (e.addEventListener("touchmove", a.touchMoveHandler), e.addEventListener("touchend", a.touchEndHandler), a.forEach(e.querySelectorAll(".Navbar-accountModal .Navbar-modalContent, .Navbar-siteMenu .Navbar-modalContent"), function(e) {
                            a.forEach(e.querySelectorAll("a, .Navbar-expandableToggle"), function(e) {
                                e.addEventListener("click", a.touchClickHandler)
                            })
                        }))
                    }
                },
                initFooter: function(e) {
                    if (e.querySelector(".NavbarFooter-selector")) {
                        var t = e.querySelector(".NavbarFooter-selectorToggle");
                        t && t.addEventListener("click", a.toggleLocaleSelector.bind(e));
                        var o = e.querySelector(".NavbarFooter-selectorCloserAnchor");
                        o && o.addEventListener("click", a.closeLocaleSelector.bind(e));
                        var i = e.querySelector(".NavbarFooter-overlay");
                        i && i.addEventListener("click", a.closeLocaleSelector.bind(e)), window.addEventListener("resize", a.resizeFooter.bind(e)), (e.classList.contains("is-region-limited") || e.classList.contains("is-region-hybrid")) && a.forEach(e.querySelectorAll(".NavbarFooter-selectorRegion:not(.is-external)"), function(t) {
                            t.addEventListener("click", a.changeFooterRegionLimit.bind(e, t))
                        })
                    }
                    a.getAdministrativeDivision(e), a.getLegal(e)
                },
                checkValidResize: function() {
                    var e = document.activeElement || {
                        tagName: "",
                        type: ""
                    };
                    return !/textarea/i.test(e.tagName) && (!/input/i.test(e.tagName) || !(/text/i.test(e.type) || /password/i.test(e.type) || /search/i.test(e.type) || /email/i.test(e.type) || /number/i.test(e.type)))
                },
                updateNavbar: function(e, t) {
                    if (t > a.lastUpdateTimestamp) {
                        a.lastUpdateTimestamp = t;
                        var o = a.calcViewportWidth();
                        if (o === a.viewportWidth) return;
                        a.viewportWidth = o, a.checkValidResize() && e && e.classList.contains("is-focused") && a.closeModals.call(e), a.testForOverlappingElementsAndSwitchToCollapsed()
                    }
                },
                resize: function() {
                    var e = this;
                    requestAnimationFrame(function(t) {
                        a.updateNavbar(e, t)
                    })
                },
                setupExternalEventListeners: function(e) {
                    for (var t in a.EXTERNAL_EVENTS) window.addEventListener(a.EXTERNAL_EVENTS[t], a.handleExternalEvent.bind(e))
                },
                handleExternalEvent: function(e) {
                    switch (e.type) {
                        case a.EXTERNAL_EVENTS.CLOSE_ALL_MENUS:
                            a.closeModals.call(this);
                            break;
                        case a.EXTERNAL_EVENTS.UPDATE_LOGIN_URL:
                            a.updateLoginUrl.call(this, e);
                            break;
                        case a.EXTERNAL_EVENTS.ADD_FOOTER_LINKS:
                            a.addFooterLinks.call(this, e.detail);
                            break;
                        case a.EXTERNAL_EVENTS.UPDATE_LOCALE_SELECTOR_URLS:
                            a.updateLocaleSelectorUrls.call(this, e.detail);
                            break;
                        case a.EXTERNAL_EVENTS.UPDATE_USER_INFO:
                            a.updateUserInfo.call(this, e.detail)
                    }
                },
                testForOverlappingElementsAndSwitchToCollapsed: function() {
                    var e = document.querySelector(".Navbar-desktop .Navbar-items");
                    if (e && 0 != e.offsetHeight) {
                        var t = document.querySelector(".Navbar-collapsedItems");
                        t && (a.useCollapsedDesktop(e) ? (e.classList.add("is-visible"), t.classList.remove("is-hidden")) : (e.classList.remove("is-visible"), t.classList.add("is-hidden")))
                    }
                },
                useCollapsedDesktop: function(e) {
                    var t = document.querySelector(".Navbar-desktop .Navbar-profileItems").getBoundingClientRect(),
                        o = e.getBoundingClientRect(),
                        i = a.calcViewportWidth(),
                        n = o.right,
                        r = i - t.left,
                        s = n + r,
                        c = s >= i;
                    return c
                },
                rootClickHandler: function() {
                    var e = this.querySelector(".Navbar-promotion.is-open");
                    e && a.dismissPromotion.call(e)
                },
                touchMoving: !1,
                touchMoveHandler: function() {
                    a.touchMoving = !0
                },
                touchEndHandler: function() {
                    a.touchMoving = !1
                },
                touchClickHandler: function(e) {
                    if (a.touchMoving) return e.stopPropagation(), e.preventDefault(), !1
                },
                toggleModal: function(e) {
                    var t = this.toggle,
                        o = t ? t.getAttribute("data-target") : null,
                        i = t ? t.getAttribute("data-site-mode") : null,
                        n = a.getCurrentMode(),
                        r = !1;
                    return a.forEach(this.root.querySelectorAll(".Navbar-modal"), function(e) {
                        var t = this.toggle,
                            s = !i || e.getAttribute("data-" + n + "-mode");
                        if ((e === this.target || e.classList.contains(o)) && s)
                            if (a.isOpen(e)) a.close(e), e.classList.contains("is-scroll-blocking") && a.unblockScrolling(), t && t.classList.remove("is-active");
                            else {
                                a.open(e), e.classList.contains("is-scroll-blocking") && a.blockScrolling(), t && t.classList.add("is-active");
                                var c = e.querySelector(".Navbar-tick");
                                if (c) {
                                    c.style.left = "";
                                    var l = t.querySelector(".Navbar-dropdownIcon");
                                    l && 0 !== l.offsetLeft || (l = t.querySelector(".Navbar-label")), l && 0 !== l.offsetLeft || (l = t);
                                    var d = a.setTickOffset(l, c);
                                    if (!e.classList.contains("is-constrained")) {
                                        var u = e.offsetWidth / 2,
                                            f = d > u ? d - u : u - d,
                                            v = e.offsetHeight / u,
                                            p = Math.atan(v),
                                            m = u / Math.cos(p);
                                        c.querySelector(".Navbar-tickInner").style.opacity = f / m
                                    }
                                }
                                r = !0
                            }
                        else a.close(e), a.forEach(this.root.querySelectorAll('.Navbar-modalToggle[data-name="' + e.getAttribute("data-toggle") + '"]'), function(e) {
                            e.classList.remove("is-active")
                        })
                    }.bind(this)), a.forEach(this.root.querySelectorAll(".Navbar-item"), function(e) {
                        r ? e.getAttribute("data-target") === o ? e.classList.remove("is-faded") : e.classList.add("is-faded") : e.classList.remove("is-faded")
                    }.bind(this)), this.root.classList.toggle("is-focused", r), a.rootClickHandler.call(this.root), a.toggleExpandable.call(this.root), e.stopPropagation(), e.preventDefault(), !1
                },
                closeModals: function() {
                    a.forEach((this || document).querySelectorAll(".Navbar .Navbar-item"), function(e) {
                        e.classList.remove("is-active"), e.classList.remove("is-faded")
                    }), a.forEach((this || document).querySelectorAll(".Navbar .Navbar-modal.is-open"), function(e) {
                        a.close(e)
                    }), this && this.classList ? this.classList.remove("is-focused") : a.forEach(document.querySelectorAll(".Navbar"), function(e) {
                        e.classList.remove("is-focused")
                    }), this && a.toggleExpandable.call(this), a.unblockScrolling()
                },
                updateLoginUrl: function(e) {
                    a.forEach((this || document).querySelectorAll("div.Navbar-accountDropdownLoggedOut > div > a"), function(t) {
                        t.href = e.detail
                    })
                },
                addFooterLinks: function(e) {
                    function t(e) {
                        var t = i(e);
                        return t.classList.add("NavbarFooter-mainLink"), t
                    }

                    function o(e) {
                        var t = i(e);
                        return t.classList.add("NavbarFooter-subLink"), t
                    }

                    function i(e) {
                        var t = document.createElement("div");
                        t.classList.add("NavbarFooter-link");
                        var o = document.createElement("a");
                        o.classList.add("NavbarFooter-anchor"), o.href = e.href;
                        var a = e.attributes || {};
                        Object.keys(a).forEach(function(e) {
                            o.setAttribute(e, a[e])
                        });
                        var i = document.createTextNode(e.text);
                        return o.appendChild(i), t.appendChild(o), t
                    }
                    var e = e || {},
                        n = document.querySelector(".NavbarFooter-linksRight");
                    a.forEach(e.primary, function(e) {
                        if (e.text && e.href && n) {
                            var o = t(e);
                            n.appendChild(o)
                        }
                    });
                    var r = document.querySelector(".NavbarFooter-links.NavbarFooter-subLinks");
                    a.forEach(e.secondary, function(e) {
                        if (e.text && e.href && r) {
                            var t = o(e);
                            r.appendChild(t)
                        }
                    })
                },
                updateLocaleSelectorUrls: function(e) {
                    var t = document.querySelectorAll(".NavbarFooter-selectorLocale");
                    a.forEach(t, function(t) {
                        e.hasOwnProperty(t.dataset.id) && (t.href = e[t.dataset.id])
                    })
                },
                updateUserInfo: function(e) {
                    if (e && e.battletag) {
                        var t = document.querySelectorAll(".Navbar");
                        a.forEach(t, function(t) {
                            a.checkDisabled(t) || a.displayUserInfo(t, e)
                        })
                    }
                },
                isOpen: function(e) {
                    return e.classList.contains("is-open")
                },
                open: function(e) {
                    e.classList.add("is-open")
                },
                close: function(e) {
                    e.classList.remove("is-open")
                },
                blockScrolling: function() {
                    document.body.classList.add("Navbar-blockScrolling")
                },
                unblockScrolling: function() {
                    document.body.classList.remove("Navbar-blockScrolling")
                },
                setModalDisplayStateAfterAnimation: function(e) {
                    return a.isOpen(this) ? a.showModal(this) : a.hideModal(this), e.stopPropagation(), e.preventDefault(), !1
                },
                showModal: function(e) {
                    e.classList.add("is-displayed")
                },
                hideModal: function(e) {
                    e.classList.remove("is-displayed")
                },
                toggleExpandable: function(e) {
                    a.forEach(this.querySelectorAll(".Navbar-expandable"), function(t) {
                        var o = t.querySelector(".Navbar-expandableContainer");

                    })
                },
                checkDisabled: function(e) {
                    return e && e.classList && e.classList.contains("is-disabled")
                },
                checkPromotionId: function(e) {
                    if (localStorage) {
                        var t = localStorage.getItem(a.KEY_PROMOTIONS_READ) ? JSON.parse(localStorage.getItem(a.KEY_PROMOTIONS_READ)) : {};
                        return !!t[e]
                    }
                    return !1
                },
                savePromotionId: function(e) {
                    if (localStorage) {
                        var t = localStorage.getItem(a.KEY_PROMOTIONS_READ) ? JSON.parse(localStorage.getItem(a.KEY_PROMOTIONS_READ)) : {};
                        t[e] = !0, localStorage.setItem(a.KEY_PROMOTIONS_READ, JSON.stringify(t))
                    }
                },
                checkPromotions: function(e) {
                    if (!a.checkDisabled(e)) {
                        var t = e.getAttribute("data-notification-url"),
                            o = e.querySelector(".Navbar-cookieCompliance.is-open");
                        o || a.get(t, function(t) {
                            if (t && !a.checkDisabled(e)) {
                                var o = {};
                                try {
                                    o = JSON.parse(t);
                                    var i = o.notifications || o.notificationsList;
                                    if (o.totalNotifications && i)
                                        for (var n in i) {
                                            var r = i[n];
                                            if (!a.checkPromotionId(r.id)) {
                                                var s = e.querySelector(".Navbar-promotion");
                                                a.showPromotion(s, r.id, r.img ? r.img.url : null, r.title, r.content, r.httpLink ? r.httpLink.content : "", r.httpLink ? r.httpLink.link : ""), s.querySelector(".Navbar-promotionLink").addEventListener("click", a.setPromotionAsRead.bind(s)), s.querySelector(".Navbar-toastClose").addEventListener("click", a.dismissPromotion.bind(s, !0));
                                                break
                                            }
                                        }
                                } catch (c) {
                                    console.error(c)
                                }
                            }
                        }, function(e) {

                        })
                    }
                },
                showPromotion: function(e, t, o, i, n, r, s) {
                    if (t && e.setAttribute(a.DATA_PROMOTION_ID, t), o && (e.querySelector(".Navbar-promotionImage").src = o), i && (e.querySelector(".Navbar-promotionLabel").innerHTML = i), n && "string" == typeof n && (n = n.trim(), e.querySelector(".Navbar-promotionText").innerHTML = n), r && (e.querySelector(".Navbar-promotionLink").innerHTML = r), s) {
                        var c = e.querySelector(".Navbar-promotionLink");
                        c.href = s, e.addEventListener("click", a.promotionClickHandler), c.addEventListener("click", a.promotionLinkClickHandler.bind(e))
                    }
                    e.classList.add("is-open"), e.addEventListener("click", a.promotionClickHandler);
                    var l = e.querySelector(".Navbar-promotionLabel").innerHTML;
                    a.pushGlobalNotificationAnalyticsEvent("Open - Automatic", t, l)
                },
                dismissPromotion: function(e, t) {
                    var o = a.hideToast.bind(this);
                    this.hideToast = o, this.addEventListener("animationend", o), this.classList.add("is-dismissed");
                    var i = parseInt(this.getAttribute(a.DATA_PROMOTION_ID)),
                        n = this.querySelector(".Navbar-promotionLabel").innerHTML;
                    e && (a.setPromotionAsRead.call(this), t.stopPropagation(), t.preventDefault()), a.pushGlobalNotificationAnalyticsEvent(e ? "Close - X" : "Close - Background", i, n)
                },
                setPromotionAsRead: function() {
                    var e = parseInt(this.getAttribute(a.DATA_PROMOTION_ID));
                    a.savePromotionId(e)
                },
                hideToast: function() {
                    this.hideToast && this.removeEventListener("animationend", this.hideToast), this.classList.remove("is-dismissed"), this.classList.remove("is-open")
                },
                promotionClickHandler: function(e) {
                    return e.stopPropagation(), !1
                },
                promotionLinkClickHandler: function() {
                    var e = parseInt(this.getAttribute(a.DATA_PROMOTION_ID)),
                        t = this.querySelector(".Navbar-promotionLabel").innerHTML;
                    try {
                        a.pushGlobalNotificationAnalyticsEvent("Click - Button", e, t)
                    } catch (o) {
                        console.error(o)
                    }
                    return !0
                },
                showCookieCompliance: function(e) {
                    var t = e.querySelector(".Navbar-cookieCompliance"),
                        o = !0;
                    if (t) {
                        if (localStorage) {
                            var i = localStorage.getItem(a.KEY_COOKIES_AGREED);
                            if (i) {
                                var n = new Date((new Date).setFullYear((new Date).getFullYear() - 1)).getTime();
                                i > n && (o = !1)
                            }
                        }
                        o && (t.classList.add("is-open"), t.querySelector("#cookie-compliance-agree").addEventListener("click", a.dismissCookieCompliance.bind(t)), t.querySelector(".Navbar-toastClose").addEventListener("click", a.dismissCookieCompliance.bind(t, !0)))
                    }
                },
                dismissCookieCompliance: function() {
                    var e = a.hideToast.bind(this);
                    this.hideToast = e, this.addEventListener("animationend", e), this.classList.add("is-dismissed"), localStorage && localStorage.setItem(a.KEY_COOKIES_AGREED, (new Date).getTime())
                },
                checkSupportNotifications: function(e) {
                },
                setSupportNotificationCount: function(e, t) {
                },
                forEach: function(e, t) {
                    if (e && e.length && "function" == typeof t)
                        for (var o = 0; o < e.length; o++) t(e[o], o, e)
                },
                request: function(e, t, o, a) {
                },
                get: function(e, t, o) {
                    return a.request("GET", e, t, o)
                },
                authenticate: function(e) {
                    var t = e.getAttribute("data-auth-url");
                    a.get(t, function(t) {
                        if (t) {
                            var o = {};
                            try {
                                o = JSON.parse(t), a.displayUserInfo(e, o)
                            } catch (i) {
                                console.error(i)
                            }
                        }
                    }, function(e) {
                        console.error("Couldn't verify user", e)
                    })
                },
                displayUserInfo: function(e, t) {
                    if (e = e || document.querySelector(".Navbar"), e && t) {
                        var o = "",
                            i = "",
                            n = "",
                            r = (t.email || "").toLowerCase();
                        if (t.account && t.account.battleTag) o = i = t.account.battleTag.name || i, n = t.account.battleTag.code || n, n && "#" !== n.charAt(0) && (n = "#" + n);
                        else if (t.battletag) {
                            var s = t.battletag.split("#");
                            o = i = s[0] || i, n = s[1] || n, n && "#" !== n.charAt(0) && (n = "#" + n)
                        } else r && (o = r.length > 12 ? r.substring(0, 12) : r);
                        e.classList.add("is-authenticated"), t.flags && t.flags.employee && e.classList.add("is-employee"), a.forEach(e.querySelectorAll(".Navbar-accountAuthenticated"), function(e) {
                            e.innerHTML = o
                        }), a.forEach(e.querySelectorAll(".Navbar-accountDropdownLoggedIn"), function(e) {
                            e.querySelector(".Navbar-accountDropdownBattleTag").innerHTML = i, e.querySelector(".Navbar-accountDropdownBattleTagNumber").innerHTML = n, e.querySelector(".Navbar-accountDropdownEmail").innerHTML = r
                        }), a.checkSupportNotifications(e)
                    }
                },
                getAdministrativeDivision: function(e) {
                    function t(t, o) {
                        e.setAttribute("data-country", t), e.setAttribute("data-administrative-division", o)
                    }

                    function o(e) {
                        "string" == typeof e && (e = JSON.parse(e));
                        var o = "object" == typeof e && e.country && e.subdivision;
                        o ? t(e.country, e.subdivision) : i()
                    }

                    function i() {
                        t("US", "CA")
                    }
                    var n = e.getAttribute("data-geoip-service-url") || "https://geo.battle.net";
                    a.get(n, o, i)
                },
                getLegal: function(e) {
                },
                generateLegal: function(e, t, o, i) {
                    if (t.success) {
                        if (!i && t.additional && t.additional.length) e.innerHTML = t.additional.join("");
                        else
                            for (var n = e.children, r = 0; r < n.length; r++) {
                                var s = n[r];
                                s.classList.contains("NavbarFooter-customLegal") || e.removeChild(s)
                            }
                        if (t.ratings.items = t.ratings.items.map(function(e) {
                            var t = [];
                            return e.ratingContentGroups = e.ratingContentGroups.sort(function(e, t) {
                                return e.position - t.position
                            }).filter(function(e) {
                                return e.ratingContents.length > 0
                            }).map(function(o, a, i) {
                                return "ESRB" === e.ratingBoardName && (o.ratingContents.sort(function(e, t) {
                                    return e.position - t.position
                                }), t = t.concat(o.ratingContents), o.ratingContents = [], a !== i.length - 1 ? t.push({
                                    hr: !0
                                }) : o.ratingContents = o.ratingContents.concat(t)), o
                            }), e
                        }), !o) {
                            var c = document.createElement("div");
                            c.className = "NavbarFooter-legalRatings", a.forEach(t.ratings.items, function(e) {
                                var t = document.createElement("div");
                                t.className = "NavbarFooter-legalRatingWrapper";
                                var o = document.createElement("div");
                                o.className = "NavbarFooter-legalRatingDescriptorsWrapper";
                                var i = document.createElement("a");
                                i.className = "NavbarFooter-legalLink", i.href = e.referenceUrl;
                                var n = document.createElement("img");
                                if (n.className = "NavbarFooter-legalRatingDetailImage", n.src = e.ratingImageUrl, n.alt = e.ratingBoardName, n.title = e.ratingBoardName, i.appendChild(n), t.appendChild(i), a.forEach(e.ratingContentGroups, function(e) {
                                    var i = e.ratingContents;
                                    i && i.length > 0 && (a.forEach(e.ratingContents, function(e) {
                                        var t;
                                        if (e.imageUrl) {
                                            t = document.createElement("a"), t.className = "NavbarFooter-legalLink";
                                            var a = document.createElement("img");
                                            a.className = "NavbarFooter-legalRatingDetailImage", a.src = e.imageUrl, a.alt = e.localizedName, t.appendChild(a)
                                        } else e.hr ? (t = document.createElement("hr"), t.className = "NavbarFooter-esrbHR") : (t = document.createElement("div"), t.appendChild(document.createTextNode(e.localizedName)), t.className = "NavbarFooter-esrbDescriptor");
                                        t.title && (t.title = e.localizedDescription), o.appendChild(t)
                                    }), t.appendChild(o))
                                }), e.customImageUrl) {
                                    var r = document.createElement("a");
                                    r.className = "NavbarFooter-legalLink";
                                    var s = document.createElement("img");
                                    s.className = "NavbarFooter-legalRatingDetailImage", s.src = e.customImageUrl, s.alt = e.ratingBoardName, s.title = e.localizedDescription, r.appendChild(s), t.appendChild(r)
                                }
                                c.appendChild(t)
                            }), e.appendChild(c)
                        }
                    }
                },
                setTickOffset: function(e, t) {
                    t.style.left = "";
                    var o = e.offsetWidth / 2 + e.getBoundingClientRect().left - t.getBoundingClientRect().left - a.TICK_MULTIPLIER * t.offsetWidth / 2;
                    return t.style.left = o + "px", o
                },
                setVerticalTickOffset: function(e, t) {
                    t.style.top = "";
                    var o = t.offsetHeight + e.getBoundingClientRect().top - t.getBoundingClientRect().top - a.TICK_MULTIPLIER * t.offsetHeight / 2;
                    return t.style.top = o + "px", o
                },
                toggleLocaleSelector: function() {
                    this.querySelector(".NavbarFooter-selector").classList.contains("is-open") ? a.closeLocaleSelector.call(this) : a.openLocaleSelector.call(this)
                },
                openLocaleSelector: function() {
                    this.classList.add("is-focused"), this.querySelector(".NavbarFooter-selector").classList.add("is-open");
                    var e = this.querySelector(".NavbarFooter-selectorToggleArrow"),
                        t = this.querySelector(".NavbarFooter-selectorTick");
                    a.setTickOffset(e, t), (this.classList.contains("is-region-limited") || this.classList.contains("is-region-hybrid")) && a.changeFooterRegionLimit.call(this, this.querySelector(".NavbarFooter-selectorRegion.is-active"));
                    var o = document.querySelector(".Navbar-promotion.is-open");
                    o && a.dismissPromotion.call(o, !1), a.blockScrolling()
                },
                closeLocaleSelector: function() {
                    this.classList.remove("is-focused"), this.querySelector(".NavbarFooter-selector").classList.remove("is-open"), a.unblockScrolling()
                },
                updateFooter: function(e) {
                    if (e > a.lastFooterUpdateTimestamp) {
                        a.lastFooterUpdateTimestamp = e;
                        var t = a.calcViewportWidth();
                        if (t === a.viewportWidthFooter) return;
                        a.viewportWidthFooter = t, this && this.classList.contains("is-focused") && a.closeLocaleSelector.call(this)
                    }
                },
                resizeFooter: function() {
                    var e = this;
                    requestAnimationFrame(function(t) {
                        a.updateFooter.call(e, t)
                    })
                },
                changeFooterRegionLimit: function(e) {
                    var t = e.getAttribute("data-id");
                    a.forEach(this.querySelectorAll(".NavbarFooter-selectorSectionPage.is-open:not([data-region='" + t + "'])"), function(e) {
                        e.classList.remove("is-open")
                    }), this.querySelector(".NavbarFooter-selectorSectionPage[data-region='" + t + "']").classList.add("is-open"), a.forEach(this.querySelectorAll(".NavbarFooter-selectorRegion.is-selected:not([data-id='" + t + "'])"), function(e) {
                        e.classList.remove("is-selected")
                    }), e.classList.add("is-selected");
                    var o = this.querySelector(".NavbarFooter-selectorRegionTick"),
                        i = a.setVerticalTickOffset(e, o),
                        n = o.querySelector(".NavbarFooter-selectorRegionTickOverlay");
                    n.style.opacity = i / this.querySelector(".NavbarFooter-selectorRegions").offsetHeight
                },
                getLocalDomainName: function() {
                    var e, t = window.location.href;
                    return e = t.indexOf("://") > -1 ? t.split("/")[2] : t.split("/")[0], e = e.split(":")[0]
                },
                pushAnalyticsEvent: function(e) {
                    window.dataLayer || (window.dataLayer = []), window.dataLayer.push(e)
                },
                pushGlobalNotificationAnalyticsEvent: function(e, t, o) {
                    a.pushAnalyticsEvent({
                        event: "globalNotification",
                        analytics: {
                            eventPlacement: e,
                            eventPanel: "id:" + t + " || " + o
                        }
                    })
                },
                loadHandler: function() {
                    a.testForOverlappingElementsAndSwitchToCollapsed(), a.loadTimeoutId && (clearTimeout(a.loadTimeoutId), a.loadTimeoutId = null)
                }
            };
            ! function() {
                var e = [];
                a.forEach(document.querySelectorAll(".Navbar"), function(t) {
                    a.init(t), e.push(t)
                }), a.forEach(document.querySelectorAll(".NavbarFooter"), function(e) {
                    a.initFooter(e)
                }), document.addEventListener("DOMContentLoaded", function(t) {
                    a.forEach(e, a.updateNavbar), a.loadTimeoutId = setTimeout(a.loadHandler, a.DURATION_LOAD_DELAY)
                }), window.addEventListener(a.WINDOW_LOAD_EVENT, a.loadHandler)
            }(), t && (t.exports = a)
        }, {}]
    }, {}, [1, 2])(2)
});
