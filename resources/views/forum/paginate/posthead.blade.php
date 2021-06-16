@if ($paginator->hasPages())
    <div class="Container Container--content Topic-container">
        <div class="Topic-pagination--header">
            @if ($paginator->onFirstPage())
            @else
                <a class="Pagination-button Pagination-button--prev" href="{{ $paginator->previousPageUrl() }}"><span class="Button-content"><i class="Icon--16"></i>Пред.</span></a>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <a class="Pagination-button Pagination-button--ordinal is-active" href="?page={{ $element }}" data-page-number="{{ $element }}"><span class="Button-content">{{ $element }}</span></a>
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a class="Pagination-button Pagination-button--ordinal is-active" href="{{ $url }}" data-page-number="{{ $page }}"><span class="Button-content">{{ $page }}</span></a>
                        @else
                            <a class="Pagination-button Pagination-button--ordinal" href="{{ $url }}" data-page-number="{{ $page }}"><span class="Button-content">{{ $page }}</span></a>
                        @endif
                    @endforeach
                @endif
            @endforeach
            @if ($paginator->hasMorePages())
                <a class="Pagination-button Pagination-button--next" href="{{ $paginator->nextPageUrl() }}"><span class="Button-content">След.<i class="Icon--16"></i></span></a>
            @else
            @endif
        </div>

        <div class="Topic-pagination--mobile">
            @if ($paginator->onFirstPage())
            @else
                <a class="Pagination-button Pagination-button--first" href="{{ $paginator->previousPageUrl() }}"><span class="Button-content"><i class="Icon"></i></span></a>
            @endif

            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <a class="Pagination-button Pagination-button--ordinal is-active" href="?page={{ $element }}" data-page-number="{{ $element }}"><span class="Button-content">{{ $element }}</span></a>
                @endif
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a class="Pagination-button Pagination-button--ordinal is-active" href="{{ $url }}" data-page-number="{{ $page }}"><span class="Button-content">{{ $page }}</span></a>
                        @else
                            <a class="Pagination-button Pagination-button--ordinal" href="{{ $url }}" data-page-number="{{ $page }}"><span class="Button-content">{{ $page }}</span></a>
                        @endif
                    @endforeach
                <!--<div class="Pagination-button Pagination-button--ordinal"> <div class="Dropdown Pagination-menu-container"> <span class="Pagination-ellipsis" data-trigger="toggle.dropdown.menu" type="button" data-toggle="tooltip" data-tooltip-content="Перейти к странице:"> <span class="Button-content">2 / 30</span> </span> <div class="Pagination-Menu Dropdown-menu"> <span class="Dropdown-arrow Dropdown-arrow--up" data-attachment="top right" data-target-attachment="bottom center"></span> <div class="Dropdown-items"><span class="Dropdown-item Dropdown-item--disabled label">Перейти к странице:</span> <form class="Form Dropdown-item Dropdown-item--disabled"> <div class="Pagination-input"> <input name="page" type="number" pattern="[0-9]" min="1" max="30" value="2" autocomplete='off' /> <div class="Input-border"></div> </div> </form> </div> </div> </div> </div>-->
                @endif
            @endforeach

        <!--a class="Pagination-button Pagination-button--prev" href="?page=1"><span class="Button-content"><i class="Icon"></i></span></a>  <a class="Pagination-button Pagination-button--next" href="?page=3"><span class="Button-content"><i class="Icon"></i></span></a-->
            @if ($paginator->hasMorePages())
                <a class="Pagination-button Pagination-button--last" href="{{ $paginator->nextPageUrl() }}"><span class="Button-content"><i class="Icon"></i></span></a>
            @else
            @endif
        </div>
    </div>
@endif 