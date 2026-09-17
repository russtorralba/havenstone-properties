<section id="amenities" class="bg-surface py-16 lg:py-24">
    <div class="mx-auto max-w-[1360px] px-5 lg:px-16">
        <div class="mx-auto mb-10 max-w-2xl text-center"><p class="text-xs font-bold uppercase tracking-[0.16em] text-secondary">Neighborhood Life</p><h2 class="mt-2 font-display text-4xl font-medium text-primary">More Than a Home. A Community.</h2><p class="mt-3 text-base leading-7 text-copy">Thoughtfully planned shared amenities created for recreation, wellness, and quality family moments.</p></div>
        @php($amenities = [['pool', 'Swimming Pool', 'A refreshing community pool designed for recreation and family relaxation.'], ['temple_buddhist', 'Community Pavilion', 'A versatile shared gathering space for neighborhood activities and celebrations.'], ['sports_basketball', 'Basketball Court', 'An outdoor recreational sports half-court for casual play and active leisure.'], ['toys', 'Children’s Playground', 'A dedicated play area designed for recreation and family enjoyment.'], ['park', 'Landscaped Open Spaces', 'Green open spaces and garden pathways for peaceful walks and outdoor fresh air.'], ['verified_user', 'Secure Community Entrance', 'A dedicated entrance gateway establishing the community boundary and welcoming residents home.']])
        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($amenities as [$icon, $title, $description])
                <article class="rounded-2xl bg-surface-low p-6 transition hover:bg-surface-container"><span class="material-symbols-outlined inline-flex h-14 w-14 items-center justify-center rounded-full bg-surface-high text-2xl text-primary" aria-hidden="true">{{ $icon }}</span><h3 class="mt-5 font-display text-xl font-semibold text-primary">{{ $title }}</h3><p class="mt-2 text-sm leading-6 text-copy">{{ $description }}</p></article>
            @endforeach
        </div>
    </div>
</section>
