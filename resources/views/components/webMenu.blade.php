@foreach($items as $menu_item)
    @if($menu_item->route)
    <div class="SiteNav-menuListItem List-item">
        @if($menu_item->new_item) <span class="SiteNav-menuListItemSuperscript">Новый</span> @endif
        <a class="Link Link--block SiteNav-menuListLink text-upper" href="{{ $menu_item->link() }}" data-analytics="shop-link" data-analytics-placement="Shop || Nav"><span class="SiteNav-menuListLinkText" data-text="{{ $menu_item->getTranslatedAttribute('title', App()->getLocale(), 'en-gb') }}">{{ $menu_item->getTranslatedAttribute('title', App()->getLocale(), 'en-gb') }}</span></a>
    </div>
    @else
    <div class="SiteNav-menuListItem List-item">
        <a class="Link Link--block SiteNav-menuListLink" data-dropdown="SiteNav-dropdown-{{ $menu_item->id }}" tabindex="{{ $menu_item->id }}0">
            <div class="DropdownLink DropdownLink--gold DropdownLink--goldWithHover text-upper"><span class="SiteNav-menuListLinkText" data-text="{{ $menu_item->getTranslatedAttribute('title', App()->getLocale(), 'en-gb') }}">{{ $menu_item->getTranslatedAttribute('title', App()->getLocale(), 'en-gb') }}</span><span class="SiteNav-dropdownIndicator DropdownLink-indicator"></span></div>
        </a>
    </div>
    @endif
@endforeach
