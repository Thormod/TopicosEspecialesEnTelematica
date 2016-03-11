@extends('app')

@section('content')

<section class="promo section section-on-bg">
    <div class="container text-center">
        <h2 class="title">¡Your music<br /> is not so far away!</h2>
        <p class="intro">Phonograph is a powerful <strong>music search engine</strong> and online music shop <br /> designed to help you find your rarest music...</p>
        <p><a class="btn btn-cta btn-cta-primary" href="{{ url('auth/register') }}">Try Phonograph for free</a></p>
    </div><!--//container-->
</section><!--//promo-->

@endsection
