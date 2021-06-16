@if ($paginator->hasPages())
    <div class="Pagination">

    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <div class="Pagination-page">
                <span data-page="{{ $element }}">{{ $element }}</span>
            </div>
        @endif
        {{-- Array Of Links --}}
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
    </div>
@endif
