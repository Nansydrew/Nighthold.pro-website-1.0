(window.webpackJsonp=window.webpackJsonp||[]).push([[37],{1058:function(e,t,a){"use strict";a.r(t);a(93);var r=a(78),n=a(0),i=a.n(n),o=a(43),c=a.n(o),l=a(18),s=a(59),m=a(55),d=a.n(m),u=a(11),f=a(51),p=a(1),g=a.n(p),b=a(15),v=a(220),y=a(28),h=a(17),E=a(2),N=a.n(E),k=a(13),w=a(145),R=a(63),x=function(e){var t=e.title,a=e.questionsText;return i.a.createElement("div",{className:"Raf-Faq-accordion-section-heading"},i.a.createElement("div",{className:"Raf-Faq-accordion-section-heading-title"},t),i.a.createElement("div",{className:"Raf-Faq-accordion-section-heading-questionsText"},a))};x.propTypes={title:g.a.string,questionsText:g.a.string};var O=x,S=function(e){var t=e.entries,a=null;if(t){var r=t.map((function(e){return i.a.createElement("div",{key:"faq-section-body-entry-".concat(e.question),className:"Raf-Faq-accordion-section-body-entry"},i.a.createElement("div",{className:"Raf-Faq-accordion-section-body-entry-question"},e.question),i.a.createElement(k.a,{className:"Raf-Faq-accordion-section-body-entry-answer",htmlString:e.answer}))}));a=i.a.createElement("div",{className:"Raf-Faq-accordion-section-body"},r)}return a};S.propTypes={entries:g.a.array};var T=S,j=(a(961),function(e){var t=e.title,a=e.dividerText,r=e.sections,n=e.disclaimerText,o=e.className,c=e.mediaCtx,l=null;if(r&&r.length>0){var s=r.map((function(e){return{headingContent:i.a.createElement(O,{title:e.title,questionsText:e.questionsText}),bodyContent:i.a.createElement(T,{entries:e.entries})}}));l=i.a.createElement(w.a,{className:"Raf-Faq-accordion contain-huge",items:s})}var m=i.a.createElement("div",{className:N()("Raf-Faq","Raf-Faq--mobile",o)},i.a.createElement("div",{className:"align-center contain-large"},i.a.createElement("div",{className:"Raf-Faq-title font-semp-xxxLarge-white"},t),i.a.createElement(y.a,{size:"normal"}),i.a.createElement(R.a,{className:"Raf-Faq-divider"},a),i.a.createElement(y.a,{size:"small"}),i.a.createElement(y.a,{size:"small"})),l,i.a.createElement(k.a,{className:"Raf-Faq-disclaimer gutter-small-top contain-medium align-center",htmlString:n}));return c.mediaIsAtLeastBreakpoint("large")&&(m=i.a.createElement("div",{className:N()("Raf-Faq",o)},i.a.createElement("div",{className:"align-center contain-large"},i.a.createElement("div",{className:"font-semp-xLarge-white"},t),i.a.createElement(y.a,{size:"normal"}),i.a.createElement(R.a,null,a),i.a.createElement(y.a,{size:"large"})),l,i.a.createElement(k.a,{className:"Raf-Faq-disclaimer gutter-normal-top contain-medium align-center",htmlString:n}))),m});j.propTypes={title:g.a.string,dividerText:g.a.string,sections:g.a.array,disclaimerText:g.a.string,className:g.a.string,mediaCtx:g.a.object.isRequired};var C=Object(b.a)(u.b)(j),z=(a(962),a(963),function(e){var t=e.title,a=e.superText,r=e.body,n=e.className,o=e.mediaCtx,c=i.a.createElement("div",{className:N()("Raf-Header",n)},i.a.createElement("div",{className:"align-center contain-large"},i.a.createElement("div",{className:"fontFamily-semplicita fontWeight-bold font-size-large color-beige-dark textShadow-small-black text-upper"},a),i.a.createElement("div",{className:"font-semp-xxxLarge-white"},t),i.a.createElement("p",{className:"contain-medium color-monochrome-white textShadow-xlarge-black"},r)));return o.mediaIsAtLeastBreakpoint("large")&&(c=i.a.createElement("div",{className:N()("Raf-Header",n)},i.a.createElement("div",{className:"align-center contain-large"},i.a.createElement("h1",{className:"fontFamily-semplicita fontWeight-bold font-size-medium color-beige-dark textShadow-small-black text-upper"},a),i.a.createElement("h2",{className:"font-semp-xLarge-white lineHeight-small"},t),i.a.createElement("p",{className:"contain-medium color-monochrome-white textShadow-xlarge-black"},r)))),c});z.propTypes={title:g.a.string,superText:g.a.string,body:g.a.string,className:g.a.string,mediaCtx:g.a.object.isRequired};var B=Object(b.a)(u.b)(z),P=a(24),_=(a(964),function(e){var t=e.background,a=e.children,r=e.className;return i.a.createElement("div",{className:N()("Raf-Section",r)},i.a.createElement(P.a,{background:{url:t},className:"Pane--bgBottom"},a))});_.propTypes={background:g.a.string,className:g.a.string};var I=_,D=(a(965),function(e){var t=e.backgroundUrl,a=e.repeatingBgUrl,r=e.offsetBg,n=e.children,o=e.className,c=e.mediaCtx,l={};return t?l=a?{background:'url("'.concat(t,'"), url("').concat(a,'")'),backgroundRepeat:"no-repeat, repeat-y",backgroundPosition:"top, top",backgroundSize:"100%, 100%",backgroundBlendMode:"lighten"}:{background:'url("'.concat(t,'")'),backgroundRepeat:"no-repeat",backgroundPosition:"top",backgroundSize:"100%"}:a&&(l={background:'url("'.concat(a,'")'),backgroundRepeat:"repeat-y",backgroundPosition:"top",backgroundSize:"100%"}),r&&(l.backgroundPosition="0% -80px, top",c.mediaIsAtLeastBreakpoint("large")&&(l.backgroundPosition="0% -80px, top"),c.mediaIsAtLeastBreakpoint("nav")&&(l.backgroundPosition="0% -70px, top"),c.mediaIsAtLeastBreakpoint("wide")&&(l.backgroundPosition="0% -80px, top"),c.mediaIsAtLeastBreakpoint("huge")&&(l.backgroundPosition="0% 35%, top"),c.mediaIsAtLeastBreakpoint("max")&&(l.backgroundPosition="0% 30%, top")),i.a.createElement("div",{className:N()("Raf-RepeatingSection",o)},i.a.createElement("div",{className:"Raf-RepeatingSection-bg",style:l}),i.a.createElement("div",{className:"Raf-RepeatingSection-content"},n))});D.propTypes={backgroundUrl:g.a.string,repeatingBgUrl:g.a.string,offsetBg:g.a.bool,className:g.a.string,mediaCtx:g.a.object.isRequired};var q=Object(b.a)(u.b)(D);a(966),a(380);function A(e){return(A="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}function F(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function L(e,t){for(var a=0;a<t.length;a++){var r=t[a];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}function G(e,t){return(G=Object.setPrototypeOf||function(e,t){return e.__proto__=t,e})(e,t)}function U(e){var t=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],(function(){}))),!0}catch(e){return!1}}();return function(){var a,r=M(e);if(t){var n=M(this).constructor;a=Reflect.construct(r,arguments,n)}else a=r.apply(this,arguments);return W(this,a)}}function W(e,t){return!t||"object"!==A(t)&&"function"!=typeof t?function(e){if(void 0===e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return e}(e):t}function M(e){return(M=Object.setPrototypeOf?Object.getPrototypeOf:function(e){return e.__proto__||Object.getPrototypeOf(e)})(e)}var H=function(e){!function(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function");e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,writable:!0,configurable:!0}}),t&&G(e,t)}(o,e);var t,a,r,n=U(o);function o(){return F(this,o),n.apply(this,arguments)}return t=o,(a=[{key:"UNSAFE_componentWillMount",value:function(){var e=this,t=this.props,a=t.width,r=t.height,n=t.top,i=t.right,o=t.bottom,c=t.left;this.positionStyle={width:a,height:r,top:n,right:i,bottom:o,left:c},Object.keys(this.positionStyle).forEach((function(t){e.positionStyle[t]=e.convertPositionValue(e.positionStyle[t])}))}},{key:"convertPositionValue",value:function(e){var t="string"==typeof e;if(t){var a=e.indexOf("%")>0,r=e.indexOf("px")>0;!t||a||r||(e=parseFloat(e))}return"number"==typeof e?e>=0&&e<=1?"".concat(100*e,"%"):"".concat(e,"px"):e}},{key:"render",value:function(){var e=this.props.children;return i.a.createElement("div",{className:N()("Position",this.props.className),style:this.positionStyle},e)}}])&&L(t.prototype,a),r&&L(t,r),o}(i.a.Component);H.propTypes={width:g.a.number,height:g.a.number,top:g.a.number,right:g.a.number,bottom:g.a.number,left:g.a.number,className:g.a.string};var J=H,V=a(37),K=(a(967),function(e){var t=e.background,a=e.breakout,r=e.text,n=e.className;return i.a.createElement("div",{className:N()("BreakoutCard",n),style:{backgroundImage:"url(".concat(t&&t.url,")")}},i.a.createElement("div",{className:"BreakoutCard-text"},r),i.a.createElement("div",{className:"BreakoutCard-image-container"},i.a.createElement(J,{width:a&&a.width,height:a&&a.height,top:a&&a.top,right:a&&a.right,bottom:a&&a.bottom,left:a&&a.left},i.a.createElement(V.a,{className:"BreakoutCard-image",url:a&&a.image&&a.image.url}))))});K.propTypes={background:g.a.object,breakout:g.a.object,text:g.a.string,className:g.a.string};var Z=K,Q=function(e){var t=e.dividerText,a=e.body,r=e.oneFriend,n=e.betweenText,o=e.multipleFriends,c=e.className,l=e.mediaCtx,s=i.a.createElement("div",{className:N()("Raf-FriendsSection","Raf-FriendsSection--mobile",c)},i.a.createElement(y.a,{size:"normal"}),i.a.createElement("div",{className:"contain-large"},i.a.createElement(R.a,{className:"Raf-LabeledDivider--noDivider"},t)),i.a.createElement("div",{className:"contain-medium align-center color-monochrome-white gutter-small-top"},a),i.a.createElement(y.a,{size:"normal"}),i.a.createElement(y.a,{size:"small"}),i.a.createElement("div",{className:"Raf-FriendsSection-cards contain-center"},i.a.createElement(Z,{className:"BreakoutCard--mobile BreakoutCard--one",text:r.body,breakout:r.breakout,background:r.background}),i.a.createElement("div",{className:"Raf-FriendsSection-cards-betweenText"},n),i.a.createElement(Z,{className:"BreakoutCard--mobile BreakoutCard--multiple",text:o.body,breakout:o.breakout,background:o.background})));return l.mediaIsAtLeastBreakpoint("wide")&&(s=i.a.createElement("div",{className:N()("Raf-FriendsSection",c)},i.a.createElement("div",{className:"contain-wide margin-top-medium margin-bottom-small"},i.a.createElement(R.a,{className:"Raf-LabeledDivider--noDivider"},t)),i.a.createElement("div",{className:"contain-medium align-center color-monochrome-white"},a),i.a.createElement(y.a,{size:"large"}),i.a.createElement("div",{className:"Raf-FriendsSection-cards contain-wide"},i.a.createElement(Z,{className:"BreakoutCard--one",text:r.body,breakout:r.breakout,background:r.background}),i.a.createElement("div",{className:"Raf-FriendsSection-cards-betweenText"},n),i.a.createElement(Z,{className:"BreakoutCard--multiple",text:o.body,breakout:o.breakout,background:o.background})))),s};Q.propTypes={dividerText:g.a.string,body:g.a.string,oneFriend:g.a.object,betweenText:g.a.string,multipleFriends:g.a.object,className:g.a.string,mediaCtx:g.a.object.isRequired};var X=Object(b.a)(u.b)(Q),Y=function(e){var t=e.desktopBackgrounds,a=e.mobileBackgrounds,r=e.header,n=e.friendsSection,o=e.className,c=e.mediaCtx,l=null;r&&(l=i.a.createElement(B,{title:r.title,superText:r.superText,body:r.body}));var s=null;n&&(s=i.a.createElement(X,{dividerText:n.dividerText,body:n.body,oneFriend:n.oneFriend,betweenText:n.betweenText,multipleFriends:n.multipleFriends}));var m=i.a.createElement("div",{className:N()("Raf-MastheadSection",o)},i.a.createElement(I,{className:"Raf-Section--large-padding",background:a&&a.masthead&&a.masthead.url},i.a.createElement(y.a,{size:"large"}),l),i.a.createElement(q,{className:"Raf-RepeatingSection",backgroundUrl:a&&a.midsection&&a.midsection.url,repeatingBgUrl:a&&a.repeating&&a.repeating.url},s,i.a.createElement(y.a,{size:"medium"})));return c.mediaIsAtLeastBreakpoint("large")&&(m=i.a.createElement("div",{className:N()("Raf-MastheadSection",o)},i.a.createElement(q,{className:"Raf-RepeatingSection--underSiteNav",backgroundUrl:t&&t.masthead&&t.masthead.url,repeatingBgUrl:t&&t.repeating&&t.repeating.url,offsetBg:!0},i.a.createElement(y.a,{size:"huge"}),l,i.a.createElement(y.a,{size:"large"}),s,i.a.createElement(y.a,{size:"huge"})))),m};Y.propTypes={desktopBackgrounds:g.a.object,mobileBackgrounds:g.a.object,header:g.a.object,className:g.a.string,mediaCtx:g.a.object.isRequired};var $=Object(b.a)(u.b)(Y),ee=a(4),te=(a(968),function(e){var t=e.text,a=e.className;return i.a.createElement("div",{className:N()("Raf-AttentionText",a)},i.a.createElement("div",{className:"Raf-AttentionText-column"}),i.a.createElement("div",{className:"Raf-AttentionText-text"},t),i.a.createElement("div",{className:"Raf-AttentionText-column"}))});te.propTypes={text:g.a.string,className:g.a.string};var ae=te,re=(a(969),function(e){var t=e.text,a=e.className;return i.a.createElement("div",{className:N()("Raf-StackedAttentionText",a)},i.a.createElement("div",{className:"Raf-StackedAttentionText-text"},t))});re.propTypes={text:g.a.string,className:g.a.string};var ne=re,ie=(a(970),function(e){var t=e.dividerText,a=e.body,r=e.attentionText,n=e.className,o=Object(ee.a)(),c=o.mediaClassnames,l=(0,o.mediaIsAtLeastBreakpoint)("large")?ae:ne;return i.a.createElement("div",{className:N()("Raf-RewardsSection",n)},i.a.createElement("div",{className:c({original:"contain-large margin-top-medium margin-bottom-small",large:"!margin-bottom-small margin-bottom-normal"})},i.a.createElement(R.a,null,t)),i.a.createElement("div",{className:"contain-medium align-center color-monochrome-white"},a),i.a.createElement(l,{className:c({original:"Raf-StackedAttentionText--small-margin",large:"!Raf-StackedAttentionText--small-margin Raf-AttentionText--large-margin"}),text:r}))});ie.propTypes={dividerText:g.a.string,body:g.a.string,attentionText:g.a.string,className:g.a.string};var oe=ie,ce=a(81),le=(a(971),a(166)),se=(a(972),function(e){var t=e.className,a=e.rewardName,r=e.subtitle,n=e.backgroundImage,o=e.foregroundImage,c=e.breakoutImage,s=e.wallpaperImage,m=e.noModal,d={},u="";c&&c.url?d.backgroundImage="url(".concat(c.url,")"):u="Raf-RewardCard--noBreakout";var f=null,p=i.a.createElement("div",{className:"Raf-RewardCard-link"},i.a.createElement("div",{className:"Raf-RewardCard-background",style:{backgroundImage:"url(".concat(n&&n.url,")")}},i.a.createElement("div",{className:"Raf-RewardCard-foregroundWrapper"},i.a.createElement("div",{className:"Raf-RewardCard-foreground",style:{backgroundImage:"url(".concat(o&&o.url,")")}})),i.a.createElement("div",{className:"Raf-RewardCard-border"}),i.a.createElement("div",{className:"Raf-RewardCard-breakout",style:d})),i.a.createElement("div",{className:"Raf-RewardCard-rewardName"},a),i.a.createElement("div",{className:"Raf-RewardCard-subtitle"},r));if(m)f=i.a.createElement("div",{className:N()("Raf-RewardCard",u,t)},p);else{var g="modal-reward-card-".concat(a,"-").concat(r);f=i.a.createElement("div",{className:N()("Raf-RewardCard",u,t)},i.a.createElement(l.ModalToggle,{className:"Raf-RewardCard-modal-toggle",modalId:g},p),i.a.createElement(le.a,{modalId:g,groupId:"group-reward-cards",image:s}))}return f});se.propTypes={rewardName:g.a.string,subtitle:g.a.string,backgroundImage:g.a.object,foregroundImage:g.a.object,breakoutImage:g.a.object,wallpaperImage:g.a.object,className:g.a.string};var me=se,de=function(e){var t=e.rewardCards,a=e.className,r=e.mediaCtx,n=i.a.createElement(ce.b,null,t.map((function(e){return i.a.createElement("div",{key:"reward-card-".concat(e.rewardName,"-").concat(e.subtitle),className:"Slider-slide Slider-slide--gutters fixed-static-tiny"},i.a.createElement(me,e))})));return r.mediaIsAtLeastBreakpoint("large")&&(n=i.a.createElement("div",{className:"Grid Grid--center Grid--gutters margin-top-small"},t.map((function(e){return i.a.createElement("div",{key:"reward-card-".concat(e.rewardName,"-").concat(e.subtitle),className:"Grid-1of3"},i.a.createElement(me,e))})))),i.a.createElement("div",{className:N()("Raf-RewardCards",a)},n)};de.propTypes={rewardCards:g.a.array,className:g.a.string,mediaCtx:g.a.object.isRequired};var ue=Object(b.a)(u.b)(de),fe=(a(973),function(e){var t=e.title,a=e.body,r=e.image,n=e.className,o=e.mediaCtx,c=null;r&&(c=i.a.createElement(V.a,{className:"Raf-Disclaimer-image",url:r&&r.url,title:t}));var l=i.a.createElement("div",{className:N()("Raf-Disclaimer Raf-Disclaimer--smallImage",n)},c,i.a.createElement("div",{className:"Raf-Disclaimer-title contain-large"},t),i.a.createElement("div",{className:"Raf-Disclaimer-body contain-large"},a));return o.mediaIsAtLeastBreakpoint("large")&&(l=i.a.createElement("div",{className:N()("Raf-Disclaimer",n)},c,i.a.createElement("div",{className:"Raf-Disclaimer-title contain-large color-monochrome-white"},t),i.a.createElement("div",{className:"Raf-Disclaimer-body contain-large"},a))),l});fe.propTypes={text:g.a.string,image:g.a.object,className:g.a.string,mediaCtx:g.a.object.isRequired};var pe=Object(b.a)(u.b)(fe);a(974);function ge(){return(ge=Object.assign||function(e){for(var t=1;t<arguments.length;t++){var a=arguments[t];for(var r in a)Object.prototype.hasOwnProperty.call(a,r)&&(e[r]=a[r])}return e}).apply(this,arguments)}var be=function(e){var t=e.className,a=e.title,r=e.attentionText,n=e.rewardCards,o=e.disclaimerText,c=e.mediaCtx,l=i.a.createElement("div",{className:N()("Raf-RecruitRewards",t)},i.a.createElement(R.a,{className:"contain-large"},a),i.a.createElement(ne,{className:"Raf-StackedAttentionText--small-margin",text:r}),i.a.createElement("div",{className:"contain-small"},i.a.createElement("div",{className:"Grid Grid--center Grid--gutters margin-top-small"},n.map((function(e){return i.a.createElement("div",{key:"reward-card-".concat(e.rewardName,"-").concat(e.subtitle),className:"Grid-1of2"},i.a.createElement(me,ge({className:"Raf-RewardCard--noHover Raf-RewardCard--noName"},e,{noModal:!0})))})))),i.a.createElement(k.a,{className:"Raf-RecruitRewards-disclaimer gutter-normal-top contain-medium align-center",htmlString:o}));return c.mediaIsAtLeastBreakpoint("large")&&(l=i.a.createElement("div",{className:N()("Raf-RecruitRewards",t)},i.a.createElement(R.a,{className:"contain-large"},a),i.a.createElement(ae,{className:"Raf-AttentionText--large-margin",text:r}),i.a.createElement("div",{className:"contain-medium"},i.a.createElement("div",{className:"Grid Grid--center Grid--gutters margin-top-medium gutter-large"},n.map((function(e){return i.a.createElement("div",{key:"reward-card-".concat(e.rewardName,"-").concat(e.subtitle),className:"Grid-1of2"},i.a.createElement(me,ge({className:"Raf-RewardCard--noHover Raf-RewardCard--noName"},e,{noModal:!0})))})))),i.a.createElement(k.a,{className:"Raf-RecruitRewards-disclaimer gutter-medium-top contain-medium align-center",htmlString:o}))),l};be.propTypes={title:g.a.string,attentionText:g.a.string,rewardCards:g.a.array,disclaimerText:g.a.string,mediaCtx:g.a.object.isRequired,className:g.a.string};var ve=Object(b.a)(u.b)(be),ye=(a(975),function(e){var t=e.background,a=e.breakout,r=e.title,n=e.upperBody,o=e.lowerBody,c=e.dividerText,l=e.screenshotMobile,s=e.screenshotDesktop,m=e.className,d=e.mediaCtx,u=i.a.createElement("div",{className:N()("Raf-GettingStartedSection",m)},i.a.createElement(P.a,{background:{url:t&&t.url},className:"Pane--bgTop"},i.a.createElement(y.a,{size:"medium"}),i.a.createElement(B,{title:r,body:n}),i.a.createElement(y.a,{size:"normal"}),i.a.createElement("div",{className:"contain-large"},i.a.createElement(R.a,null,c),i.a.createElement(y.a,{size:"normal"}),i.a.createElement(V.a,{className:"Raf-GettingStartedSection-screenshot Raf-GettingStartedSection-screenshot--mobile",url:l&&l.url}),i.a.createElement(y.a,{size:"normal"}),i.a.createElement("div",{className:"align-center color-monochrome-white"},o),i.a.createElement(y.a,{size:"medium "}))));if(d.mediaIsAtLeastBreakpoint("large")){var f=null;d.mediaIsAtLeastBreakpoint("huge")&&(f=i.a.createElement(J,{width:a&&a.width,height:a&&a.height,top:a&&a.top,right:a&&a.right,bottom:a&&a.bottom,left:a&&a.left},i.a.createElement(V.a,{className:"Raf-GettingStartedSection-breakout",url:a.image.url}))),u=i.a.createElement("div",{className:N()("Raf-GettingStartedSection",m)},i.a.createElement(P.a,{background:{url:t&&t.url},className:"Pane--bgTop"},f,i.a.createElement(y.a,{size:"medium"}),i.a.createElement(B,{title:r,body:n}),i.a.createElement(y.a,{size:"medium"}),i.a.createElement("div",{className:"contain-wide"},i.a.createElement(R.a,null,c),i.a.createElement(y.a,{size:"medium"}),i.a.createElement(V.a,{className:"Raf-GettingStartedSection-screenshot",url:s&&s.url}),i.a.createElement(y.a,{size:"normal"}),i.a.createElement("div",{className:"align-center color-monochrome-white"},o),i.a.createElement(y.a,{size:"large"}))))}return u});ye.propTypes={background:g.a.object,breakout:g.a.object,title:g.a.string,upperBody:g.a.string,lowerBody:g.a.string,dividerText:g.a.string,screenshotMobile:g.a.object,screenshotDesktop:g.a.object,className:g.a.string,mediaCtx:g.a.object.isRequired};var he=Object(b.a)(u.b)(ye),Ee=function(e){var t=e.model,a=e.mediaCtx;if(!t)return i.a.createElement(v.a,{code:404});var r=t.mastheadSection,n=t.friendsSection,o=null;r&&(o=i.a.createElement($,{desktopBackgrounds:r.desktopBackgrounds,mobileBackgrounds:r.mobileBackgrounds,header:r.header,friendsSection:n}));var c=t.rewardsContainer,l=t.rewardsSection,s=null;l&&(s=i.a.createElement(oe,{dividerText:l.dividerText,body:l.body,attentionText:l.attentionText}));var m=t.rewardCards,d=null;m&&(d=i.a.createElement(ue,{rewardCards:m}));var u=t.gameTimeDisclaimer,f=null;u&&(f=i.a.createElement(pe,{className:"Raf-Disclaimer--gameTime",image:u.image,title:u.title,body:u.body}));var p=t.rewardsDisclaimer,g=null;p&&(g=i.a.createElement(pe,{className:"Raf-Disclaimer--treasureBox",image:p.image,title:p.title,body:p.body}));var b=t.recruitRewards,E=null;b&&(E=i.a.createElement(ve,{title:b.title,attentionText:b.attentionText,rewardCards:b.rewardCards,disclaimerText:b.disclaimerText}));var N=t.gettingStarted,k=null;N&&(k=i.a.createElement(he,{background:N.background,breakout:N.breakout,title:N.title,upperBody:N.upperBody,dividerText:N.dividerText,screenshotMobile:N.screenshotMobile,screenshotDesktop:N.screenshotDesktop,lowerBody:N.lowerBody}));var w=t.faq,R=null;w&&(R=i.a.createElement(C,{title:w.title,dividerText:w.dividerText,sections:w.sections,disclaimerText:w.disclaimerText}));var x=i.a.createElement("div",{className:"RafApp"},o,i.a.createElement(h.a,null),i.a.createElement(q,{repeatingBgUrl:c&&c.background&&c.background.url},i.a.createElement(y.a,{size:"normal"}),s,i.a.createElement(y.a,{size:"small"}),i.a.createElement(y.a,{size:"small"}),i.a.createElement(y.a,{size:"small"}),d,i.a.createElement(y.a,{size:"normal"}),f,i.a.createElement(y.a,{size:"normal"}),g,i.a.createElement(y.a,{size:"large"}),E,i.a.createElement(y.a,{size:"medium"})),i.a.createElement(h.a,null),k,i.a.createElement(h.a,null),i.a.createElement(q,{background:w&&w.background&&w.background.url},i.a.createElement(y.a,{size:"medium"}),R,i.a.createElement(y.a,{size:"medium"})));return a.mediaIsAtLeastBreakpoint("large")&&(x=i.a.createElement("div",{className:"RafApp"},o,i.a.createElement(h.a,null),i.a.createElement(q,{repeatingBgUrl:c&&c.background&&c.background.url},i.a.createElement(y.a,{size:"normal"}),i.a.createElement(y.a,{size:"medium"}),s,i.a.createElement(y.a,{size:"medium"}),i.a.createElement("div",{className:"contain-large"},d),i.a.createElement(y.a,{size:"large"}),f,i.a.createElement(y.a,{size:"medium"}),g,i.a.createElement(y.a,{size:"large"}),i.a.createElement(y.a,{size:"large"}),E,i.a.createElement(y.a,{size:"large"})),i.a.createElement(h.a,null),k,i.a.createElement(h.a,null),i.a.createElement(q,{background:w&&w.background&&w.background.url},i.a.createElement(y.a,{size:"medium"}),R,i.a.createElement(y.a,{size:"medium"})))),x};Ee.propTypes={model:g.a.object.isRequired};var Ne=Object(b.a)(u.b)(Ee),ke=a(61),we=a(50),Re=a(94),xe=Object(r.hot)(Object(u.c)((function(e){return i.a.createElement(ke.a,null,i.a.createElement(f.a,null,i.a.createElement(we.b,null,i.a.createElement(s.a,{client:Re.a},i.a.createElement(l.ModalContextProvider,null,i.a.createElement(Ne,{model:e.model}))))))}))),Oe=d()("recruit-a-friend-mount"),Se=Oe.mountElem,Te=Oe.initialState;c.a.render(i.a.createElement(xe,{model:Te}),Se)},145:function(e,t,a){"use strict";var r=a(0),n=a.n(r),i=a(1),o=a.n(i),c=a(2),l=a.n(c),s=a(85),m=(a(216),function(e){var t=e.items,a=e.className,r=null;return t&&t.length>0&&(r=n.a.createElement(s.a,{className:l()("Accordion",a),allowZeroExpanded:!0,allowMultipleExpanded:!0},t.map((function(e,t){return n.a.createElement(s.b,{key:"accordion-item-".concat(e.key||t)},n.a.createElement(s.d,null,n.a.createElement(s.c,null,e.headingContent)),n.a.createElement(s.e,null,e.bodyContent))})))),r});m.propTypes={items:o.a.array.isRequired,className:o.a.string},t.a=m},166:function(e,t,a){"use strict";var r=a(0),n=a.n(r),i=a(1),o=a.n(i),c=a(2),l=a.n(c),s=a(18);a(300),a(336);function m(e,t){var a=Object.keys(e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);t&&(r=r.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),a.push.apply(a,r)}return a}function d(e){for(var t=1;t<arguments.length;t++){var a=null!=arguments[t]?arguments[t]:{};t%2?m(Object(a),!0).forEach((function(t){u(e,t,a[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(a)):m(Object(a)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(a,t))}))}return e}function u(e,t,a){return t in e?Object.defineProperty(e,t,{value:a,enumerable:!0,configurable:!0,writable:!0}):e[t]=a,e}var f=function(e){var t=e.description,a=e.modalId,r=e.groupId,i=e.image,o=e.className,c=e.children;if(!i)return null;var m=d(d({},i),{},{src:i.src||i.url,title:t});return n.a.createElement(s.ControlledLightbox,{className:l()("ControlledLightbox Photoswipe",o),modalId:a,groupId:r,image:m,options:{history:!1,bgOpacity:1,showHideOpacity:!1,showAnimationDuration:1,hideAnimationDuration:450,arrowEl:!1,shareEl:!1,escKey:!1,closeEl:!1,closeElClasses:["container","bg","zoom-wrap"],closeOnScroll:!1,closeOnVerticalDrag:!1,pinchToClose:!1}},c)};f.propTypes={modalId:o.a.string,groupId:o.a.string,image:o.a.object.isRequired,className:o.a.string,description:o.a.string},t.a=f},216:function(e,t,a){},220:function(e,t,a){"use strict";var r=a(1),n=function(e){var t=e.code;if(t){var a=new Error("Manual React error, code ".concat(t));throw a.customCode=t,a}return null};n.propTypes={code:a.n(r).a.number},t.a=n},28:function(e,t,a){"use strict";var r=a(0),n=a.n(r),i=a(1),o=a.n(i),c=a(2),l=a.n(c),s=function(e){var t=e.size,a=e.className;return n.a.createElement("div",{className:l()("space-".concat(t),a)})};s.propTypes={size:o.a.string,className:o.a.string},s.defaultProps={size:"normal",className:""},t.a=s},336:function(e,t,a){},37:function(e,t,a){"use strict";var r=a(0),n=a.n(r),i=a(1),o=a.n(i),c=function(e){var t=e.url,a=e.description,r=e.title,i=e.className,o=e.style,c=e.width,l=e.height;return t?n.a.createElement("img",{width:c,height:l,className:i,src:t,alt:a||r,style:o}):null};c.propTypes={url:o.a.string.isRequired,className:o.a.string,description:o.a.string,title:o.a.string,style:o.a.object,width:o.a.number,height:o.a.number},t.a=c},42:function(e,t){e.exports=__WOW_UI_CORE__.default.analytics},47:function(e,t){e.exports=__WOW_UI_CORE__.default.pageUrl},55:function(e,t){e.exports=function(e){var t=document.getElementById(e),a=null,r=t.data("initial-state-variable-name");return a=r?window[r]:JSON.parse(t.data("initial-state")),{mountElem:t,initialState:a}}},63:function(e,t,a){"use strict";var r=a(1),n=a.n(r),i=a(0),o=a.n(i),c=a(2),l=a.n(c),s=(a(236),function(e){var t=e.children,a=e.className;return o.a.createElement("div",{className:l()("LabeledDivider",a)},o.a.createElement("div",{className:"LabeledDivider-children LabeledDivider-children--text"},t))});s.propTypes={className:n.a.string},t.a=s},69:function(e,t){e.exports=__WOW_UI_CORE__.default},77:function(e,t){e.exports=__WOW_UI_CORE__.default.mouse},79:function(e,t){e.exports=__WOW_UI_CORE__.default.scrollbar},81:function(e,t,a){"use strict";a.d(t,"b",(function(){return R})),a.d(t,"a",(function(){return u}));var r=a(0),n=a.n(r),i=a(1),o=a.n(i),c=a(2),l=a.n(c),s=a(187),m=a.n(s),d=function(e){var t=e.className,a=e.children;return n.a.createElement("div",{className:l()("Slider-slide",t)},a)};d.propTypes={className:o.a.string};var u=d;a(234);function f(e){return(f="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}function p(e,t){var a=Object.keys(e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);t&&(r=r.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),a.push.apply(a,r)}return a}function g(e){for(var t=1;t<arguments.length;t++){var a=null!=arguments[t]?arguments[t]:{};t%2?p(Object(a),!0).forEach((function(t){w(e,t,a[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(a)):p(Object(a)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(a,t))}))}return e}function b(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function v(e,t){for(var a=0;a<t.length;a++){var r=t[a];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}function y(e,t){return(y=Object.setPrototypeOf||function(e,t){return e.__proto__=t,e})(e,t)}function h(e){var t=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],(function(){}))),!0}catch(e){return!1}}();return function(){var a,r=k(e);if(t){var n=k(this).constructor;a=Reflect.construct(r,arguments,n)}else a=r.apply(this,arguments);return E(this,a)}}function E(e,t){return!t||"object"!==f(t)&&"function"!=typeof t?N(e):t}function N(e){if(void 0===e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return e}function k(e){return(k=Object.setPrototypeOf?Object.getPrototypeOf:function(e){return e.__proto__||Object.getPrototypeOf(e)})(e)}function w(e,t,a){return t in e?Object.defineProperty(e,t,{value:a,enumerable:!0,configurable:!0,writable:!0}):e[t]=a,e}var R=function(e){!function(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function");e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,writable:!0,configurable:!0}}),t&&y(e,t)}(o,e);var t,a,r,i=h(o);function o(){var e;b(this,o);for(var t=arguments.length,a=new Array(t),r=0;r<t;r++)a[r]=arguments[r];return w(N(e=i.call.apply(i,[this].concat(a))),"state",{slidesLength:0,initialized:!1}),e}return t=o,(a=[{key:"componentDidMount",value:function(){this.init()}},{key:"componentWillUnmount",value:function(){this.deinit()}},{key:"componentDidUpdate",value:function(e){if(this.flickity){var t=this.props,a=t.index,r=t.sliderOptions;a!==e.index&&this.flickity.select(a),r&&void 0!==r.pageDots&&this.flickity.options.pageDots!==r.pageDots&&(this.deinit(),this.init())}}},{key:"applyPresets",value:function(){this.sliderRef.classList.contains("Slider--freeScroll")?this.options=g(g({},o.defaults),o.freeScrolling):this.options=o.defaults}},{key:"applyOptionOverrides",value:function(){var e=this.props.sliderOptions;e&&(this.options=g(g({},this.options),e))}},{key:"initFlickity",value:function(){this.flickity=new m.a(this.sliderRef,this.options),this.setState({slidesLength:this.flickity.slides.length}),this.flickity.on("dragStart",this.onDragStart.bind(this)),this.flickity.on("dragEnd",this.onDragEnd.bind(this)),this.flickity.on("change",this.onChanged.bind(this)),this.setState({initialized:!0})}},{key:"resize",value:function(){this.sliderRef&&this.flickity&&(this.sliderRef.querySelector(".flickity-viewport").style.height=null,this.flickity.resize())}},{key:"init",value:function(){this.applyPresets(),this.applyOptionOverrides(),this.initFlickity(),window.addEventListener("resize",this.onWindowResize.bind(this))}},{key:"deinit",value:function(){this.flickity&&this.flickity.destroy(),window.removeEventListener("resize",this.onWindowResize)}},{key:"onDragStart",value:function(){this.sliderRef.classList.add("Slider--isGrabbing")}},{key:"onDragEnd",value:function(){this.sliderRef.classList.remove("Slider--isGrabbing")}},{key:"onChanged",value:function(e){var t=this.props.onChange;t&&t(e,this.flickity)}},{key:"onWindowResize",value:function(){this.resizeInterval&&clearInterval(this.resizeInterval),this.resizeInterval=setTimeout(this.resize.bind(this),o.resizeDelay)}},{key:"render",value:function(){var e=this,t=this.props,a=t.className,r=t.children,i=t.topOverflow,o=t.sliderOptions,c=this.state,s=c.slidesLength,m=c.initialized,d=!!o&&o.wrapAround;return n.a.createElement("div",{className:l()(a,"Slider",{"Slider--topOverflow":i}),ref:function(t){e.sliderRef=t},"data-initialized":m,"data-left-more":this.flickity&&(d||this.flickity.selectedIndex>0),"data-right-more":this.flickity&&(d||this.flickity.selectedIndex<s-1),"data-queryselectoralways-ignore":!0},r)}}])&&v(t.prototype,a),r&&v(t,r),o}(n.a.Component);w(R,"defaults",{cellSelector:".Slider-slide",prevNextButtons:!1,pageDots:!1,freeScroll:!1,cellAlign:"center",contain:!0,selectedAttraction:.06,friction:.3,watchCSS:!1,wrapAround:!1}),w(R,"freeScrolling",{freeScroll:!0,freeScrollFriction:.15}),w(R,"resizeDelay",10),R.propTypes={className:o.a.string,sliderOptions:o.a.object,topOverflow:o.a.bool,onChange:o.a.func,index:o.a.number},R.defaultProps={topOverflow:!0,onChange:function(){},index:0}},9:function(e,t){e.exports=__WOW_UI_CORE__.default.querySelectorAlways},94:function(e,t,a){"use strict";var r,n,i=a(250),o=a(258),c=a(257),l=a(251),s=a.n(l),m=a(149),d=a(48),u=a.n(d),f=function(){return!1},p=function(e){return e.documentId},g=Object(i.a)(((r={generateHash:p}).disable=f,r)),b=Object(o.a)({uri:"/graphql",fetch:s.a,headers:{"x-static":(n=u.a.parse(window.location.search),!(!n||!{}.hasOwnProperty.call(n,"static"))),"accept-language":document.querySelector("html").attr("lang")}}),v=g.concat(b),y=new m.c({cache:new c.a,link:v,a:1,connectToDevTools:!0});t.a=y},960:function(e,t,a){a(96),a(92),e.exports=a(1058)},961:function(e,t,a){},962:function(e,t,a){},963:function(e,t,a){},964:function(e,t,a){},965:function(e,t,a){},966:function(e,t,a){},967:function(e,t,a){},968:function(e,t,a){},969:function(e,t,a){},970:function(e,t,a){},971:function(e,t,a){},972:function(e,t,a){},973:function(e,t,a){},974:function(e,t,a){},975:function(e,t,a){}},[[960,2,0,1,3,4]]]);