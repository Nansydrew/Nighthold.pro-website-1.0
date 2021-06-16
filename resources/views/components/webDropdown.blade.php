@foreach($items as $menu_item)
    @if(!$menu_item->children->isEmpty())
        <div class="Dropdown SiteNav-doormat" name="SiteNav-dropdown-{{ $menu_item->id }}">
            <div class="SiteNav-doormatContent">
                <div class="Grid Grid--gutters">
                    @foreach($menu_item->children as $menu)
                            <div class="Grid-1of5">
                                <div class="List List--full List--vertical List--separator List--separatorBrownMedium">
                                    <div class="List-item gutter-tiny gutter-vertical">
                                        <div class="SiteNav-sectionTitle font-title-tiny-onDark">{{ $menu->getTranslatedAttribute('title', App()->getLocale(), 'en-gb') }}</div>
                                    </div>
                                    <div class="List-item gutter-tiny gutter-vertical">
                                        @if(!$menu->children->isEmpty())
                                            @foreach($menu->children as $item)
                                            <div class="gutter-vertical gutter-tiny">
                                            <a class="Link Link--block SiteNav-pageLink" href="{{ $item->link() }}" type="CATEGORY_ITEM" data-analytics="main-nav" data-analytics-placement="Game - Gameplay - Races">{{ $item->getTranslatedAttribute('title', App()->getLocale(), 'en-gb') }} @if($item->new_item)<sup class="font-sup color-gold-medium">Новый</sup>@endif</a></div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endforeach
