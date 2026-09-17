<section id="properties" class="bg-surface-low py-16 lg:py-24">
    <div class="mx-auto max-w-[1360px] px-5 lg:px-16">
        <div class="mb-10 max-w-2xl">
            <p class="text-xs font-bold uppercase tracking-[0.16em] text-secondary">Our Residential Collection</p>
            <h2 class="mt-2 font-display text-4xl font-medium leading-tight text-primary">Homes Designed Around Your Life</h2>
            <p class="mt-3 text-base leading-7 text-copy">Explore three thoughtfully designed home options created for different lifestyles and growing families.</p>
        </div>
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @php($homes = [
                ['name' => 'The Willow', 'type' => 'Single-Attached', 'image' => 'willow.jpg', 'description' => 'A balanced two-storey home layout crafted for comfortable everyday living, featuring bright shared spaces and seamless indoor-outdoor flow.', 'specs' => ['3 Bedrooms', '2 Bathrooms', '1 Carport']],
                ['name' => 'The Cedar', 'type' => 'Single-Attached', 'image' => 'cedar.jpg', 'description' => 'An inviting contemporary family home designed with generous natural light, versatile living areas, and practical spaces for modern living.', 'specs' => ['3 Bedrooms', '2 Bathrooms', '1 Powder Room', '1 Carport']],
                ['name' => 'The Oak', 'type' => 'Single-Detached', 'image' => 'oak.jpg', 'description' => 'A spacious standalone residential design emphasizing open-concept gathering spaces, comfortable bedrooms, and quiet privacy.', 'specs' => ['3 Bedrooms', '2 Bathrooms', '1 Powder Room', '1 Carport']],
            ])
            @foreach ($homes as $home)
                <article class="group flex min-w-0 flex-col overflow-hidden rounded-2xl bg-surface shadow-sm ring-1 ring-surface-high transition hover:-translate-y-1 hover:shadow-lg">
                    <div class="relative aspect-[4/3] overflow-hidden"><img src="{{ asset('images/havenstone/'.$home['image']) }}" alt="{{ $home['name'] }} home exterior" class="h-full w-full object-cover object-center transition duration-700 group-hover:scale-105"><span class="absolute left-4 top-4 rounded-full bg-surface/95 px-3 py-1 text-[11px] font-bold uppercase tracking-wide text-primary">{{ $home['type'] }}</span></div>
                    <div class="flex flex-1 flex-col p-6">
                        <h3 class="font-display text-2xl font-semibold text-primary">{{ $home['name'] }}</h3>
                        <p class="mt-3 text-sm leading-6 text-copy">{{ $home['description'] }}</p>
                        <ul class="mt-5 flex flex-wrap gap-2" aria-label="{{ $home['name'] }} specifications">
                            @foreach ($home['specs'] as $spec)<li class="rounded-full bg-surface-container px-3 py-1.5 text-xs text-copy">{{ $spec }}</li>@endforeach
                        </ul>
                        <a href="#viewing" class="mt-6 inline-flex w-full items-center justify-center gap-2 rounded-xl bg-surface-container py-3 text-sm font-semibold text-primary transition hover:bg-primary hover:text-white focus:outline-none focus-visible:ring-2 focus-visible:ring-secondary">View Home <span class="material-symbols-outlined text-lg" aria-hidden="true">arrow_forward</span></a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
