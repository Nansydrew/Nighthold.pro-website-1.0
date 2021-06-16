<x-app-layout>
    @push('css')
        <link href="{{ asset('static/5.60a3b147f091048d9af5.css') }}" rel="stylesheet" type="text/css"/>
    @endpush
    <article>
        <header>
            <div class="Pane Pane--underSiteNav Pane--fadeBottom bordered" data-url="{{ asset('/storage/' . Utils::ImagesLogo($page->image)) }}" queryselectoralways="31">
                <div class="Pane-bg" style="background-color:#000000;background-image:url({{ asset('/storage/' . Utils::ImagesLogo($page->image)) }});">
                    <div class="Pane-overlay"></div>
                </div>
                <div class="Pane-content">
                    <div class="space-huge"></div>
                    <div class="" media-large="!space-large" queryselectoralways="0" media-original="space-large"></div>
                    <div media-medium="space-medium" media-large="!space-medium space-huge" queryselectoralways="0" media-original="" class="space-huge"></div>
                    <div media-wide="space-huge" queryselectoralways="0" media-original="" class="space-huge"></div>
                    <div media-wide="space-huge" queryselectoralways="0" media-original="" class="space-huge"></div>
                    <div media-huge="space-huge" queryselectoralways="0" media-original="" class=""></div>
                    <div media-huge="space-huge" queryselectoralways="0" media-original="" class=""></div>
                    <div class="contain-max">
                        <h1 class="margin-none font-title-large-onDark">{{ $page->getTranslatedAttribute('title', App()->getLocale(), 'en-gb') }}</h1>
                        <div class="space-small"></div>
                        <div class="space-medium space-large" media-large="space-large" queryselectoralways="0" media-original="space-medium"></div>
                    </div>
                </div>
            </div>
        </header>
        <div class="Pane Pane--dirtDark" queryselectoralways="31">
            <div class="Pane-bg">
                <div class="Pane-overlay"></div>
            </div>
            <div class="Pane-content">
                <div class="space-medium space-large" media-large="space-large" queryselectoralways="0" media-original="space-medium"></div>
                <div class="contain-wide">
                    <div id="blog">
                        <div class="Blog margin-bottom-medium" queryselectoralways="5">
                            <div class="detail">
                               {!! $page->getTranslatedAttribute('body', App()->getLocale(), 'en-gb') !!}
                            </div>
                        </div>
                    </div>
                    <!--div class="Tags margin-bottom-medium">
                        <span><span class="Icon Icon--tag Icon--small"><svg class="Icon-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" focusable="false"><use xlink:href="/static/components/Icon/svg/tag.c5fc4ca58afcb3884f979b7e34a2afb5.svg#tag"></use></svg></span><div class="Tags-title font-size-xxSmall">Tags</div><a class="Tags-tag font-size-xxSmall" href="/ru-ru/search/blog?k=Chains%20of%20Domination">Chains of Domination</a><a class="Tags-tag font-size-xxSmall" href="/ru-ru/search/blog?k=BlizzConline">BlizzConline</a><a class="Tags-tag font-size-xxSmall" href="/ru-ru/search/blog?k=Mobile">Mobile</a></span></div--->
                    <div class="space-medium"></div>
                    <div class="space-normal"></div>
                </div>
            </div>
        </div>
    </article>
</x-app-layout>
