@extends('layouts.app')

@section('content')
    @include('partials.home.header')

    <main class="overflow-hidden pt-20">
        @include('partials.home.hero')
        @include('partials.home.properties')
        @include('partials.home.amenities')
        @include('partials.home.lifestyle')
        @include('partials.home.location')
        @include('partials.home.viewing')
        @include('partials.home.faq')
        @include('partials.home.cta')
    </main>

    @include('partials.home.footer')
@endsection
