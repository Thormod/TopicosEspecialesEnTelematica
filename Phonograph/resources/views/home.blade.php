@extends('app')

@section('content')

<section class="promo section section-on-bg">
    <div class="container text-center">
        <h2 class="title">¡Your music<br /> is not so far away!</h2>
        <p class="intro">Search for titles, artist, genres, everything... We are fast enough to catch your searches</p>
				@include('components.searchbar')
    </div><!--//container-->
</section><!--//promo-->
@endsection
