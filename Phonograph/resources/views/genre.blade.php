@extends('app')

@section('content')
<section class="promo section section-on-bg">
    <div class="container text-center">

    <center>
    <a href="#aboutModal" data-toggle="modal" data-target="#myModal"><img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcRbezqZpEuwGSvitKy3wrwnth5kysKdRqBW54cAszm_wiutku3R" name="aboutme" width="140" height="140" class="img-circle"></a>
    <h3>{{ $genre[0]->name }}</h3>
    </center>
      <section class="comments">

        @foreach($songs as $song)
          <article class="comment" onclick="location.href='/song/{{$song->id}}'">
            <a class="comment-img" href="#non">
              <img src="{{ $song->cover }}" alt="" width="50" height="50" />
            </a>

            <div class="comment-body">
              <div class="text">
                <p><i class="fa fa-play-circle"></i> {{ $song->name }}</p>
              </div>
            </div>
          </article>
        @endforeach

    </section>
    </div><!--//container-->
</section><!--//promo-->

@endsection
