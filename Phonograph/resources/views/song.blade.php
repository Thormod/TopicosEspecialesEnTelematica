@extends('app')

@section('content')
<section class="promo section section-on-bg">
    <div style="margin-top: -130px;">
    @if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Whoops!</strong> You need more caaasshhh.<br><br>
      </div>
    @endif
    </div>
    <div class="container text-center">
        @include('components.player')
    </div><!--//container-->
</section><!--//promo-->
@endsection
