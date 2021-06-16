<x-app-layout>

    @push('css')
        <link href="{{ asset('static/5.60a3b147f091048d9af5.css') }}" rel="stylesheet">
    @endpush

    <div class="Pane Pane--underSiteNav Pane--cropMax" data-url="{{ asset('/cms/template_resource/hf/HFUOF413X1O21459870154507.jpg') }}">
        <div class="Pane-bg" style="background-color:#180906;background-image:url({{ asset('/cms/template_resource/hf/HFUOF413X1O21459870154507.jpg') }});">
            <div class="Pane-overlay"></div>
        </div>
        <div class="Pane-content">
            <div class="space-large" media-large="space-huge"></div>
            <div class="contain-max">
                <div class="font-semp-xLarge-white" media-large="font-semp-xxxLarge-white">Персонажи</div>
                <div media-large="hide">
                    <div class="space-normal"></div>
                    <div class="font-semp-small-white">{{ Server::getServerName() }}</div>
                    <div class="space-small"></div>
                    <div class="List List--vertical">
                        @auth
                            @empty(!Auth::user()->account)
                                @empty(!Auth::user()->account->characters)
                                    @foreach(Auth::user()->account->characters as $item)
                        <div class="List-item">
                            <a class="Link Character Character--{{ __('forum.class_key_'.$item->class) }} Character--inline Character--name Character--avatar Character--level Character--square" href="{{ route('characters.show', [$item->realmSlug, strtolower($item->name)]) }}"><div class="Character-link"><div class="Character-table"><div class="Character-bust"><div class="Art Art--above"><div class="Art-size" style="padding-top:50.43478260869565%"></div><div class="Art-image" style="background-image:url({{ Utils::imageClass($item->race, $item->gender)}});"></div><div class="Art-overlay"></div></div></div><div class="Character-avatar"><div class="Avatar"><div class="Avatar-image" style="background-image:url({{ Utils::imageClass($item->race, $item->gender)}});"></div></div></div><div class="Character-details"><div class="Character-role"></div><div class="Character-name">{{ $item->name }}</div><div class="Character-level"><b>{{ $item->level }}</b> {{ __('forum.class_'.$item->class) }} (Стихии)</div><div class="Character-realm">{{ Server::getServerName() }}</div></div></div></div></a></div>
                                    @endforeach
                                @endempty
                            @endempty
                        @endauth
                    </div>
                </div>
                <div class="hide" media-large="!hide">
                    <div class="space-large"></div>
                    <div class="font-semp-small-white text-upper">{{ Server::getServerName() }}</div>
                    <div class="space-normal"></div>
                    <div class="Grid Grid--gutters SyncHeight">
                        @auth
                            @empty(!Auth::user()->account)
                                @empty(!Auth::user()->account->characters)
                                    @foreach(Auth::user()->account->characters as $item)
                        <div class="Grid-1of2 SyncHeight-item" media-wide="Grid-1of3" media-huge="Grid-1of4">
                            <a class="Link Character Character--{{ __('forum.class_key_'.$item->class) }} Character--name Character--avatar Character--level Character--square" href="{{ route('characters.show', [$item->realmSlug, strtolower($item->name)]) }}"><div class="Character-link"><div class="Character-table"><div class="Character-bust"><div class="Art Art--above"><div class="Art-size" style="padding-top:50.43478260869565%"></div><div class="Art-image" style="background-image:url({{ Utils::imageClass($item->race, $item->gender)}});"></div><div class="Art-overlay"></div></div></div><div class="Character-avatar"><div class="Avatar"><div class="Avatar-image" style="background-image:url({{ Utils::imageClass($item->race, $item->gender)}});"></div></div></div><div class="Character-details"><div class="Character-role"></div><div class="Character-name">{{ $item->name }}</div><div class="Character-level"><b>{{ $item->level }}</b> {{ __('forum.class_'.$item->class) }} (Стихии)</div><div class="Character-realm">{{ Server::getServerName() }}</div></div></div></div></a></div>
                                    @endforeach
                                @endempty
                            @endempty
                        @endauth
                    </div>
                </div>
            </div>
            <div class="space-normal" media-large="space-large"></div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('static/runtime.c86dff083122a451b1af.js') }}"></script>
        <script src="{{ asset('static/vendor.ac7a75610385e9b40211.js') }}"></script>
        <script src="{{ asset('static/3.20dec79f412b658fa525.js') }}"></script>
        <script src="{{ asset('static/legacy-components.24c8e8ac1040f44e6717.js') }}"></script>
    @endpush
</x-app-layout>
