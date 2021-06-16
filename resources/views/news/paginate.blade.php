@if ($paginator->hasPages())
    <div class="Paginator-nav gutter-normal gutter-all align-center">
        <a class="Link Button Button--ghost Paginator-loadmore">
            <div class="Button-outer">
                <div class="Button-inner">
                    <div class="Button-label" data-text="{{ __('pagination.previous_news') }}">{{ __('pagination.previous_news') }}</div>
                </div>
            </div>
        </a>
    </div>
@endif
