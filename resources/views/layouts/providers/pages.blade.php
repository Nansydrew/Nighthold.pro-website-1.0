<div role="presentation" class="NavbarFooter-linksLeft">
    @foreach($pages as $item)
        @if($item->columns === 'LEFT')
            <div role="presentation" class="NavbarFooter-link NavbarFooter-mainLink NavbarFooter-careers">
                <a href="{{ route('pages.view', [$item->id, $item->slug]) }}" class="NavbarFooter-anchor" data-id="careers" data-analytics="global-nav" data-analytics-placement="Footer - {{ $item->getTranslatedAttribute('title', App()->getLocale(), 'en-gb') }}">{{ $item->getTranslatedAttribute('title', App()->getLocale(), 'en-gb') }}</a>
            </div>
        @endif
    @endforeach
</div>
<div role="presentation" class="NavbarFooter-linksRight">
    @foreach($pages as $item)
        @if($item->columns === 'RIGHT')
            <div role="presentation" class="NavbarFooter-link NavbarFooter-mainLink NavbarFooter-careers">
                <a href="{{ route('pages.view', [$item->id, $item->slug]) }}" class="NavbarFooter-anchor" data-id="careers" data-analytics="global-nav" data-analytics-placement="Footer - {{ $item->getTranslatedAttribute('title', App()->getLocale(), 'en-gb') }}">{{ $item->getTranslatedAttribute('title', App()->getLocale(), 'en-gb') }}</a>
            </div>
        @endif
    @endforeach
</div>
