@if ($paginator->hasPages())
    <div class="Pagination-footer">
        @if ($paginator->onFirstPage())
        @else
            <a class="Pagination-button Pagination-button--prev" href="{{ $paginator->previousPageUrl() }}"><span class="Button-content"><i class="Icon"></i>Назад</span></a>

        @endif

        @if ($paginator->hasMorePages())
            <a class="Pagination-button Pagination-button--next" href="{{ $paginator->nextPageUrl() }}"><span class="Button-content">След.<i class="Icon"></i></span></a>
        @else
        @endif
    </div>
@endif