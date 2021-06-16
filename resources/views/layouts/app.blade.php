<!DOCTYPE html>
<html lang="ru-RU">
   <head>
      @meta_tags
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="referrer" content="no-referrer-when-downgrade">
      <link rel="shortcut icon" type="image/x-icon" href="{{ asset('forum/static/images/icons/wow-favicon.ico') }}" />
      <script>var dataLayer = dataLayer || [];
         dataLayer.push({"locale":"ru-RU", "serverRegion":"eu", "region":"eu", "localeRegion":"eu", "project":"wow", @guest "authenticated":"0", "hasGameTime":"0" @else "authenticated":"1", "userId":{{ Auth::id() }}, "hasGameTime":"0" @endguest });
      </script>
      <!-- Global site tag (gtag.js) - Google Analytics -->
      <script async src="https://www.googletagmanager.com/gtag/js?id={{ setting('site.googletagmanager') }}"></script>
      <script>
         window.dataLayer = window.dataLayer || [];
         function gtag(){dataLayer.push(arguments);}
         gtag('js', new Date());
         gtag('config', '{{ setting('site.googletagmanager') }}');
      </script>
      <script>
         window.fbAsyncInit = function() {
             FB.init({
                 appId      : '335867654386208',
                 cookie     : true,
                 xfbml      : true,
                 version    : 'v9.0'
             });
             FB.AppEvents.logPageView();
         };
         (function(d, s, id){
             var js, fjs = d.getElementsByTagName(s)[0];
             if (d.getElementById(id)) {return;}
             js = d.createElement(s); js.id = id;
             js.src = "https://connect.facebook.net/en_US/sdk.js";
             fjs.parentNode.insertBefore(js, fjs);
         }(document, 'script', 'facebook-jssdk'));
      </script>
      <script>
         window.__WOW_UI_PUBLIC_PATH__ = "{{ config('app.asset_url') }}/static/"
      </script>
      <script src="{{ asset('static/core.04c3634bf4bf834dbb46.js') }}"></script>
      @stack('characters')
      <script id="init">window.trigger("init");</script>
      <link href="{{ asset('static/core.b15be49248362418ef78.css') }}" rel="stylesheet" type="text/css"/>
      <link href="{{ asset('static/styles/navbar.css') }}?v=8.27.2" rel="stylesheet">
      <link href="{{ asset('static/styles/photoswipe.css') }}?v=8.27.2" rel="stylesheet">
      <link href="{{ asset('static/styles/izimodal.css') }}?v=8.27.2" rel="stylesheet">
      <link href="{{ asset('static/styles/simplebar.css') }}?v=8.27.2" rel="stylesheet">
      @stack('css')
   </head>
   <body class="ru-ru">
      <div class="body">
         <div class="page">
            @include('layouts.navigation')
            <main id="main" role="main">
               {{ $slot }}
            </main>
            <footer id="footer">
               <div class="Divider"></div>
               <div class="Pane Pane--dirtLight Pane--bgBottom bordered">
                  <div class="Pane-bg">
                     <div class="Pane-overlay"></div>
                  </div>
                  <div class="Pane-content">
                     <div class="gutter-normal gutter-vertical">
                        <div class="SocialLinks SocialLinks--wow">
                           <div class="SocialLinks-title">@lang('footer.footer_1', ['name' => setting('site.title')])</div>
                           <div class="SocialLinks-links">
                              @if(setting('socseti.facebook'))
                              <a class="Link SocialLinks-link" href="{{setting('socseti.facebook')}}" data-analytics="sns-refer" data-analytics-placement="Footer - facebook">
                                 <span class="Icon Icon--social-facebook Icon--medium SocialLinks-icon">
                                    <svg class="Icon-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false">
                                       <use xlink:href="/static/components/Icon/svg/social-facebook.20d2ed4f5a690fe838af4c2beb4ba8be.svg#social-facebook"></use>
                                    </svg>
                                 </span>
                              </a>
                              @endif
                              @if(setting('socseti.twitter'))
                              <a class="Link SocialLinks-link" href="{{setting('socseti.twitter')}}" data-analytics="sns-refer" data-analytics-placement="Footer - twitter">
                                 <span class="Icon Icon--social-twitter Icon--medium SocialLinks-icon">
                                    <svg class="Icon-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false">
                                       <use xlink:href="/static/components/Icon/svg/social-twitter.fe8ef9d809c5b5099e326f60b39ff940.svg#social-twitter"></use>
                                    </svg>
                                 </span>
                              </a>
                              @endif
                              @if(setting('socseti.youtube'))
                              <a class="Link SocialLinks-link" href="{{setting('socseti.youtube')}}" data-analytics="sns-refer" data-analytics-placement="Footer - youtube">
                                 <span class="Icon Icon--social-youtube Icon--medium SocialLinks-icon">
                                    <svg class="Icon-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false">
                                       <use xlink:href="/static/components/Icon/svg/social-youtube.f56a46d1a6cc2ffd841bc4a8d1de3d3d.svg#social-youtube"></use>
                                    </svg>
                                 </span>
                              </a>
                              @endif
                              @if(setting('socseti.reddit'))
                              <a class="Link SocialLinks-link" href="{{setting('socseti.reddit')}}" data-analytics="sns-refer" data-analytics-placement="Footer - reddit">
                                 <span class="Icon Icon--social-reddit Icon--medium SocialLinks-icon">
                                    <svg class="Icon-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false">
                                       <use xlink:href="/static/components/Icon/svg/social-reddit.c70b106f4cf581aae6b314f337d07921.svg#social-reddit"></use>
                                    </svg>
                                 </span>
                              </a>
                              @endif
                              @if(setting('socseti.vk'))
                              <a class="Link SocialLinks-link" href="{{ setting('socseti.vk') }}" data-analytics="sns-refer" data-analytics-placement="Footer - vkontakte">
                                 <span class="Icon Icon--social-vkontakte Icon--medium SocialLinks-icon">
                                    <svg class="Icon-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false">
                                       <use xlink:href="/static/components/Icon/svg/social-vkontakte.57ff1545fb0a71780640cc4f07ad2be3.svg#social-vkontakte"></use>
                                    </svg>
                                 </span>
                              </a>
                              @endif
                              @if(setting('socseti.instagram'))
                              <a class="Link SocialLinks-link" href="{{setting('socseti.instagram')}}" data-analytics="sns-refer" data-analytics-placement="Footer - instagram">
                                 <span class="Icon Icon--social-instagram Icon--medium SocialLinks-icon">
                                    <svg class="Icon-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false">
                                       <use xlink:href="/static/components/Icon/svg/social-instagram.d8f4f26719bf05eaaa420654df619d00.svg#social-instagram"></use>
                                    </svg>
                                 </span>
                              </a>
                              @endif
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               @include('layouts.footer')
            </footer>
             <!--aside><div class="PersistentCtaMount PersistentCtaMount--bcc" data-props='{"title":"Burning Crusade Classic","subtitle":"Выход игры состоится через","completedSubtitle":"Доступно сейчас\n","prepurchaseButton":{"text":"Подробности","url":"https://worldofwarcraft.com/ru-ru/wowclassic","analytics":{"event":"ctaOther","event_action":"","event_category":"","event_label":"learn more"}},"purchaseButton":{"text":"","url":"","analytics":{"event":"","event_action":"","event_category":"","event_label":""}},"countdownTimer":{"endTimestamp":1622584860,"daysLabel":"дн.","hoursLabel":"ч.","minutesLabel":"Мин.","secondsLabel":"сек"},"forceCompletion":false,"hideTimer":false}'></div></aside-->
         </div>
      </div>
      <div class="Photoswipe pswp Photoswipe--modal Photoswipe--wow" name="modal" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="pswp__bg"></div>
         <div class="pswp__scroll-wrap">
            <div class="pswp__container">
               <div class="pswp__item"></div>
               <div class="pswp__item"></div>
               <div class="pswp__item"></div>
            </div>
            <div class="pswp__ui pswp__ui--hidden">
               <div class="pswp__top-bar Photoswipe-top">
                  <div class="pswp__counter"></div>
                  <button class="pswp__button pswp__button--close" title="Закрыть (Esc)"></button><button class="pswp__button pswp__button--share" title="Поделиться"></button><button class="pswp__button pswp__button--fs" title="Во весь экран"></button><button class="pswp__button pswp__button--zoom" title="Увеличить/уменьшить масштаб"></button>
                  <div class="pswp__preloader">
                     <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                           <div class="pswp__preloader__donut"></div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                  <div class="pswp__share-tooltip"></div>
               </div>
               <div class="pswp__caption">
                  <div class="pswp__caption__center"></div>
               </div>
               <button class="pswp__button pswp__button--arrow--left" title="Назад (стрелка влево)"></button><button class="pswp__button pswp__button--arrow--right" title="Далее (стрелка вправо)"></button>
               <div class="Photoswipe-prev" title="Назад (стрелка влево)"><span class="Icon Icon--prev"></span></div>
               <div class="Photoswipe-next" title="Далее (стрелка вправо)"><span class="Icon Icon--next"></span></div>
            </div>
         </div>
      </div>
      <div class="Photoswipe pswp Photoswipe--lightbox Photoswipe--wow" name="lightbox" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="pswp__bg"></div>
         <div class="pswp__scroll-wrap">
            <div class="pswp__container">
               <div class="pswp__item"></div>
               <div class="pswp__item"></div>
               <div class="pswp__item"></div>
            </div>
            <div class="pswp__ui pswp__ui--hidden">
               <div class="pswp__top-bar Photoswipe-top">
                  <div class="pswp__counter"></div>
                  <button class="pswp__button pswp__button--close" title="Закрыть (Esc)"></button><button class="pswp__button pswp__button--share" title="Поделиться"></button><button class="pswp__button pswp__button--fs" title="Во весь экран"></button><button class="pswp__button pswp__button--zoom" title="Увеличить/уменьшить масштаб"></button>
                  <div class="pswp__preloader">
                     <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                           <div class="pswp__preloader__donut"></div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                  <div class="pswp__share-tooltip"></div>
               </div>
               <div class="pswp__caption">
                  <div class="pswp__caption__center"></div>
               </div>
               <button class="pswp__button pswp__button--arrow--left" title="Назад (стрелка влево)"></button><button class="pswp__button pswp__button--arrow--right" title="Далее (стрелка вправо)"></button>
               <div class="Photoswipe-prev" title="Назад (стрелка влево)"><span class="Icon Icon--prev"></span></div>
               <div class="Photoswipe-next" title="Далее (стрелка вправо)"><span class="Icon Icon--next"></span></div>
            </div>
         </div>
      </div>
      <script src="{{ asset('static/scripts/navbar.js') }}?v=8.27.2"></script>
      @stack('scripts')
      <script>window.dispatchEvent(new CustomEvent("navbarAddFooterLinks", {
         detail: {
             secondary: [{
                 text: "Файлы cookie",
                 href: "/cookies"
             }]
         }
         }));
      </script>
      <script type="text/javascript" id="">
          (function(a,e,f,g,b,c,d){a.GoogleAnalyticsObject=b;a[b]=a[b]||function(){(a[b].q=a[b].q||[]).push(arguments)};a[b].l=1*new Date;c=e.createElement(f);d=e.getElementsByTagName(f)[0];c.async=1;c.src=g;d.parentNode.insertBefore(c,d)})(window,document,"script","https://www.google-analytics.com/analytics.js","ga");ga("create","UA-50249600-14","auto");ga(function(a){dataLayer.push({gaClientId:a.get("clientId"),event:"gaHasLoaded"})});
      </script>
   </body>
</html>
