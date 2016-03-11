<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Files;
use App\Artists;
use App\Buys;
use App\User;




class SongsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id){
		//
		$file = Files::where('id', $id)->get();
		$author = Artists::where('id',$file[0]->created_by)->get();

		$buys = Buys::where('file_id','=', $file[0]->id)
					->where('buyed_by','=', Auth::user()->id)
					->get();

		return view('song')
		->with('song', $file)
		->with('author', $author)
		->with('buys', $buys);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function buy($id){
		//
		$file = Files::where('id', $id)->get();

		if(Auth::user()->money < $file[0]->price){
			return redirect()->back()->with('errors', 'You need more caaashhhh');
		}else{
			$user = User::find(Auth::user()->id);
			$user->money = $user->money - $file[0]->price;
			$user->save();

			$buy = new Buys;
			$buy->buyed_by = Auth::user()->id;
			$buy->file_id = $id;
			$buy->save();
			return redirect()->back();
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
