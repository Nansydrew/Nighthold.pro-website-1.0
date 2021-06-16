@foreach($items as $menu_item)
    @if($menu_item->route)
        <div class="BnetNav-mobileSiteMenuListItem List-item">
            <a class="Link Link--block BnetNav-mobileSiteMenuLink" href="{{ $menu_item->link() }}" data-analytics="shop-link" data-analytics-placement="{{ $menu_item->getTranslatedAttribute('title', App()->getLocale(), 'en-gb') }}"><span class="BnetNav-mobileSiteMenuLinkText text-upper" data-text="{{ $menu_item->getTranslatedAttribute('title', App()->getLocale(), 'en-gb') }}">{{ $menu_item->getTranslatedAttribute('title', App()->getLocale(), 'en-gb') }}</span></a>
        </div>
    @else
        <div class="BnetNav-mobileSiteMenuListItem List-item">
            <a class="Link" data-dropdown="BnetNav-mobileSiteMenu-menuItemDropdown-{{ $menu_item->id }}">
                <div class="DropdownLink DropdownLink--gold BnetNav-mobileSiteMenuLink text-upper">
                    <span class="BnetNav-mobileSiteMenuLinkText" data-text="{{ $menu_item->getTranslatedAttribute('title', App()->getLocale(), 'en-gb') }}">{{ $menu_item->getTranslatedAttribute('title', App()->getLocale(), 'en-gb') }}</span>
                    <span class="BnetNav-mobileDropdownIndicator DropdownLink-indicator"></span></div>
            </a>
            @foreach($items as $menu_item)
                @if(!$menu_item->children->isEmpty())
                    <div class="Dropdown" name="BnetNav-mobileSiteMenu-menuItemDropdown-{{ $menu_item->id }}" data-dropdown-group="BnetNav-mobileSiteMenuSections">
                        <div class="BnetNav-mobileSiteMenuList List List--full List--vertical">
                            @foreach($menu_item->children as $menu)
                                <div class="BnetNav-mobileSiteMenuListItem List-item">
                                    <a class="Link" data-dropdown="BnetNav-mobileSiteMenu-category-{{ $menu->id }}">
                                        <div class="DropdownLink DropdownLink--gold BnetNav-mobileSiteMenuLink">
                                            <div class="Pair"><div class="Pair-left">{{ $menu->getTranslatedAttribute('title', App()->getLocale(), 'en-gb') }}</div>
                                                <div class="Pair-right">
                                                    <div class="BnetNav-mobileDropdownIndicator DropdownLink-indicator"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="Dropdown" name="BnetNav-mobileSiteMenu-category-{{ $menu->id }}" data-dropdown-group="BnetNav-mobileSiteMenuSubsections">
                                        <div class="BnetNav-mobileSiteMenuList List List--full List--vertical">
                                            @if(!$menu->children->isEmpty())
                                                @foreach($menu->children as $item)
                                            <a class="Link Link--block BnetNav-mobileSiteMenuLink" href="{{ $item->link() }}" type="CATEGORY_ITEM" data-analytics="main-nav" data-analytics-placement="Game - Gameplay - Races">{{ $item->getTranslatedAttribute('title', App()->getLocale(), 'en-gb') }}</a>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @endif
@endforeach
