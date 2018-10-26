@if ($paginator->hasPages())
    <nav class="pagination" role="navigation" aria-label="pagination">
        <a href="{{ $paginator->previousPageUrl() }}"
           class="pagination-previous is-radiusless {{ $paginator->onFirstPage() ? 'is-disabled': '' }}">
            <span class="icon"><i class="mdi mdi-chevron-left mdi-24px"></i></span>
        </a>

        <a href="{{ $paginator->nextPageUrl() }}"
           class="pagination-next is-radiusless {{ !$paginator->hasMorePages() ? 'is-disabled': '' }}">
            <span class="icon"><i class="mdi mdi-chevron-right mdi-24px"></i></span>
        </a>
        <ul class="pagination-list">
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li><span class="pagination-ellipsis is-radiusless">&hellip;</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        <li>
                            <a href="{{ $url }}"
                               class="pagination-link is-radiusless {{ $page == $paginator->currentPage() ? 'is-current' : '' }}">
                                {{ $page }}
                            </a>
                        </li>
                    @endforeach
                @endif
            @endforeach
        </ul>
    </nav>
@endif
