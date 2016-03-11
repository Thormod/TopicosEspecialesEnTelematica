@extends('app')

@section('content')
<section class="promo section section-on-bg">
    <div class="container text-center">
      <section class="comments">

       @if($genres->count() == 0 && $artists->count() == 0 && $songs->count() == 0)
         <hr><label>Nothing found over here...</label>
       @endif
       @if($genres->count() != 0)
        @foreach($genres as $genre)
        		<a class="comment-img" href="#non">
              <article class="comment" onclick="location.href='/genre/{{ $genre->id }}'">
        			<img src="http://lorempixum.com/50/50/people/1" alt="" width="50" height="50" />
        		</a>

        		<div class="comment-body">
        			<div class="text">
        			  <p>{{ $genre->name }}</p>
        			</div>
            </div>
        	</article>
        @endforeach
      @endif

      @if($artists->count() != 0)
       @foreach($artists as $artist)
         <article class="comment" onclick="location.href='/artist/{{ $artist->id }}'">
           <a class="comment-img" href="#non">
             <img src="http://lorempixum.com/50/50/people/1" alt="" width="50" height="50" />
           </a>

           <div class="comment-body">
             <div class="text">
               <p>{{ $artist->name }}</p>
             </div>
           </div>
         </article>
       @endforeach
     @endif

     @if($songs->count() != 0)
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
    @endif
    </section>
    </div><!--//container-->
</section><!--//promo-->

@endsection
