@if ($paginator->hasPages())
    <ul class="pagination" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled" aria-disabled="true">
                <span class="page-link active" aria-hidden="true"><i class="ti-arrow-left"></i></span>
            </li>
        @else

            <li class="page-item active">
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev">
                    <span class="page-link active" aria-hidden="true"><i class="ti-arrow-left"></i></span>
                </a>
            </li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item active">
                <a href="{{ $paginator->nextPageUrl() }}" rel="next">
                    <span class="page-link active" aria-hidden="true"><i class="ti-arrow-right"></i></span>
                </a>
            </li>
        @else
            <li class="disabled" aria-disabled="true">
                <span class="page-link" aria-hidden="true"><i class="ti-arrow-right"></i></span>
            </li>
        @endif
    </ul>
@endif
