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
                                    <input class="SiteNav-searchInput" id="searchInput" name="q" type="search" placeholder="Что вы ищете?" value="{{ request()->q ?? request()->a }}" autocomplete="off">
                                </form>
                            </div>
                        </div>
                        <div class="Pair">
                            <div class="Pair-left">
                                <div class="fontFamily-blizzard font-size-medium color-monochrome-white textShadow-small-black">По запросу <b>«{{ request()->q ?? request()->a }}»</b> в категории «blog»</div>
                            </div>
                            <div class="Pair-right">
                                {{ $post->appends(['q' => request()->q ?? request()->a])->links('search.paginates') }}
                            </div>
                            <div class="space-large"></div>
                        </div>
                        <div class="space-normal" media-medium="!space-normal space-large"></div>
                        <div class="space-small"></div>
                        <div class="Grid Grid--gutters SyncHeight">
                            <div class="Grid-full">
                                <div class="List List--vertical List--separatorAll List--full">
                                    @foreach($post as $first)
                                    <div class="List-item">
                                        <article class="NewsBlog">
                                            <div class="NewsBlog-content">
                                                <div class="Grid" media-large="Grid--gutter">
                                                    <div class="Grid-col hide" media-large="!hide Grid-1of4" media-wide="Grid-1of5">
                                                        <div class="NewsBlog-tile">
                                                            <img class="NewsBlog-image" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///////yH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="{{ asset('/storage/' . $first->image) }}"/>
                                                            <div class="NewsBlog-loading"></div>
                                                        </div>
                                                    </div>
                                                    <div class="Grid-full" media-large="Grid-3of4 gutter-small" media-wide="Grid-4of5">
                                                        <div class="contain-large contain-left" media-large="gutter-normal">
                                                            <div class="NewsBlog-title">{{ $first->title }}</div>
                                                            <p class="NewsBlog-desc color-beige-medium font-size-xSmall">{{ $first->excerpt }}</p>
                                                        </div>
                                                        <div media-large="gutter-normal">
                                                            <div class="Pair">
                                                                <div class="Pair-left">
                                                                    <div class="List NewsBlog-details">
                                                                        <div class="List-item NewsBlog-comments">
                                                                            <a class="Link Link--external" href="/">
                                                                                <div class="CommentTotal CommentTotal--horizontal CommentTotal--beigeDark CommentTotal--transition">
                                                                                    <span class="Icon Icon--comment Icon--small CommentTotal-icon">
                                                                                        <svg class="Icon-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false">
                                                                                            <use xlink:href="/static/components/Icon/svg/comment.88a6bb267bb247fed6a4ae5b51ea531d.svg#comment"></use>
                                                                                        </svg>
                                                                                    </span>
                                                                                    <div class="CommentTotal-number">0</div>
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                        <div class="List-item NewsBlog-published">
                                                                            <div class="gutter-normal color-beige-dark font-size-xxSmall">
                                                                                <div class="NewsBlog-date LocalizedDateMount" data-props="{&quot;iso8601&quot;:&quot;{{ $first->created_at }}&quot;,&quot;relative&quot;:true}">{!! Text::rusDate($first->created_at) !!}  </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a class="Link NewsBlog-link" href="{{ route('news.show', [$first->id, $first->slug]) }}" data-analytics-v2="{&quot;name&quot;:&quot;ctaOther&quot;,&quot;category&quot;:&quot;cta&quot;,&quot;action&quot;:&quot;other&quot;,&quot;label&quot;:&quot;blog&quot;,&quot;dimensions&quot;:{&quot;ctaPlacement&quot;:&quot;search&quot;,&quot;destinationUrl&quot;:&quot;{{ route('news.show', [$first->id, $first->slug]) }}&quot;}}">

                                            </a>
                                        </article>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="align-right">
                            {{ $post->appends(['q' => request()->q ?? request()->a])->links('search.paginate') }}
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
