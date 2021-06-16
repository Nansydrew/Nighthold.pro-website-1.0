<div class="page-Guide-section position-relative">
    <div class="Divider"></div>
    <div class="Panel Panel--small Panel--alignCenter bordered Panel--stacked Panel--normal" media-wide="hide">
        <div class="Panel-bg" data-background-image="{{ asset('storage/'. Utils::ImagesLogo($item->images_phone)) }}"></div>
        <div class="Panel-area SyncHeight-item">
            <div class="Panel-box">
                <div class="Panel-content">
                    @if($item->sub_title)<h3 class="Panel-subtitle">{{ $item->getTranslatedAttribute('sub_title', App()->getLocale(), 'en-gb') }}</h3>@endif
                    <h2 class="Panel-title">{{ $item->getTranslatedAttribute('title', App()->getLocale(), 'en-gb') }}</h2>
                    <div class="Content Content--onDark Panel-desc">{{ $item->getTranslatedAttribute('description', App()->getLocale(), 'en-gb') }}</div>
                    <div class="Panel-buttons">
                        @if($item->slug)
                            <a class="Link Button Button--ghost Panel-button" href="{{ $item->slug }}" data-analytics="homepage-panel" data-analytics-placement="Recruit A Friend Page">
                                <div class="Button-outer">
                                    <div class="Button-inner">
                                        <div class="Button-label" data-text="{{ $item->getTranslatedAttribute('slug_text', App()->getLocale(), 'en-gb') }}">{{ $item->getTranslatedAttribute('slug_text', App()->getLocale(), 'en-gb') }}</div>
                                    </div>
                                </div>
                            </a>
                        @endif
                        @if($item->slug_two)
                            <a class="Link Button Button--ghost Panel-button" href="{{ $item->slug_two }}" data-analytics="homepage-panel" data-analytics-placement="Page: Burning Crusade Classic">
                                <div class="Button-outer">
                                    <div class="Button-inner">
                                        <div class="Button-label" data-text="{{ $item->getTranslatedAttribute('slug_text_two', App()->getLocale(), 'en-gb') }}">{{ $item->getTranslatedAttribute('slug_text_two', App()->getLocale(), 'en-gb') }}</div>
                                    </div>
                                </div>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($item->left_or_right === 1)
    <div class="Panel bordered hide Panel--normal Panel--stretched Panel--right Panel--alignRight Panel--overflowing" media-wide="!hide" media-huge="!Panel--stretched">
    @else
    <div class="Panel bordered Panel--normal Panel--left Panel--alignLeft Panel--overflowing hide Panel--stretched" media-wide="!hide" media-huge="!Panel--stretched">
    @endif
        <div class="Panel-bg" data-background-image="{{ asset('storage/'. Utils::ImagesLogo($item->images)) }}">
            <div class="Panel-fg"></div>
        </div>
        <div class="Panel-area SyncHeight-item">
            <div class="Panel-box">
                <div class="Panel-content">
                    @if($item->sub_title)<h3 class="Panel-subtitle">{{ $item->getTranslatedAttribute('sub_title', App()->getLocale(), 'en-gb') }}</h3>@endif
                    <h2 class="Panel-title">{{ $item->getTranslatedAttribute('title', App()->getLocale(), 'en-gb') }}</h2>
                    <div class="Content Content--onDark Panel-desc">{{ $item->getTranslatedAttribute('description', App()->getLocale(), 'en-gb') }}</div>
                    <div class="Panel-buttons">
                        @if($item->slug)
                        <a class="Link Button Button--ghost Panel-button" href="{{ $item->slug }}" data-analytics="homepage-panel" data-analytics-placement="Recruit A Friend Page">
                            <div class="Button-outer">
                                <div class="Button-inner">
                                    <div class="Button-label" data-text="{{ $item->getTranslatedAttribute('slug_text', App()->getLocale(), 'en-gb') }}">{{ $item->getTranslatedAttribute('slug_text', App()->getLocale(), 'en-gb') }}</div>
                                </div>
                            </div>
                        </a>
                        @endif
                        @if($item->slug_two)
                        <a class="Link Button Button--ghost Panel-button" href="{{ $item->slug_two }}" data-analytics="homepage-panel" data-analytics-placement="Page: Burning Crusade Classic">
                            <div class="Button-outer">
                                <div class="Button-inner">
                                    <div class="Button-label" data-text="{{ $item->getTranslatedAttribute('slug_text_two', App()->getLocale(), 'en-gb') }}">{{ $item->getTranslatedAttribute('slug_text_two', App()->getLocale(), 'en-gb') }}</div>
                                </div>
                            </div>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
