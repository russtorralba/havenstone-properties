<header class="fixed inset-x-0 top-0 z-50 border-b border-surface-high/70 bg-surface/90 backdrop-blur-xl">
    <div class="mx-auto flex h-20 max-w-[1360px] items-center justify-between gap-3 px-5 lg:px-8 xl:px-16">
        <a href="#hero" class="flex shrink-0 items-center gap-3 rounded-md focus:outline-none focus-visible:ring-2 focus-visible:ring-secondary">
            <img src="{{ asset('images/havenstone/logo.png') }}" alt="Havenstone Properties" class="h-9 w-auto object-contain lg:h-10">
            <span class="hidden border-l border-surface-high pl-3 text-[11px] font-semibold leading-4 tracking-[0.2em] text-secondary lg:inline">PROPERTIES<br>BATAAN</span>
        </a>

        <nav class="hidden shrink-0 rounded-full bg-surface-container/60 p-1 lg:flex xl:p-1.5" aria-label="Primary navigation">
            @foreach (['Home' => 'hero', 'Properties' => 'properties', 'Amenities' => 'amenities', 'About' => 'about', 'Location' => 'location', 'FAQs' => 'faqs', 'Contact' => 'viewing'] as $label => $target)
                <a href="#{{ $target }}" class="rounded-full px-2.5 py-2.5 text-[12px] font-semibold text-copy transition hover:bg-surface-high hover:text-primary focus:outline-none focus-visible:ring-2 focus-visible:ring-secondary xl:px-4 xl:text-sm">{{ $label }}</a>
            @endforeach
        </nav>

        <div class="flex shrink-0 items-center gap-2 lg:gap-3">
            <a href="#viewing" class="hidden rounded-full bg-primary-container px-4 py-3 text-[12px] font-semibold text-white shadow-sm transition hover:-translate-y-0.5 hover:bg-secondary focus:outline-none focus-visible:ring-2 focus-visible:ring-secondary lg:inline-flex xl:px-6 xl:text-sm">Schedule a Viewing</a>
            <button type="button" class="inline-flex min-h-11 min-w-11 items-center justify-center rounded-full text-primary transition hover:bg-surface-high focus:outline-none focus-visible:ring-2 focus-visible:ring-secondary lg:hidden" aria-expanded="false" aria-controls="mobile-menu" data-menu-toggle>
                <span class="sr-only">Open navigation menu</span>
                <span class="material-symbols-outlined" aria-hidden="true">menu</span>
            </button>
        </div>
    </div>

    <div id="mobile-menu" class="hidden border-t border-surface-high bg-surface-low px-5 py-5 lg:hidden" data-mobile-menu>
        <nav class="mx-auto flex max-w-[1360px] flex-col gap-1" aria-label="Mobile navigation">
            @foreach (['Home' => 'hero', 'Properties' => 'properties', 'Amenities' => 'amenities', 'About' => 'about', 'Location' => 'location', 'FAQs' => 'faqs', 'Contact' => 'viewing'] as $label => $target)
                <a href="#{{ $target }}" class="min-h-11 rounded-lg px-4 py-3 text-sm font-semibold text-copy transition hover:bg-surface-high hover:text-primary focus:outline-none focus-visible:ring-2 focus-visible:ring-secondary" data-menu-link>{{ $label }}</a>
            @endforeach
            <a href="#viewing" class="mt-2 rounded-full bg-primary-container px-5 py-3 text-center text-sm font-semibold text-white" data-menu-link>Schedule a Viewing</a>
        </nav>
    </div>
</header>
