<div class="BnetNav-mobileSiteMenuList List List--vertical List--full">
    {{ menu('web', 'components.phoneMenu') }}
    @auth
    <div class="BnetNav-mobileSiteMenuListItem BnetNav-mobileSiteMenuListItem--user List-item">
            <div class="BnetNav-mobileSiteMenuListItemWrap">
                <a class="Link" data-dropdown="BnetNav-mobileSiteMenuCharacter">
                    <div class="DropdownLink DropdownLink--gold BnetNav-mobileSiteMenuLink">
                        <div class="List">
                            <div class="List-item">
                                <div class="Avatar Avatar--goldMedium BnetNav-mobileAvatar">
                                    <div class="Avatar-image" style="background-image:url({{ asset('/storage/'.Utils::ImagesLogo(Auth::user()->avatar)) }});"></div>
                                </div>
                            </div>
                            <div class="List-item">
                            <span class="BnetNav-mobileSiteMenuLinkText" data-text="{{ Str::title(Auth::user()->name) }}">
                                {{ Str::title(Auth::user()->name) }}
                            </span>
                                <span class="BnetNav-mobileDropdownIndicator DropdownLink-indicator"></span>
                                <span class="BnetNav-mobileMenuListUserInfo">{{ Str::title(Auth::user()->lastName) }}</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <div class="Dropdown" name="BnetNav-mobileSiteMenuCharacter" data-dropdown-group="BnetNav-mobileSiteMenuSections">
            <div class="BnetNav-mobileSiteMenuList List List--full List--vertical">
                @auth
                    @empty(!Auth::user()->account)
                        @empty(!Auth::user()->account->characters)
                <div class="BnetNav-mobileSiteMenuListItem List-item">
                    <a class="Link" data-dropdown="BnetNav-mobileSiteMenuCharacters">
                        <div class="DropdownLink DropdownLink--gold BnetNav-mobileSiteMenuLink"><div class="Pair"><div class="Pair-left">Список персонажей</div><div class="Pair-right"><div class="BnetNav-mobileDropdownIndicator DropdownLink-indicator"></div></div></div></div></a>
                    <div class="Dropdown" name="BnetNav-mobileSiteMenuCharacters" data-dropdown-group="BnetNav-mobileSiteMenuSubsections">
                        <div class="BnetNav-mobileSiteMenuList List List--full List--vertical">
                            @foreach(Auth::user()->account->characters as $item)
                            <div class="BnetNav-mobileSiteMenuListItem List-item">
                                <a class="Link Character Character--{{ __('forum.class_key_'.$item->class) }} Character--small Character--level Character--onDark BnetNav-mobileSiteMenuLink" href="{{ route('characters.show', [$item->realmSlug, mb_strtolower($item->name)]) }}">
                                    <div class="Character-link"><div class="Character-table"><div class="Character-bust"><div class="Art Art--above"><div class="Art-size" style="padding-top:50.43478260869565%"></div><div class="Art-image" style="background-image:url({{ Utils::imageClass($item->race, $item->gender)}});"></div><div class="Art-overlay"></div></div></div><div class="Character-avatar"><div class="Avatar Avatar--medium"><div class="Avatar-image" style="background-image:url({{ Utils::imageClass($item->race, $item->gender)}});"></div></div></div><div class="Character-details"><div class="Character-role"></div><div class="Character-name">{{ $item->name }}</div><div class="Character-level"><b>{{ $item->level }}</b> {{ __('forum.class_'.$item->class) }} (Стихии)</div><div class="Character-realm">{{ $item->realmName }}</div></div></div></div></a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                        @endempty
                    @endempty
                @endauth
                <div class="BnetNav-mobileSiteMenuListItem List-item">
                    <div class="BnetNav-mobileSiteMenuList BnetNav-mobileSiteMenuList--noSectionTitle List List--full List--vertical">
                        @auth
                            @empty(!Auth::user()->account)
                                @empty(!Auth::user()->account->characters)
                        <div class="BnetNav-mobileSiteMenuListItem List-item">
                            <a class="Link Link--block BnetNav-mobileSiteMenuLink" href="{{ route('characters.index') }}">Все ваши персонажи</a>
                        </div>
                                @endempty
                            @endempty
                        @endauth
                        <div class="BnetNav-mobileSiteMenuListItem List-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                            <a class="Link Link--block BnetNav-mobileSiteMenuLink" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" data-analytics="main-nav" data-analytics-placement="Community - Log Out">Выход</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="BnetNav-mobileSiteMenuListItem List-item" data-test-id="3f056bb1133c182b8785d65f77042b58">
        <a class="Link Link--block BnetNav-mobileSiteMenuLink" href="{{ route('login') }}" data-analytics="main-nav" data-analytics-placement="Community - Log In" rel="nofollow">
            <span class="BnetNav-mobileSiteMenuLinkText text-upper" data-text="Авторизация">Авторизация</span>
        </a>
    </div>
    <div class="space-normal"></div>
    <div class="BnetNav-mobileSiteMenuListItem BnetNav-mobileSiteMenuListItem--user List-item align-center" data-test-id="dee9617eb2e140df59d4dcb648c1b1b5">
        <div class="BnetNav-mobileSiteMenuListItemWrap">
            <a class="Link Link--external Link--block BnetNav-mobileSiteMenuLink BnetNav-mobileSiteMenuLink--signup" href="{{ route('register') }}">
                <span class="BnetNav-mobileSiteMenuLinkText text-upper" data-text="Создать учетную запись">Создать учетную запись</span>
            </a>
        </div>
    </div>
    <div class="space-normal"></div>
    @endauth
</div>
