<div>
    <div id="indicators-carousel" class="relative w-full" data-carousel="slide">
        @if (count($images) === 1)
            <div class="relative h-56 overflow-hidden md:h-[32rem]">
                @if ($image->url)
                    <a href="{{ $image->url }}" target="@if (strpos($image->url, 'http') !== false) _blank @endif">

                        <img src="{{ asset('images/chamadas/' . $image->imagem) }}" class="absolute block w-full h-full"
                            alt="...">
                    </a>
                @else
                    <img src="{{ asset('images/chamadas/' . $image->imagem) }}" class="absolute block w-full h-full"
                        alt="...">
                @endif
            </div>
        @else
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden md:h-[32rem]">
                @foreach ($images as $image)
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        @if ($image->url)
                            <a href="{{ $image->url }}" target="@if (strpos($image->url, 'http') !== false) _blank @endif">
                                <img src="{{ asset('images/chamadas/' . $image->imagem) }}"
                                    class="absolute block h-full w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                    alt="...">
                            </a>
                        @else
                            <img src="{{ asset('images/chamadas/' . $image->imagem) }}"
                                class="absolute block h-full w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        @endif
                    </div>
                @endforeach

            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
                @for ($i = 0; $i < count($images); $i++)
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="true"
                        aria-label="Slide {{ $i }}" data-carousel-slide-to="{{ $i }}"></button>
                @endfor
            </div>
            <!-- Slider controls -->
            <button type="button"
                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/10 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white/60 dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Anterior</span>
                </span>
            </button>
            <button type="button"
                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/10 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white/60 dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Proximo</span>
                </span>
            </button>
        @endif
    </div>
</div>
