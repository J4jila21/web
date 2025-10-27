@if ($paginator->hasPages())
    <div class="flex flex-col items-center mt-6">

        <!-- Pagination -->
        <div class="flex items-center gap-5">
            @foreach ($elements as $element)
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="px-4 py-2 rounded-lg bg-primary-600 text-white font-semibold">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}"
                                class="px-4 py-2 rounded-lg bg-white hover:bg-primary-600 hover:text-white transition-duration-">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach
            
            
        </div>
    </div>
@endif
