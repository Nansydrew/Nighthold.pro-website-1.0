@php
    $config = [
        'appName' => config('app.name'),
        'appUrl' => config('app.url'),
        'locale' => str_replace('_', '-', app()->getLocale()),
        'locales' => config('app.locales'),
        'githubAuth' => config('services.github.client_id'),
        'mmotop' => setting('site.mmotop'),
        'logo' => asset(Utils::ImagesLogo('storage/'.setting('site.logo')))
    ];
@endphp
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="icon" type="image/x-icon" href="https://blzaccount.akamaized.net/static/images/favicon.ico">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>const whTooltips = {colorLinks: true, iconizeLinks: true, renameLinks: true};</script>
    <script src="https://wow.zamimg.com/widgets/power.js"></script>
    <title></title>
</head>
<body>
<div id="app"></div>
<div class="loading-overlay hide"></div>
<script>
    window.config = @json($config);
</script>
<script>"use strict";!function(n){var o="/api/error-report";function t(e,r,n){void 0!==r[n]&&(e[n]=r[n])}function a(){var e,r;return{system:function(){var e={};e.clientTimeMillis=Date.now();var r=n.navigator;return t(e,r,"oscpu"),t(e,r,"hardwareConcurrency"),t(e,r,"deviceMemory"),e}(),network:(e={},void 0!==(r=n.navigator.connection)&&(t(e,r,"downlink"),t(e,r,"downlinkMax"),t(e,r,"effectiveType"),t(e,r,"rtt"),t(e,r,"type")),e),browser:function(){var e={};t(e,n&&n.location,"href"),t(e,n,"devicePixelRatio"),t(e,n,"innerHeight"),t(e,n,"innerWidth");var r=n.navigator;return t(e,r,"platform"),t(e,r,"userAgent"),t(e,r,"language"),t(e,r,"cookieEnabled"),e}()}}function e(e,r,n,o,t){var i=function(e,r,n,o,t){return{message:e,source:r,lineno:n,colno:o}}.apply(void 0,arguments);c({environment:a(),error:i}),console.error(t)}function c(e){console.info("An error occurred. Submitting report.");var r=new XMLHttpRequest;r.open("POST",o),r.setRequestHeader("Content-Type","application/json"),r.setRequestHeader("Accept","application/json");var n=document.cookie.match(new RegExp("XSRF-TOKEN=([^;]+)"));n&&n.length&&r.setRequestHeader("X-XSRF-TOKEN",n[1]),r.addEventListener("error",function(e){console.error("An error occurred while sending an error-report. Error: "+e)}),r.send(JSON.stringify(e))}void 0!==n?(n.onerror=e,n.errorReporter={global:e,vue:function(e,r,n){var o=function(e,r,n){return{stack:e.stack}}.apply(void 0,arguments);c({environment:a(),vueError:o}),console.error(e)}},console.debug("Listening for unhandled errors...")):console.error('Unable to bind onError listener as "window" was undefined.')}(window);</script>
<script src="{{ mix('static/js/manifest.js') }}"></script>
<script src="{{ mix('static/js/vendor.js') }}"></script>
<script src="{{ mix('static/js/app.js') }}"></script>
</body>
</html>
