<x-app-layout>
    @push('css')
        <link href="{{ asset('static/5.60a3b147f091048d9af5.css') }}" rel="stylesheet" type="text/css"/>
    @endpush
    <div class="Pane Pane--underSiteNav Pane--repeat" data-url="{{ asset('/cms/template_resource/uj/RHMX56JT07891461948685993.jpg') }}" media-medium="hide">
        <div class="Pane-bg" style="background-color:#041828;background-image:url({{ asset('/cms/template_resource/uj/RHMX56JT07891461948685993.jpg') }});">
            <div class="Pane-overlay"></div>
        </div>
        <div class="Pane-content">
            <div class="space-medium"></div>
            <div class="space-small"></div>
            <div class="contain-small">
                <div class="contain-masthead">
                    <div class="space-small"></div>
                    <div class="font-bliz-light-small-gray">Ошибка сервера</div>
                    <div class="space-small"></div>
                    <div class="font-semp-large-white">500 — Ошибка</div>
                </div>
                <div class="space-small"></div>
                <div class="space-small"></div>
                <div class="Divider Divider--lightBrown Divider--thin"></div>
                <div class="space-small"></div>
                <div class="color-monochrome-white">Кажеться что то сломалось, попробуйте позже</div>
                <div class="space-small"></div>
                <div class="Divider Divider--lightBrown Divider--thin"></div>
                <div class="space-small"></div>
                <div class="List List--left List--separator List--separatorBrownMedium gutter-small gutter-vertical">
                    <div class="List-item gutter-small"><a class="Link Link--text" href="{{ url('/') }}">Главная</a></div>
                    <div class="List-item gutter-small"><a class="Link Link--external Link--text" href="{{ route('user', ['overview']) }}">Учетная запись</a></div>
                    <div class="List-item gutter-small"><a class="Link Link--external Link--text" href="{{ route('user', ['shop']) }}">Магазин</a></div>
                </div>
            </div>
            <div class="contain-small">
                <div class="space-small"></div>
                <div class="gutter-small">
                    <div class="Art">
                        <div class="Art-size" style="padding-top:56.1877667140825%"></div>
                        <div class="Art-image" style="background-image:url({{ asset('/cms/template_resource/uj/RHMX56JT07891461948685993.jpg') }});"></div>
                        <div class="Art-overlay"></div>
                    </div>
                </div>
                <div class="space-large"></div>
            </div>
        </div>
    </div>

    <div class="Pane Pane--underSiteNav Pane--cropFull hide" data-url="{{ asset('/cms/template_resource/uj/RHMX56JT07891461948685993.jpg') }}" media-medium="!hide">
        <div class="Pane-bg" style="background-color:#041828;background-image:url({{ asset('/cms/template_resource/uj/RHMX56JT07891461948685993.jpg') }});">
            <div class="Pane-overlay"></div>
        </div>
        <div class="Pane-content">
            <div class="space-large"></div>
            <div class="gutter-huge">
                <div class="Box Box--overlayDark align-left contain-small contain-right" media-wide="contain-medium"><div class="contain-masthead">
                        <div class="space-small"></div>
                        <div class="font-bliz-light-small-gray">Ошибка сервера</div>
                        <div class="space-small"></div>
                        <div class="font-semp-large-white">500 — Ошибка</div>
                    </div>
                    <div class="space-small"></div>
                    <div class="space-small"></div>
                    <div class="Divider Divider--lightBrown Divider--thin"></div>
                    <div class="space-small"></div>
                    <div class="color-monochrome-white">Кажеться что то сломалось, попробуйте позже</div>
                    <div class="space-small"></div>
                    <div class="Divider Divider--lightBrown Divider--thin"></div>
                    <div class="space-small"></div>
                    <div class="List List--left List--separator List--separatorBrownMedium gutter-small gutter-vertical">
                        <div class="List-item gutter-small"><a class="Link Link--text" href="{{ url('/') }}">Главная</a></div>
                        <div class="List-item gutter-small"><a class="Link Link--external Link--text" href="{{ route('user', ['overview']) }}">Учетная запись</a></div>
                        <div class="List-item gutter-small"><a class="Link Link--external Link--text" href="{{ route('user', ['shop']) }}">Магазин</a></div>
                    </div>
                </div>
            </div>
            <div class="space-huge" media-medium="hide" media-wide="!hide"></div>
            <div class="space-huge"></div>
            <div class="space-huge"></div>
        </div>
    </div>

    @push('scripts')
        <script src="{{ asset('static/runtime.c86dff083122a451b1af.js') }}"></script>
        <script src="{{ asset('static/vendor.ac7a75610385e9b40211.js') }}"></script>
        <script src="{{ asset('static/3.20dec79f412b658fa525.js') }}"></script>
        <script src="{{ asset('static/legacy-components.24c8e8ac1040f44e6717.js') }}"></script>
    @endpush
</x-app-layout>

