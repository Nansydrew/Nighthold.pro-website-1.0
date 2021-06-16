<div class="Navbar-accountDropdownLoggedOut">
    <div role="presentation" class="Navbar-modalSection">
        <a href="{{ route('login') }}" class="Navbar-accountDropdownButtonLink Navbar-button is-full" data-analytics="global-nav" data-analytics-placement="Nav - Account - Log In">Вход</a>
    </div>
    <a href="/" class="Navbar-accountDropdownLink Navbar-accountDropdownSupport" data-analytics="global-nav" data-analytics-placement="Nav - Support"><div class="Navbar-icon Navbar-accountDropdownLinkIcon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false" aria-hidden="true"><use xlink:href="#Navbar-icon-question"></use></svg></div><div class="Navbar-accountDropdownLinkLabel">Поддержка</div><div class="Navbar-accountDropdownCounter">0</div></a>
    <a href="{{ route('user', ['overview']) }}" class="Navbar-accountDropdownLink Navbar-accountDropdownSettings" data-analytics="global-nav" data-analytics-placement="Nav - Account - Settings"><div class="Navbar-icon Navbar-accountDropdownLinkIcon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false" aria-hidden="true"><use xlink:href="#Navbar-icon-settings"></use></svg></div><div class="Navbar-accountDropdownLinkLabel">Параметры</div></a>
    <a href="{{ route('register') }}" class="Navbar-accountDropdownLink" data-analytics="global-nav" data-analytics-placement="Nav - Account - Create a Free Account"><div class="Navbar-icon Navbar-accountDropdownLinkIcon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false" aria-hidden="true"><use xlink:href="#Navbar-icon-account-add"></use></svg></div><div class="Navbar-accountDropdownLinkLabel">Создать учетную запись</div></a>
</div>
<div class="Navbar-accountDropdownLoggedIn">
    <div role="presentation" class="Navbar-modalSection">
        <div class="Navbar-accountDropdownProfileInfo">
            <div class="Navbar-accountDropdownBattleTag">{{ Str::title(Auth::user()->name ?? '%USER_BATTLETAG%') }}</div>
            <div class="Navbar-accountDropdownBattleTagNumber"></div>
        </div>
        <div class="Navbar-accountDropdownEmail">{{ Auth::user()->email ?? '%USER_EMAIL%'}}</div>
    </div>
    @can('browse_admin')
    <a href="{{ route('voyager.dashboard') }}" class="Navbar-accountDropdownLink Navbar-accountDropdownSettings" data-analytics="global-nav" data-analytics-placement="Nav - Account - Settings">
        <div class="Navbar-icon Navbar-accountDropdownLinkIcon">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false" aria-hidden="true"><use xlink:href="#Navbar-icon-settings"></use></svg>
        </div>
        <div class="Navbar-accountDropdownLinkLabel">Админка</div>
    </a>
    @endcan
    <a href="{{ route('user', ['overview']) }}" class="Navbar-accountDropdownLink Navbar-accountDropdownSettings" data-analytics="global-nav" data-analytics-placement="Nav - Account - Settings">
        <div class="Navbar-icon Navbar-accountDropdownLinkIcon">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false" aria-hidden="true"><use xlink:href="#Navbar-icon-settings"></use></svg>
        </div>
        <div class="Navbar-accountDropdownLinkLabel">Параметры</div>
    </a>
    <a href="/" class="Navbar-accountDropdownLink Navbar-accountDropdownGifts" data-analytics="global-nav" data-analytics-placement="Nav - Gifts">
        <div class="Navbar-icon Navbar-accountDropdownLinkIcon">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false" aria-hidden="true"><use xlink:href="#Navbar-icon-gifts"></use>
            </svg>
        </div>
        <div class="Navbar-accountDropdownLinkLabel">Мои подарки</div>
    </a>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="Navbar-accountDropdownLink" data-analytics="global-nav" data-analytics-placement="Nav - Account - Log Out">
        <div class="Navbar-icon Navbar-accountDropdownLinkIcon">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false" aria-hidden="true"><use xlink:href="#Navbar-icon-logout"></use>
            </svg>
        </div>
        <div class="Navbar-accountDropdownLinkLabel">Выход</div>
    </a></form>
</div>
