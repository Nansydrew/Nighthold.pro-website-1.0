<!DOCTYPE HTML>
<html xmlns="//www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
      <title>@yield('title'){{ config('app.name_forum', __('forum.title')) }}</title>
      @yield('og')
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <link rel="shortcut icon" type="image/x-icon" href="{{ asset('forum/static/images/icons/wow-favicon.ico') }}" />
      <link rel="stylesheet" href="{{ asset('forum/static/css/navbar.css') }}">
      <link rel="stylesheet" href="{{ asset('forum/static/css/main-9296f9fec4.css') }}">
      <link rel="stylesheet" href="{{ asset('forum/static/css/desktop_2_d90f4dbd5a861bdeed61b3da02053b01ae34655f.css') }}">
      <link rel="stylesheet" href="{{ asset('forum/static/css/desktop_theme_3_5adbba4c27c4c795e67b29e3622e828be72f9232.css') }}">
      <script>var whTooltips = {colorLinks: true, iconizeLinks: true, renameLinks: true};</script>
      <script src="//wow.zamimg.com/widgets/power.js"></script>
      <script type="text/javascript" src="{{ asset('forum/static/js/vendor/jquery/dist/jquery.min.js') }}"></script>
      <script type="text/javascript">
         $(document).ready( function() {
             $('body').removeClass('no-js');

             // TODO: Remove the following code when fixing the white flash issue.
             // Its here to fix the deeplinking bug in Firefox
             if (location.href.indexOf('#') > -1) {
                 location.href+='';
             }
         })
      </script>
      <!--[if lte IE 8]>
      <script type="text/javascript" src="{{ asset('forum/static/js/vendor/jquery-compat/dist/jquery.min.js') }}"></script>
      <![endif]-->
      <script type="text/javascript">
         //<![CDATA[
         var Core = Core || {},
             Login = Login || {};
         Core.staticUrl         = '/forums/static';
         Core.sharedStaticUrl   = '/forums/static/local-common';
         Core.baseUrl           = '/forums';
         Core.projectUrl        = '/forums';
         Core.cdnUrl            = 'http://media.blizzard.com';
         Core.supportUrl            = 'http://eu.battle.net/support/';
         Core.secureSupportUrl  = 'https://eu.battle.net/support/';
         Core.project           = 'forums';
         Core.locale                = '{{ app()->getLocale() }}';
         Core.language          = 'ru';
         Core.region                = 'eu';
         Core.shortDateFormat   = 'dd/MM/yyyy';
         Core.dateTimeFormat        = 'dd/MM/yyyy HH:mm';
         Core.loggedIn          = @guest false; @else true; @endguest
             Core.userAgent         = 'web';
         Login.embeddedUrl      = '/{{ app()->getLocale() }}/login';
         Core.community = 'wow';
         //]]>
      </script>
      <script type="text/javascript">
         //<![CDATA[
         var LOCALIZATION = LOCALIZATION || {};
         LOCALIZATION.URL_PROMPT = "@lang('forum.urlprompt')";
         //]]>
      </script>
   </head>
   <body class="{{ app()->getLocale() }} @if(Route::currentRouteName() != 'patch-notes') Theme--wow @else patch-notes Theme--patch-notes preload @endif">
      <script type="text/javascript">
         //<![CDATA[
         var LOCALIZATION = LOCALIZATION || {};

         LOCALIZATION.SPAMMING = "Спам";
         LOCALIZATION.REAL_LIFE_THREATS = "Угрозы в реальной жизни";
         LOCALIZATION.ADVERTISING_STRADING = "Реклама";
         LOCALIZATION.OTHER = "Иное";
         LOCALIZATION.TROLLING = "Троллинг";

         LOCALIZATION.EDIT = "Редактировать"
         LOCALIZATION.SAVE = "Сохранить"
         LOCALIZATION.PREVIEW = "Предпросмотр";
         LOCALIZATION.CANCEL = "Отменить";
         LOCALIZATION.UPDATE_POST = "Сообщение";
         LOCALIZATION.REPORT = "Сообщить модераторам";
         LOCALIZATION.SOLUTION_MARK = "Отмечено как решение вопроса";
         LOCALIZATION.SOLUTION_UNMARK = "Снять пометку «Решение вопроса»";
         LOCALIZATION.COPY_LINK = "Скопировать ссылку:";
         LOCALIZATION.UNPOSTED_PROMPT = "Вы начали писать сообщение...";
         LOCALIZATION.BLOCKDAY = "Дни";
         LOCALIZATION.BLOCK = "Блокировка пользователя";
         LOCALIZATION.BLOCKSUB = "Заблокировать";
         LOCALIZATION.BOLD = "Полужирный";
         LOCALIZATION.ITALICS = "Курсив";
         LOCALIZATION.UNDERLINE = "Подчеркивание";
         LOCALIZATION.LIST = "Несортированный список";
         LOCALIZATION.LIST_ITEM = "Список";
         LOCALIZATION.QUOTE = "Цитирование";
         LOCALIZATION.CODE = "Код";
         LOCALIZATION.URL = "Ссылка";

         LOCALIZATION.DELETE_CONFIRM = "Вы точно хотите удалить это сообщение?";
         LOCALIZATION.CLOSED_CONFIRM = "Вы точно хотите закрыть эту тему?";
         LOCALIZATION.UNCLOSED_CONFIRM = "Вы точно хотите открыть эту тему?";
         LOCALIZATION.STICKY_CONFIRM = "Вы точно хотите закрепить эту тему?";
         LOCALIZATION.ERROR_EDIT = "Ошибка при редактировании";
         LOCALIZATION.ERROR_PREVIEW = "Ошибка при предварительном просмотре";
         LOCALIZATION.DELETE_SUCCESS = "удалено";
         LOCALIZATION.CLOSED_SUCCESS = "Закрыто";
         LOCALIZATION.UNCLOSED_SUCCESS = "Открыто";
         LOCALIZATION.STICKY_SUCCESS = "Закреплено";
         LOCALIZATION.ERROR_DELETE = "Ошибка при удалении";
         LOCALIZATION.STICKY_DELETE = "Ошибка при закреплении";
         LOCALIZATION.CLOSED_DELETE = "Ошибка при закрытии темы";
         LOCALIZATION.UNCLOSED_DELETE = "Ошибка при открытии темы";
         LOCALIZATION.REPORT_SUCCESS = "Готово!"
         LOCALIZATION.ERROR_REPORT = "Ошибка при отправлении жалобы";
         LOCALIZATION.ERROR_BLOCK = "Ошибка при отправлении блокировки";

         LOCALIZATION.ERROR_EMPTY = "Warning! No topics were selected";
         LOCALIZATION.ERROR_UPDATE = "Ошибка при обновлении";
         LOCALIZATION.ERROR_UPDATE_MOD = "Error Updating";
         LOCALIZATION.UPDATE_SUCCESS_MOD = "Update successful";
         LOCALIZATION.UPDATE_SUCCESS = "Update successful";
         LOCALIZATION.ERROR_MOVING = "Error Moving";
         LOCALIZATION.MOVING_SUCCESS = "Move Topic successful";
         LOCALIZATION.DELETE_CONFIRM_MOD = "Are you sure you want to delete this post?";
         LOCALIZATION.DELETE_SUCCESS_MOD = "Delete Successful";
         LOCALIZATION.ERROR_DELETE_MOD = "Error Deleting";
         LOCALIZATION.TOPIC_TITLE = "Заголовок темы";
         LOCALIZATION.TOPIC_POST_LIMIT = "Post Limit";
         //]]>
      </script>
      @include('forum.navigation')
      <div class="Subnav">
         <div class="Container Container--content Container--breadcrumbs">
            <div class="GameSite-link"> <a class="GameSite-link--heading" href="/"> <i class="Icon"></i>World of Warcraft </a> </div>
            @yield('sidebar')
         </div>
      </div>
      <div role="main">
         {{ $slot }}
      </div>
      <footer class="Forums-footer"> @lang('forum.Forums-footer') <a href="{{ route('forums.index') }}">{{ config('app.name_forum', __('forum.title')) }}</a> ({{ config('app.forum_version') }}) · <a href="{{ route('forums.patch.notes') }}">@lang('forum.Forums-footer-2')</a> </footer>
      @include('layouts.footer')
      <script src="{{ asset('forum/static/js/vendor/tether/dist/js/tether.js') }}"></script>
      <script src="{{ asset('forum/static/js/vendor/waypoints/lib/jquery.waypoints.js') }}"></script>
      <script src="{{ asset('forum/static/js/vendor/waypoints/lib/shortcuts/sticky.js') }}"></script>
      <script src="{{ asset('forum/static/js/vendor/instanttouch.min.js') }}"></script>
      <script src="{{ asset('forum/static/js/vendor/clipboard.min.js') }}"></script>
      <script src="{{ asset('forum/static/js/vendor/d3/tooltips.js') }}"></script>
      <script src="{{ asset('static/scripts/navbar.js?v8.2.1') }}"></script>
      <script type="text/javascript" src="{{ asset('forum/static/js/main.js') }}"></script>
   </body>
</html>
