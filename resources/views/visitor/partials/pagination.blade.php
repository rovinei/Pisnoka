@if ($paginator->hasPages())
<!-- next prev blog -->
<div id="pagination">
    <span class="pagina-num">Show 1 to {{ $paginator->perPage() * $paginator->currentPage()}} of {{ $paginator->total()}}</span>
    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <li>
            <a class="disabled">
                <i class="fa fa-ellipsis-h"></i>
            </a>
        </li>
        @endif

        {{-- Array Of Links --}}
        @if(is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                <a class="disabled current">
                    {{ $page }}
                </a>
                @else
                <a href="{{ $url }}" class="paginator__item">
                    {{ $page }}
                </a>
                @endif
            @endforeach
        @endif
    @endforeach
    <span class="pull-right">
        @if ($paginator->onFirstPage())
            <span class="disabled">prev</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}">prev</a>
        @endif

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}">next</a>
        @else
            <span class="disabled">next</span>
        @endif
    </span>
</div>
<!-- next prev blog end -->
@endif
