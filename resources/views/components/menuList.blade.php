<div class="SiteNav-menuListItem SiteNav-menuListItem--search List-item" data-test-id="02b92ef562fe67d88f8fa09f631fa345">
    <a class="Link Link--block SiteNav-menuListLink SiteNav-searchLink hover-white color-gold-light" data-dropdown="SiteNav-dropdown-2" tabindex="0"><span class="Icon Icon--wow-search SiteNav-searchOpen"><svg class="Icon-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false"><use xlink:href="/static/components/Icon/svg/wow-search.7c08692a91547c4e3849e39f7dee99f4.svg#wow-search"></use></svg></span><span class="Icon Icon--close SiteNav-searchClose"><svg class="Icon-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false"><use xlink:href="/static/components/Icon/svg/close.a9ffd5f54f2a6c649636aab0e0392caa.svg#close"></use></svg></span>
    </a>
</div>
@auth
<div class="SiteNav-menuListItem SiteNav-menuListItem--user SiteNav-menuListItem--userLoggedIn List-item" data-test-id="2af60ccaec6851cdf2ba4f2108f0efd3">
    <div class="SiteNav-menuListItemWrap">
        <div class="List">
            <div class="List-item">
                <a class="Link Link--block" href="{{ config('app.url') }}">
                    <div class="Avatar Avatar--goldLarge SiteNav-avatar">
                        <div class="Avatar-image" style="background-image:url({{ asset('/storage/'.Utils::ImagesLogo(Auth::user()->avatar)) }});"></div>
                    </div>
                </a>
            </div>
            <div class="List-item">
                <a class="Link SiteNav-menuListLink" data-dropdown="SiteNav-user">
                    <div class="DropdownLink DropdownLink--gold DropdownLink--goldWithHover">
                        <span class="SiteNav-menuListLinkText" data-text="{{ Str::title(Auth::user()->lastName) }}">{{ Str::title(Auth::user()->lastName) }}</span>
                        <span class="SiteNav-dropdownIndicator DropdownLink-indicator"></span>
                        <span class="SiteNav-menuListUserInfo">
                        @if(!empty(auth()->user()->role))
                            <span class="SiteNav-characterLevelLabel">Группа</span>
                            {{ auth()->user()->role->display_name }}
                        @endif
                        </span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@else
<div class="SiteNav-menuListItem List-item" data-test-id="bfd7f05102e49f81dc3e45badd316e7e">
<a class="Link Link--block SiteNav-menuListLink text-upper" href="{{ route('login') }}" data-analytics="main-nav" data-analytics-placement="Community - Log In" rel="nofollow"><span class="SiteNav-menuListLinkText" data-text="Авторизация">Авторизация</span></a>
</div>
<div class="SiteNav-menuListItem SiteNav-menuListItem--user List-item hide" data-test-id="122786c542d0ed1e3f8346696c79bfb3" media-wide="!hide">
    <div class="SiteNav-menuListItemWrap">
        <a class="Link Link--block SiteNav-menuListLink text-upper" href="{{ route('register') }}">
            <span class="SiteNav-menuListLinkText" data-text="Регистрация">Регистрация</span>
        </a>
    </div>
</div>
@endauth
