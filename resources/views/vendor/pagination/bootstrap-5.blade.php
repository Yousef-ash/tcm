{{-- <ul class="edu-pagination pt--50">
    <li><a href="#" aria-label="Previous"><i class="icon-east"></i></a></li>
    <li class="active"><a href="#">١</a></li>
    <li><a href="#">٢</a></li>
    <li><a href="#">٣</a></li>
    <li class="more-next"><a href="#"></a></li>
    <li><a href="#">٨</a></li>
    <li><a href="#" aria-label="Next"><i class="icon-west"></i></a></li>
</ul> --}}

@if ($paginator->hasPages())

    <ul class="edu-pagination pt--50">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())

        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" aria-label="Previous"><i class="icon-east"></i></a>
            </li>
        @endif
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))

                <li class="more-next"><a disabled>{{ $element }}</a></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><a disabled>{{ $page }}</a></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" aria-label="Next"><i class="icon-west"></i></a></li>
        @endif
    </ul>
    </div>

    {{-- /  <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between"> --}}
    {{-- <div>
                <p class="small text-muted">
                    {!! __('Showing') !!}
                    <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
                    {!! __('to') !!}
                    <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
                    {!! __('of') !!}
                    <span class="fw-semibold">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>

        <div> --}}


@endif
