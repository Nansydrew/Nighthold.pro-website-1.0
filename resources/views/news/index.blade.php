<x-app-layout>
    @push('css')
        <link href="{{ asset('static/5.60a3b147f091048d9af5.css') }}" rel="stylesheet">
    @endpush

    <div class="Pane Pane--full Pane--dirtDark">
        <div class="Pane-bg">
            <div class="Pane-overlay"></div>
        </div>
        <div class="Pane-content">
            <div class="Pane Pane--underSiteNav Pane--cropMax Pane--transparent" data-url="{{ asset('cms/template_resource/ri/RI8Q9HOWY4U01465961118458.jpg') }}">
                <div class="Pane-bg" style="background-image:url({{ asset('cms/template_resource/ri/RI8Q9HOWY4U01465961118458.jpg') }});">
                    <div class="Pane-overlay"></div>
                </div>
                <div class="Pane-content">
                    <div class="space-medium"></div>
                    <div class="Grid SyncHeight SyncHeight--disabled gutter-small gutter-all gutter-negative" media-medium="!SyncHeight--disabled">
                        @foreach ($firstnews as $first)
                        <div class="ArticleTile ArticleTile--gutter Grid-full" media-large="Grid-1of2" media-wide="!Grid-1of2 Grid-2of3">
                            <div class="ArticleTile-content">
                                <div class="Tile ArticleTile-tile">
                                    <div class="Tile-area">
                                        <div class="Tile-bg" style="background-image:url({{ asset('/storage/' . Utils::Images($first->image)) }});"></div><div class="Tile-content"></div></div></div><div class="ArticleTile-fade"></div><div class="ArticleTile-play"><div class="ArticleTile-playArrow"></div></div><div class="ArticleTile-bottom"><div class="ArticleTile-bottomInner"><div class="ArticleTile-left"><div class="ArticleTile-subtitle">{{ $first->getTranslatedAttribute('excerpt', App()->getLocale(), 'en-gb') }}</div><div class="ArticleTile-title">{{ $first->getTranslatedAttribute('title', App()->getLocale(), 'en-gb') }}</div></div><div class="ArticleTile-right"><div class="ArticleTile-commentTotal List-right"><a class="Link Link--external ArticleTile-comments" href="/" data-analytics="panel-news" data-analytics-panel="slot:0 - type:blog - id:{{ $first->id }} || {{ $first->getTranslatedAttribute('title', App()->getLocale(), 'en-gb') }} "><div class="CommentTotal CommentTotal--horizontal CommentTotal--right ArticleTile-commentTotal"><span class="Icon Icon--comment Icon--small CommentTotal-icon"><svg class="Icon-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false"><use xlink:href="/static/components/Icon/svg/comment.88a6bb267bb247fed6a4ae5b51ea531d.svg#comment"></use></svg></span><div class="CommentTotal-number">0</div></div></a></div></div></div></div><a class="Link ArticleTile-link" href="{{ route('news.show', [$first->id, $first->slug]) }}" data-thumb="{{ asset('/storage/' . Utils::Images($first->image)) }}" data-analytics="panel-news" data-analytics-panel="slot:0 - type:blog - id:{{ $first->id }} || {{ $first->getTranslatedAttribute('title', App()->getLocale(), 'en-gb') }}"></a></div>
                        </div>
                        @endforeach
                            @foreach ($lastnews as $first)
                                @php
                                    $num++
                                @endphp
                                @if($num == 3)
                                    <div class="Grid-full hide" media-wide="!hide"></div>
                                @endif
                            <div class="ArticleTile ArticleTile--gutter" media-small="Grid-full" media-medium="" media-large="Grid-1of2" media-wide="!Grid-1of2 Grid-1of3">
                            <div class="ArticleTile-content"><div class="Tile ArticleTile-tile"><div class="Tile-area"><div class="Tile-bg" style="background-image:url({{ asset('/storage/' . Utils::Images($first->image)) }});"></div><div class="Tile-content"></div></div></div><div class="ArticleTile-fade"></div><div class="ArticleTile-play"><div class="ArticleTile-playArrow"></div></div><div class="ArticleTile-bottom"><div class="ArticleTile-bottomInner"><div class="ArticleTile-left"><div class="ArticleTile-subtitle">{!! Text::rusDate($first->created_at) !!}</div><div class="ArticleTile-title">{{ $first->getTranslatedAttribute('title', App()->getLocale(), 'en-gb') }}</div></div><div class="ArticleTile-right"><div class="ArticleTile-commentTotal List-right"><a class="Link Link--external ArticleTile-comments" href="/" data-analytics="panel-news" data-analytics-panel="slot:1 - type:blog - id:{{ $first->id }} || {{ $first->getTranslatedAttribute('title', App()->getLocale(), 'en-gb') }}"><div class="CommentTotal CommentTotal--horizontal CommentTotal--right ArticleTile-commentTotal"><span class="Icon Icon--comment Icon--small CommentTotal-icon"><svg class="Icon-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false"><use xlink:href="/static/components/Icon/svg/comment.88a6bb267bb247fed6a4ae5b51ea531d.svg#comment"></use></svg></span><div class="CommentTotal-number">0</div></div></a></div></div></div></div><a class="Link ArticleTile-link" href="{{ route('news.show', [$first->id, $first->slug]) }}" data-thumb="{{ asset('/storage/' . Utils::Images($first->image)) }}" data-analytics="panel-news" data-analytics-panel="slot:1 - type:blog - id:{{ $first->id }} || {{ $first->getTranslatedAttribute('title', App()->getLocale(), 'en-gb') }}"></a></div></div>
                            @endforeach
                    </div>
                    <div class="space-normal"></div>
                    <div class="space-medium"></div>
                    <div class="Pane Pane--transparent">
                        <div class="Pane-bg">
                            <div class="Pane-overlay"></div>
                        </div>
                        <div class="Pane-content">
                            <div class="gutter-normal gutter-negative">
                                <div class="Paginator" data-url="/{{ str_replace('_', '-', app()->getLocale()) }}/news.frag" data-page="1" data-total="22">
                                    <div class="Paginator-pages">
                                        <div class="Paginator-page" data-page="1">
                                            <div class="List List--vertical List--separatorAll List--full">
                                                @foreach ($news as $first)
                                                <div class="List-item">
                                                    <article class="NewsBlog"><div class="NewsBlog-content"><div class="Grid" media-large="Grid--gutter"><div class="Grid-col hide" media-large="!hide Grid-1of4" media-wide="Grid-1of5"><div class="NewsBlog-tile"><img class="NewsBlog-image" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///////yH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ asset('/storage/' . Utils::Images($first->image)) }}"/><div class="NewsBlog-loading"></div></div></div><div class="Grid-full" media-large="Grid-3of4 gutter-small" media-wide="Grid-4of5"><div class="contain-large contain-left" media-large="gutter-normal"><div class="NewsBlog-title">{{ $first->getTranslatedAttribute('title', App()->getLocale(), 'en-gb') }}</div><p class="NewsBlog-desc color-beige-medium font-size-xSmall">{{ $first->getTranslatedAttribute('excerpt', App()->getLocale(), 'en-gb') }}</p></div><div media-large="gutter-normal"><div class="Pair"><div class="Pair-left"><div class="color-beige-dark font-size-xxSmall"><div class="NewsBlog-date LocalizedDateMount" data-props="{&quot;iso8601&quot;:&quot;2021-04-23T01:31:09.243Z&quot;,&quot;relative&quot;:true}">{!! Text::rusDate($first->created_at) !!}</div></div></div></div></div></div></div></div><a class="Link NewsBlog-link" href="{{ route('news.show', [$first->id, $first->slug]) }}"></a></article></div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    {{ $news->links('news.paginate') }}
                                </div>
                                <div class="space-large"></div>
                            </div>
                        </div>
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
