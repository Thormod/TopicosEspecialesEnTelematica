<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Artists;
use App\Genres;
use App\Files;


class SearchController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function searchForArtists($criteria){
		//
		$artists = Artists::where(function ($query) use($criteria){
			$query->where('artists.name','like','%'.$criteria.'%');
		})->select('artists.*')->get();
		return $artists;
	}

	public function searchForGenres($criteria){
		//
		$genres = Genres::where(function ($query) use($criteria){
			$query->where('genres.name','like','%'.$criteria.'%');
		})->select('genres.*')->get();
		return $genres;
	}

	public function searchForSongs($criteria){
		//
		$songs = Files::where(function ($query) use($criteria){
			$query->where('files.name','like','%'.$criteria.'%');
		})->select('files.*')->get();
		return $songs;
	}
	public function searchForAll($criteria){
		//
		$artists=$this->searchForArtists($criteria);
		$genres=$this->searchForGenres($criteria);
		$songs=$this->searchForSongs($criteria);

		return view('searchResults')
		->with('artists', $artists)
		->with('genres',$genres)
		->with('songs',$songs);
	}

}
