<x-app-layout>
    @push('css')
        <link href="{{ asset('static/5.60a3b147f091048d9af5.css') }}" rel="stylesheet" type="text/css"/>
    @endpush
    <div class="page-Race">
        <div class="Pane Pane--underSiteNav Pane--cropEdge" data-url="{{ asset('/storage/' . Utils::ImagesLogo($race->images_fone)) }}">
            <div class="Pane-bg" style="background-color:#{{ $race->art_color }};background-image:url({{ asset('/storage/' . Utils::ImagesLogo($race->images_fone)) }});">
                <div class="Pane-overlay"></div>
            </div>
            <div class="Pane-content">
                <div class="gutter-normal gutter-negative">
                    <div class="space-large"></div>
                    <div class="contain-masthead align-center">
                        <h1 class="margin-none font-semp-xxxLarge-white">{{ $race->getTranslatedAttribute('name', App()->getLocale(), 'en-gb') }}</h1>
                        <div class="space-rhythm-medium"></div>
                        <div class="font-bliz-light-medium-beige">{{ $race->factions->getTranslatedAttribute('name', App()->getLocale(), 'en-gb') }}</div>
                    </div>
                    <div class="space-large"></div>
                    <div class="Grid">
                        <div class="Grid-col" media-large="Grid-1of2" media-wide="Grid-2of3">
                            <div class="gutter-normal gutter-vertical">
                                <div class="gutter-medium">
                                    <div class="hide Float-1of2 Float--right" media-wide="!hide" media-huge="!Float-1of2 Float-3of5" aria-hidden="true">
                                        <div class="Art" @if($race->art_style) style="{{ $race->art_style }} @endif">
                                            <div class="Art-size" style="padding-top:{{ $race->art_size }}"></div>
                                            <div class="Art-image" style="background-image:url({{ asset('/storage/' . Utils::ImagesLogo($race->images_home)) }});"></div>
                                            <div class="Art-overlay"></div>
                                        </div>
                                    </div>
                                    {!! $race->getTranslatedAttribute('description', App()->getLocale(), 'en-gb') !!}
                                </div>
                            </div>
                        </div>
                        <div class="Grid-col" media-large="Grid-1of2" media-wide="Grid-1of3">
                            <div class="gutter-normal gutter-vertical" media-large="!gutter-vertical gutter-all">
                                <div class="Box Box--paper" media-small="Box--edge" media-large="!Box--edge">
                                    <div class="gutter-normal gutter-all gutter-negative hide" media-large="!hide" aria-hidden="true">
                                        <div class="Grid">
                                            <div class="Grid-3of5 Grid-1of5--push"><div class="Art Art--above" style="margin-top:-70.79646017699115%;margin-bottom:-7.079646017699115%;"><div class="Art-size" style="padding-top:117.69911504424779%"></div><div class="Art-image" style="background-image:url({{ asset('/storage/' . Utils::ImagesLogo($race->images_race)) }});"></div><div class="Art-overlay"></div></div></div></div>
                                    </div>
                                    <div class="Grid Grid--gutters">
                                        <div class="Grid-col" media-medium="Grid-1of2" media-large="!Grid-1of2">
                                            <h3 class="margin-none font-semp-medium-blue align-center">@lang('races.races_9')</h3>
                                            <div class="space-normal"></div>
                                            @foreach($race->ability as $ability)
                                            <div class="gutter-small gutter-vertical">
                                                <div class="Media Media--alignTop">
                                                    <div class="Media-image"><div class="GameIcon Media-icon"><div class="GameIcon-icon" style="background-image:url({{ asset('/storage/' . Utils::ImagesLogo($ability->icon)) }});"></div><div class="GameIcon-transmog"></div><div class="GameIcon-borderImage"></div></div></div><div class="Media-text"><div class="font-semp-xSmall-blue">{{ $ability->getTranslatedAttribute('name', App()->getLocale(), 'en-gb') }}</div>{{ $ability->getTranslatedAttribute('description', App()->getLocale(), 'en-gb') }}</div></div></div>
                                            @endforeach
                                        </div>
                                        <div class="Grid-col" media-medium="Grid-1of2" media-large="!Grid-1of2">
                                            <h3 class="margin-none font-semp-medium-blue align-center">@lang('races.races_10')</h3>
                                            <div class="space-normal"></div>
                                            <div class="Grid Grid--gutters">
                                                @foreach($race->classes as $class)
                                                    <div class="Grid-1of2" media-wide="!Grid-1of2" media-huge="!!Grid-1of2">
                                                        <a class="Link font-link" data-url="{{ route('classes.view', $class->slug) }}" data-tooltip="race-details-tooltip-{{ $class->slug }}">
                                                            <div class="Media">
                                                                <div class="Media-image">
                                                                    <div class="GameIcon Media-icon">
                                                                        <div class="GameIcon-icon" style="background-image:url({{ asset('/storage/' . Utils::ImagesLogo($class->gameicon)) }});"></div>
                                                                        <div class="GameIcon-transmog"></div>
                                                                        <div class="GameIcon-borderImage"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="Media-text">
                                                                    <div class="font-semp-xSmall-red">{{ $class->getTranslatedAttribute('name', App()->getLocale(), 'en-gb') }}</div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <div class="Tooltip" name="race-details-tooltip-{{ $class->slug }}">
                                                            <div class="GameTooltip">
                                                                <div class="ui-tooltip">
                                                                    <div class="font-bliz-light-small-lightGold">{{ $class->getTranslatedAttribute('name', App()->getLocale(), 'en-gb') }}</div>
                                                                    <div class="space-small"></div>
                                                                    <div class="font-bliz-light-xSmall-white">
                                                                        {!! $class->getTranslatedAttribute('card_description', App()->getLocale(), 'en-gb') !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-large"></div>
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
