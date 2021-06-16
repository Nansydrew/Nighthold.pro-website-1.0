<x-app-layout>
    @push('css')
        <link href="{{ asset('static/5.60a3b147f091048d9af5.css') }}" rel="stylesheet" type="text/css"/>
    @endpush
    <div class="Pane Pane--full Pane--dirtDark">
        <div class="Pane-bg">
            <div class="Pane-overlay"></div>
        </div>
        <div class="Pane-content">
            <div class="Pane Pane--underSiteNav Pane--cropMax Pane--transparent" data-url="https://bnetcmsus-a.akamaihd.net/cms/template_resource/p8/P8LCY89PNXOK1466794718015.jpg">
                <div class="Pane-bg" style="background-image:url(https://bnetcmsus-a.akamaihd.net/cms/template_resource/p8/P8LCY89PNXOK1466794718015.jpg);">
                    <div class="Pane-overlay"></div>
                </div>
                <div class="Pane-content">
                    <div class="contain-max">
                        <div class="space-large" media-large="space-huge"></div>
                        <div class="Grid">
                            <div class="Grid-full font-semp-xLarge-white" media-large="font-semp-xxxLarge-white" media-wide="Grid-1of2" media-huge="Grid-2of3">Поиск</div>
                            <div class="Grid-full padding-top-small" media-wide="Grid-1of2" media-huge="Grid-1of3">
                                <form class="SiteNav-searchBox" action="{{ route('search') }}" method="GET">
                                    <span class="Icon Icon--searchGold SiteNav-searchIcon"></span>
                                    <input class="SiteNav-searchInput" id="searchInput" name="q" type="search" placeholder="Что вы ищете?" value="{{ request()->q }}" autocomplete="off"></form>
                            </div>
                        </div>
                        <div class="Pair"><div class="Pair-left">
                                <div class="fontFamily-blizzard font-size-medium color-monochrome-white textShadow-small-black">По запросу <b>«{{ request()->q }}»</b> в категории «character»</div>
                                <p class="font-bliz-light-xSmall-darkGray margin-top-small margin-bottom-none">Профили персонажей WoW Classic недоступны.</p>
                            </div>
                            <div class="Pair-right">
                                <div class="fontFamily-blizzard font-size-xSmall color-monochrome-white textShadow-small-black">Страница 1–0 из 29</div>
                            </div>
                            <div class="space-large"></div>
                        </div>
                        <div class="space-normal" media-medium="!space-normal space-large"></div>
                        <div class="SortTable SortTable--stretch">
                            <div class="SortTable-head">
                                <div class="SortTable-row"><div class="SortTable-col SortTable-label align-left" data-priority="1"><div class="SortTable-labelOuter"><div class="SortTable-labelInner"><div class="SortTable-labelText">Имя</div></div></div></div><div class="SortTable-col SortTable-label" data-priority="5"><div class="SortTable-labelOuter"><div class="SortTable-labelInner"><div class="SortTable-labelText">Уровень</div></div></div></div><div class="SortTable-col SortTable-label" data-priority="4"><div class="SortTable-labelOuter"><div class="SortTable-labelInner"><div class="SortTable-labelText">Раса</div></div></div></div><div class="SortTable-col SortTable-label" data-priority="3"><div class="SortTable-labelOuter"><div class="SortTable-labelInner"><div class="SortTable-labelText">Класс</div></div></div></div><div class="SortTable-col SortTable-label" data-priority="6"><div class="SortTable-labelOuter"><div class="SortTable-labelInner"><div class="SortTable-labelText">Фракция</div></div></div></div><div class="SortTable-col SortTable-label" data-priority="2"><div class="SortTable-labelOuter"><div class="SortTable-labelInner"><div class="SortTable-labelText">Игровой мир</div></div></div></div></div></div>
                            <div class="SortTable-body">
                                @foreach($characters as $char)
                                <a class="Link SortTable-row" href="{{ route('characters.show', [strtolower($char->name)]) }}" data-analytics-v2="{&quot;name&quot;:&quot;ctaOther&quot;,&quot;category&quot;:&quot;cta&quot;,&quot;action&quot;:&quot;other&quot;,&quot;label&quot;:&quot;character&quot;,&quot;dimensions&quot;:{&quot;ctaPlacement&quot;:&quot;search&quot;,&quot;destinationUrl&quot;:&quot;{{ route('characters.show', [$char->realmSlug, strtolower($char->name)]) }}&quot;}}">
                                    <div class="SortTable-col SortTable-data font-none">
                                        <div class="Character Character--{{ __('forum.class_key_'.$char->class) }} Character--inline Character--small Character--name Character--avatar Character--square">
                                            <div class="Character-table">
                                                <div class="Character-bust">
                                                    <div class="Art Art--above">
                                                        <div class="Art-size" style="padding-top:50.43478260869565%"></div>
                                                        <div class="Art-image" style="background-image:url({{ Utils::imageClass($char->race, $char->gender)}});"></div>
                                                        <div class="Art-overlay"></div>
                                                    </div>
                                                </div>
                                                <div class="Character-avatar">
                                                    <div class="Avatar Avatar--medium">
                                                        <div class="Avatar-image" style="background-image:url({{ Utils::imageClass($char->race, $char->gender)}});"></div>
                                                    </div>
                                                </div>
                                                <div class="Character-details">
                                                    <div class="Character-role"></div>
                                                    <div class="Character-name">{{ $char->name }}</div>
                                                    <div class="Character-level"><b>{{ $char->level }}</b> {{ __('forum.class_'.$char->class) }}</div>
                                                    <div class="Character-realm">{{ $char->realmName }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="SortTable-col SortTable-data text-nowrap align-center">{{ $char->level }}</div>
                                    <div class="SortTable-col SortTable-data text-nowrap">{{ __('forum.race_'.$char->race) }}</div>
                                    <div class="SortTable-col SortTable-data text-nowrap">{{ __('forum.class_'.$char->class) }}</div>
                                    <div class="SortTable-col SortTable-data text-nowrap">{{ Utils::faction($char->race)['name'] }}</div>
                                    <div class="SortTable-col SortTable-data text-nowrap">{{ $char->realmName }}</div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="space-large" media-large="space-huge"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{ asset('static/runtime.c86dff083122a451b1af.js') }}"></script>
        <script src="{{ asset('static/vendor.ac7a75610385e9b40211.js') }}"></script>
        <script src="{{ asset('static/3.20dec79f412b658fa525.js') }}"></script>
        <script src="{{ asset('static/legacy-components.24c8e8ac1040f44e6717.js') }}"></script>
    @endpush
</x-app-layout>
