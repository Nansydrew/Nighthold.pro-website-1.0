@if ($paginator->hasPages())
<div class="Paginator-nav gutter-normal gutter-all align-right">
    <div class="Pagination Paginator-numbers">
        @if (!$paginator->onFirstPage())
            <div class="Pagination-page">
                <a class="Link Button Button--ghost Button--small Pagination-button Button--prev is-selected" href="{{ $paginator->previousPageUrl() }}">
                    <div class="Button-outer">
                        <div class="Button-inner">Назад
                        </div>
                    </div>
                </a>
            </div>
        @endif

            @foreach ($elements as $element)
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <div class="Pagination-page">
                                <span data-page="{{ $page }}">{{ $page }}</span>
                            </div>
                        @else
                            <div class="Pagination-page">
                                <a class="Link Button Button--ghost Button--small Pagination-button is-selected" href="{{ $url }}" data-page="{{ $page }}">
                                    <div class="Button-outer">
                                        <div class="Button-inner">
                                            <div class="Button-label" data-text="{{ $page }}">{{ $page }}</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <div class="Pagination-page">
                    <a class="Link Button Button--ghost Button--small Pagination-button Button--next is-selected" href="{{ $paginator->nextPageUrl() }}">
                        <div class="Button-outer">
                            <div class="Button-inner">
                                Дальше
                            </div>
                        </div>
                    </a>
                </div>
            @endif
    </div>
</div>
@endif
