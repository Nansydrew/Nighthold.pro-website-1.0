<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" class="ru-ru bnet-wcag" >
   <head>
      <meta http-equiv="imagetoolbar" content="false" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <title>@lang('account.login_1', ['name' => setting('site.title')])</title>
      <link rel="shortcut icon" href="//bneteu-a.akamaihd.net/login/static/images/meta/favicon.0gxnz.ico" />
      <script nonce="yEQ7rZAlT0" type="text/javascript">
         var BlzCookieConsent = {
             host: 'battle.net',
             onetrustScriptUrl: '',
             whitelistedCookies: ['']
         }
      </script>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <script type="text/javascript" src="{{ asset('static/js/gdpr/cookie-consent-filter-compat.3h0zV.js') }}?v=58-1"></script>
      <!--[if gt IE 8]><!-->
      <link rel="stylesheet" type="text/css" media="all" href="{{ asset('static/css/toolkit/bnet-wcag-web.min.2gIxJ.css') }}" />
      <!-- <![endif]-->
      <!--[if IE 8]>
      <link rel="stylesheet" type="text/css" media="all" href="{{ asset('static/css/toolkit/bnet-wcag-web-ie8.min.css') }}?v=58-1" />
      <![endif]-->
      <link rel="stylesheet" type="text/css" media="all" href="{{ asset('static/css/login/global.min.1bqOQ.css') }}?v=1" />
      <link rel="stylesheet" type="text/css" media="all" href="{{ asset('static/css/nav-client/nav-client.26C4w.css') }}" />
      <link rel="stylesheet" type="text/css" media="(max-width:800px)" href="{{ asset('static/css/nav-client/nav-client-responsive.2L8V6.css') }}" />
      <!--[if IE 8]>
      <link rel="stylesheet" type="text/css" media="all" href="{{ asset('static/css/login/ie8.3AZrx.css') }}" />
      <![endif]-->
      <script type="text/javascript" src="{{ asset('static/js/third-party/jquery.min.254UY.js') }}?v=58-1"></script>
      <script type="text/javascript" src="{{ asset('static/js/toolkit/toolkit.min.0LwNQ.js') }}?v=58-1"></script>
      <script type="text/javascript" src="{{ asset('static/js/core.min.2vnTW.js') }}?v=58-1"></script>
      <meta name="viewport" content="width=device-width" />
   </head>
   <body class = "eu ru-ru login-template oauth web bnet-wcag wcag"
      data-embedded-state = "STATE_LOGIN"
      data-baseUrl = "/login"
      data-cdnUrl = "http://media.blizzard.com"
      data-staticUrl = "/static"
      data-sharedStaticUrl = "/static/local-common"
      data-secureSupportUrl = "https://eu.battle.net/support/"
      data-project = "login"
      data-projectUrl = "/login"
      data-locale = "ru-ru"
      data-language = "ru"
      data-region = "eu"
      data-loggedIn = "false"
      data-srp-script-url = "{{ asset('static/js/login/0.srp6a-routines.worker.2Efyv.js') }}"
      data-pw-v2-worker-url = "{{ asset('static/js/login/upgrade-verifier.worker.20KF3.js') }}"
      data-v2-password-js = "{{ asset('static/js/login/account-password.117nV.js') }}"
      data-network-error-message="Проверьте соединение с сетью и попробуйте еще раз.">
      <div class="grid-container wrapper">
         {{ $slot }}
      </div>
      <script type="text/javascript" src="{{ asset('static/js/embedded-javascript/embed-0.1.5.min.2QnZN.js') }}?v=58-1"></script>
      <script type="text/javascript" src="{{ asset('static/js/login/srp-client.min.2NkGE.js') }}?v=1"></script>
      <script type="text/javascript" src="{{ asset('static/js/toolkit/toolkit-password.41ld1.js') }}?v=1"></script>
      <script type="text/javascript" src="{{ asset('static/js/login/global.min.31fHz.js') }}"></script>
      <script type="text/javascript" src="{{ asset('static/js/login/login.min.3xfE8.js') }}"></script>
   </body>
</html>
