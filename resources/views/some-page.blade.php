<!-- resources/views/some-page.blade.php -->
@component('components.card')
    @slot('title')
        Card Title
    @endslot

    Card content goes here.
@endcomponent
