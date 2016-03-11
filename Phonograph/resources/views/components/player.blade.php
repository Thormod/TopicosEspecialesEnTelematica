<canvas id="progress" width="320" height="320"></canvas><!-- progress bar -->
<div id="player">
	<audio id="audio" name="myAudio" controls>
		<source src="{{ $song[0]->file_path}}" type="audio/mpeg" codecs="mp3"></source>
	</audio>
	<img src="{{ $song[0]->cover }}"><!-- album cover -->

	<div class="cover">
		<div class="controls">
			@if( $buys->count() == 0)
			<button id="play-pause" title="Play" onclick="togglePlayPause2()" class="playerbutton"><i class="fa fa-play fa-3x"></i></button>
			<button title="Buy" class="playerbutton" onclick="location.href='/buy/{{ $song[0]->id }}'">$ {{$song[0]->price}} <i class="fa fa-money fa-2x"></i></button>
			@else
			<a href="{{ $song[0]->file_path}}" download>Download Here</a>
			<button id="play-pause" title="Play" onclick="togglePlayPause()" class="playerbutton"><i class="fa fa-play fa-3x"></i></button>
			@endif
			<input id="volume" name="volume" min="0" max="1" step="0.1" type="range" onchange="setVolume()" />
		</div><!-- #controls -->
		<div class="info">
			<p>{{ $song[0]->name }}</p>
			<p>{{ $author[0]->name }}</p>
		</div><!-- #info -->

	</div><!-- #cover -->
</div><!-- #player -->
