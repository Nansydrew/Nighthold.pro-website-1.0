<x-app-layout>
    @push('css')
        <link href="{{ asset('static/5.60a3b147f091048d9af5.css') }}" rel="stylesheet" type="text/css"/>
    @endpush
    <div class="Pane Pane--underSiteNav Pane--cropEdge" data-url="{{ asset('/storage/' . Utils::ImagesLogo($classes->images_fone)) }}">
        <div class="Pane-bg" style="background-color:#{{ $classes->art_color }};background-image:url({{ asset('/storage/' . Utils::ImagesLogo($classes->images_fone)) }});">
            <div class="Pane-overlay"></div>
        </div>
        <div class="Pane-content">
            <div class="gutter-normal gutter-negative">
                <div class="space-large"></div>
                <div class="contain-masthead align-center">
                    <div class="font-semp-xxxLarge-white">{{ $classes->getTranslatedAttribute('name', App()->getLocale(), 'en-gb') }}</div>
                    <div class="space-small"></div>
                    <div class="font-bliz-light-medium-beige">{{ $classes->getTranslatedAttribute('card_subtitle', App()->getLocale(), 'en-gb') }}</div>
                </div>
                <div class="space-large"></div>
                <div class="Grid">
                    <div class="Grid-col" media-large="Grid-1of2" media-wide="Grid-2of3">
                        <div class="gutter-normal gutter-vertical">
                            <div class="gutter-medium">
                                <div class="Grid">
                                    {!! $classes->getTranslatedAttribute('description', App()->getLocale(), 'en-gb') !!}
                                    <div class="Grid-1of2 hide" media-wide="!hide">
                                        <div class="Art" @if($classes->art_style) style="{{ $classes->art_style }}" @endif><div class="Art-size" style="padding-top:{{ $classes->art_size }}"></div>
                                            <div class="Art-image" style="background-image:url({{ asset('/storage/' . Utils::ImagesLogo($classes->images_home)) }});"></div>
                                            <div class="Art-overlay"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gutter-normal gutter-vertical">
                                    <div class="font-semp-medium-white">@lang('classes.classes_1')</div>
                                    <p>{{ $classes->getTranslatedAttribute('talent_descr', App()->getLocale(), 'en-gb') }}</p>
                                    <div class="SyncHeight">
                                        <div class="Grid Grid--gutters Grid--gutter">
                                            @foreach($classes->talents as $talent)
                                            <div class="Grid-full" media-huge="Grid-1of2">
                                                <a class="Link Link--block" href="{{ route('talent.calculator', $talent->slug) }}">
                                                    <button class="Talent Talent--small Talent--gutter Talent--border Talent--nameLarge Talent--fontGold SyncHeight-item">
                                                        <div class="Talent-head">
                                                            <div class="List">
                                                                <div class="GameIcon Talent-icon GameIcon--medium List-item">
                                                                    <div class="GameIcon-icon" style="background-image:url({{ asset('/storage/' . Utils::ImagesLogo($talent->icon)) }});"></div>
                                                                    <div class="GameIcon-transmog"></div>
                                                                    <div class="GameIcon-borderImage"></div>
                                                                </div>
                                                                <div class="Talent-name List-item gutter-normal">{{ $talent->getTranslatedAttribute('name', App()->getLocale(), 'en-gb') }}
                                                                    <div class="Talent-data"></div>
                                                                </div>
                                                            </div>
                                                            <div class="Talent-checkbox">
                                                                <input class="Talent-checkboxInput" type="checkbox" value="none" name="check"/>
                                                                <label class="Talent-checkboxLabel" for="check"></label>
                                                            </div>
                                                            <div class="Talent-active"></div>
                                                        </div>
                                                        <div class="Talent-body">
                                                            <div class="Talent-data"></div>
                                                            <div class="Talent-desc">{{ $talent->getTranslatedAttribute('description', App()->getLocale(), 'en-gb') }}</div>
                                                            <br/>
                                                        </div>
                                                    </button>
                                                </a>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Grid-col" media-large="Grid-1of2" media-wide="Grid-1of3">
                        <div class="gutter-normal gutter-vertical" media-large="!gutter-vertical gutter-all">
                            <div class="Box Box--paper" media-small="Box--edge" media-large="!Box--edge">
                                <div class="gutter-normal gutter-all gutter-negative hide" media-large="!hide"><div class="Grid"><div class="Grid-3of5 Grid-1of5--push"><div class="Art Art--above" style="margin-top:-70.79646017699115%;"><div class="Art-size" style="padding-top:117.69911504424779%"></div><div class="Art-image" style="background-image:url({{ asset('/storage/' . Utils::ImagesLogo($classes->images_race)) }});"></div><div class="Art-overlay"></div></div></div></div></div><div class="Grid Grid--gutters"><div class="Grid-col" media-medium="Grid-1of2" media-large="!Grid-1of2"><div class="font-semp-medium-blue align-center">@lang('classes.classes_2')</div>
                                        <div class="space-normal"></div>
                                        @foreach($classes->ability as $ability)
                                        <div class="gutter-small gutter-vertical">
                                            <div class="Media Media--alignTop">
                                                <div class="Media-image">
                                                    <div class="GameIcon Media-icon">
                                                        <div class="GameIcon-icon" style="background-image:url({{ asset('/storage/' . Utils::ImagesLogo($ability->icon)) }});"></div>
                                                        <div class="GameIcon-transmog"></div>
                                                        <div class="GameIcon-borderImage"></div>
                                                    </div>
                                                </div>
                                                <div class="Media-text">
                                                    <div class="font-semp-xSmall-blue">{{ $ability->getTranslatedAttribute('name', App()->getLocale(), 'en-gb') }}</div>{{ $ability->getTranslatedAttribute('description', App()->getLocale(), 'en-gb') }}</div></div></div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="space-normal" media-wide="space-large"></div>
                    <div class="font-semp-medium-lightBeige align-center">@lang('classes.classes_3')</div>
                    <div class="space-small"></div>
                    <div class="align-center">
                        <div class="space-medium"></div>
                        <div class="gutter-large">
                            <div class="Slider Slider--topOverflow" data-slider-options="{}">
                                @foreach($classes->races as $race)
                                    <div class="Slider-slide Slider-slide--gutters" media-nav="Slider-slide--guttersMedium">
                                        <div class="RaceTile RaceTile--{{ $race->faction_name }} fixed-static-xxsmall" media-nav="fixed-static-small">
                                            <a class="Link RaceTile-link" href="{{ route('races.view', $race->slug) }}">
                                                <div class="RaceTile-content">
                                                    <div class="RaceTile-backWrapper">
                                                        <div class="RaceTile-back" style="background-image:url({{ asset('/storage/' . Utils::ImagesLogo($race->images_main)) }});"></div>
                                                    </div>
                                                    <div class="RaceTile-front" style="background-image:url({{ asset('/storage/' . Utils::ImagesLogo($race->images_main_two)) }});"></div>
                                                    <div class="Position Position--anchorBottom" style="bottom:-84px;left:50%;">
                                                        <div class="RaceTile-emblem"></div>
                                                    </div>
                                                </div>
                                                <div class="space-normal"></div>
                                                <div class="space-small"></div>
                                                <div class="RaceTile-name SyncHeightItem">{{ $race->name }}</div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="space-normal"></div>
                    <div class="Grid-full">
                        <div class="space-normal" media-wide="space-large"></div>
                        <div class="font-semp-medium-lightBeige align-center">@lang('classes.classes_4')</div>
                        <div class="space-normal"></div>
                        <div class="contain-huge gutter-normal">
                            <div class="Grid Grid--gutters SyncHeight">
                                @foreach($other as $class)
                                    <div class="Grid-col" media-medium="Grid-1of2">
                                        <div class="Card Card--borderPaper Card--stacked" media-wide="Card-1of3 Card--excerpt" media-huge="Card--1of3 !Card--stacked"><a class="Card-link SyncHeight-item" href="{{ route('classes.view', $class->slug) }}"><div class="Card-image"><div class="Card-image--full"><div class="Art Card-art"><div class="Art-size" style="padding-top:100%"></div><div class="Art-image" style="background-image:url({{ asset('/storage/' . Utils::ImagesLogo($class->images_main)) }});"></div><div class="Art-overlay"></div></div></div><div class="Card-image--half"><div class="Art Card-art"><div class="Art-size" style="padding-top:50%"></div><div class="Art-image" style="background-image:url({{ asset('/storage/' . Utils::ImagesLogo($class->images_main)) }});"></div><div class="Art-overlay"></div></div></div></div><div class="Card-content"><div class="gutter-normal gutter-all"><div class="Card-title">{{ $class->getTranslatedAttribute('name', App()->getLocale(), 'en-gb') }}</div><div class="Card-subtitle">{{ $class->getTranslatedAttribute('card_subtitle', App()->getLocale(), 'en-gb') }}</div>{!! $class->getTranslatedAttribute('card_description', App()->getLocale(), 'en-gb') !!}</div></div></a></div></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="space-large"></div>
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
