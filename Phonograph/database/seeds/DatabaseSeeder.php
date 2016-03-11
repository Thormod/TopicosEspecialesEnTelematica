<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\Artists;
use App\Genres;
use App\Files;
use App\Buys;


class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// $this->call(UsersTableSeeder::class);
		// Users
		User::create([
			 'username' => 'ThormodTyrsson',
			 'admin' => 1,
			 'money' => 0,
			 'email' => 'thor@gmail.com',
			 'password' => Hash::make('pass'),

		 ]);
		 User::create([
			 'username' => 'SebastianZapata',
			 'admin' => 0,
			 'money' => '10.00',
			 'email' => 'sebas@gmail.com',
			 'password' => Hash::make('pass'),
		 ]);

		 //Artists
		 //1
		Artists::create([
			 	'name' => 'Abba',
		]);
		//Files
		Files::create([
			'created_by' => 1,
			'genre_id' => 3,
			'name' => 'Dancing Queen',
			'file_path' => '/songs/Abba - Dancing Queen.mp3',
			'cover' => '/songs/covers/abba.jpg',
			'price' => 60,
		]);
		//2
		Artists::create([
			 	'name' => 'AC/DC',
		]);
		//Files
		Files::create([
			'created_by' => 2,
			'genre_id' => 2,
			'name' => 'Rock N Roll Train',
			'file_path' => '/songs/AC DC - Rock N Roll Train.mp3',
			'cover' => '/songs/covers/acdc.jpg',
			'price' => 55,
		]);
		//3
		Artists::create([
			 	'name' => 'Aerosmith',
		]);
		//Files
		Files::create([
			'created_by' => 3,
			'genre_id' => 2,
			'name' => 'Crazy',
			'file_path' => '/songs/Aerosmith - Crazy.mp3',
			'cover' => '/songs/covers/aeros.jpg',
			'price' => 80.7,
		]);
		//4
		Artists::create([
			 	'name' => 'Miley Cyrus',
		]);
		//Files
		Files::create([
			'created_by' => 4,
			'genre_id' => 3,
			'name' => 'Wrecking Ball',
			'file_path' => '/songs/Miley Cyrus - Wrecking Ball.mp3',
			'cover' => '/songs/covers/miley.jpg',
			'price' => 10,
		]);
		//5
		Artists::create([
			 	'name' => 'Akon',
		]);
		//Files
		Files::create([
			'created_by' => 5,
			'genre_id' => 20,
			'name' => 'Lonely',
			'file_path' => '/songs/Akon - Lonely.mp3',
			'cover' => '/songs/covers/akon.jpg',
			'price' => 10,
		]);
		//6
		Artists::create([
			 	'name' => 'I.R.A',
		]);
		//Files
		Files::create([
			'created_by' => 6,
			'genre_id' => 13,
			'name' => 'Lo que ustedes se merecen',
			'file_path' => '/songs/I R A - Lo que ustedes se merecen.mp3',
			'cover' => '/songs/covers/ira.jpg',
			'price' => 10,
		]);
		//7
		Artists::create([
			 	'name' => 'Alejandro Sanz',
		]);
		//Files
		Files::create([
			'created_by' => 7,
			'genre_id' => 3,
			'name' => 'Amiga mia',
			'file_path' => '/songs/Alejandro Sanz - Amiga mia.mp3',
			'cover' => '/songs/covers/alejandro.jpg',
			'price' => 45,
		]);
		//8
		Artists::create([
			 	'name' => 'The Addicts',
		]);
		//Files
		Files::create([
			'created_by' => 8,
			'genre_id' => 13,
			'name' => 'Viva La Revolution',
			'file_path' => '/songs/Viva La Revolution- The Adicts.mp3',
			'cover' => '/songs/covers/viva.jpg',
			'price' => 70.9,
		]);

		//9
		Artists::create([
		 	'name' => 'Arkangel',
		]);
		//Files
		Files::create([
			'created_by' => 9,
			'genre_id' => 5,
			'name' => 'Me Prefieres a Mi',
			'file_path' => '/songs/Arkangel - Me Prefieres a Mi.mp3',
			'cover' => '/songs/covers/arkangel.jpg',
			'price' => 0.05,
		]);
		//10
		Artists::create([
			 	'name' => 'Eminem',
		]);
		//Files
		Files::create([
			'created_by' => 10,
			'genre_id' => 21,
			'name' => 'Without Me',
			'file_path' => '/songs/Eminem - Without Me.mp3',
			'cover' => '/songs/covers/eminem.jpg',
			'price' => 0.05,
		]);
		//11
		Artists::create([
			 	'name' => 'Ariana Grande',
		]);
		//Files
		Files::create([
			'created_by' => 11,
			'genre_id' => 3,
			'name' => 'Focus',
			'file_path' => '/songs/Ariana Grande - Focus.mp3',
			'cover' => '/songs/covers/grande.jpg',
			'price' => 33.6,
		]);
		//12
		Artists::create([
			 	'name' => 'Aventura',
		]);
		//Files
		Files::create([
			'created_by' => 12,
			'genre_id' => 10,
			'name' => 'El perdedor',
			'file_path' => '/songs/Aventura - El Perdedor.mp3',
			'cover' => '/songs/covers/grande.jpg',
			'price' => 16.75,
		]);
		//13
		Artists::create([
			 	'name' => '50cent',
		]);
		//Files
		Files::create([
			'created_by' => 13,
			'genre_id' => 21,
			'name' => 'In Da Club Int',
			'file_path' => '/songs/50 Cent - In Da Club Int.mp3',
			'cover' => '/songs/covers/50cent.jpg',
			'price' => 0.50,
		]);
		//14
		Artists::create([
		 	'name' => 'Avril Lavigne',
		]);
		//Files
		Files::create([
			'created_by' => 14,
			'genre_id' => 2,
			'name' => 'Complicated',
			'file_path' => '/songs/Avril Lavigne - Complicated.mp3',
			'cover' => '/songs/covers/avil.jpg',
			'price' => 10,
		]);
		//15
		Artists::create([
			 	'name' => 'Dead Country Brothers',
		]);
		//Files
		Files::create([
			'created_by' => 15,
			'genre_id' => 1,
			'name' => 'Fellow Stranger',
			'file_path' => '/songs/Dead Country Brothers - Fellow Stranger.mp3',
			'cover' => '/songs/covers/dead.jpg',
			'price' => 80,
		]);
		//16
		Artists::create([
			 	'name' => 'Bach',
		]);
		//Files
		Files::create([
			'created_by' => 16,
			'genre_id' => 14,
			'name' => 'Air',
			'file_path' => '/songs/Bach - Air.mp3',
			'cover' => '/songs/covers/bach.jpg',
			'price' => 100,
		]);
		//17
		Artists::create([
			 	'name' => 'Bethoven',
		]);
		//Files
		Files::create([
			'created_by' => 17,
			'genre_id' => 14,
			'name' => 'Beethoven s 5th Symphony',
			'file_path' => '/songs/Beethoven s 5th Symphony.mp3',
			'cover' => '/songs/covers/bethoven.jpg',
			'price' => 100,
		]);
		//18
		Artists::create([
			 	'name' => 'Bee Gees',
		]);
		//Files
		Files::create([
			'created_by' => 18,
			'genre_id' => 16,
			'name' => 'Stayin Alive',
			'file_path' => '/songs/Bee Gees - Stayin Alive.mp3',
			'cover' => '/songs/covers/bee.jpg',
			'price' => 100,
		]);
		//19
		Artists::create([
			 	'name' => 'Antonio El trovador',
		]);
		//20
		Artists::create([
			 	'name' => 'The Beatles',
		]);
		//Files
		Files::create([
			'created_by' => 20,
			'genre_id' => 2,
			'name' => 'Dont let me down',
			'file_path' => '/songs/The Beatles - Don t Let Me Down.mp3',
			'cover' => '/songs/covers/beatles.jpg',
			'price' => 42.35,
		]);
		//21
		Artists::create([
			 	'name' => 'Beyonce',
		]);
		//22
		Artists::create([
			 	'name' => 'Rihana',
		]);
		//23
		Artists::create([
			 	'name' => 'Black Eyes Peas',
		]);
		//24
		Artists::create([
			 	'name' => 'Iron Maiden',
		]);
		//25
		Artists::create([
			 	'name' => 'Metallica',
		]);
		//26
		Artists::create([
		 	'name' => 'Eric Clapton',
		]);
		//27
		Artists::create([
			 	'name' => 'Dizzy Gillespie',
		]);
		//28
		Artists::create([
				'name' => 'Juanes',
		]);
		//29
		Artists::create([
				'name' => 'Shakira',
		]);

		//Genres
		//1 Country
	 Genres::create([
			 'name' => 'Country',
		]);
		//2 Rock
		Genres::create([
			 'name' => 'Rock',
		]);
		//3 Pop
		Genres::create([
			'name' => 'Pop',
		]);
		//4 Metal
		Genres::create([
			'name' => 'Metal',
		]);
		//5 Reggayton
		Genres::create([
			'name' => 'Reggayton',
		]);
		//6 Salsa
		Genres::create([
			'name' => 'Salsa',
		]);
		//7 Folk
		Genres::create([
			'name' => 'Folk',
		]);
		//8 Blues
		Genres::create([
			'name' => 'Blues',
		]);
		//9 Jazz
		Genres::create([
			'name' => 'Jazz',
		]);
		//10 Vallenato
		Genres::create([
			'name' => 'Vallenato',
		]);
		//11 Electronica
		Genres::create([
			'name' => 'Electronica',
		]);
		//12 Soul
		Genres::create([
			'name' => 'Soul',
		]);
		//13 Punk
		Genres::create([
			'name' => 'Punk',
		]);
		//14 Classic
		Genres::create([
			'name' => 'Classic',
		]);
		//15 Latina
		Genres::create([
			'name' => 'Latina',
		]);
		//16 Disco
		Genres::create([
			'name' => 'Disco',
		]);
		//17 Dance
		Genres::create([
			'name' => 'Dance',
		]);
		//18 Musica Oscura
		Genres::create([
			'name' => 'Musica Oscura',
		]);
		//19 Urban
		Genres::create([
			'name' => 'Urban',
		]);
		//20 Hip Hop
		Genres::create([
			'name' => 'Hip Hop',
		]);
		//21 Rap
		Genres::create([
			'name' => 'Rap',
		]);
		//22 Trovadorr
		Genres::create([
			'name' => 'Trovador',
		]);
		//Indie
		Genres::create([
			'name' => 'Indie',
		]);


		//Buys
		Buys::create([
				'buyed_by' => 1,
				'file_id' => 1,
		]);
		Buys::create([
				'buyed_by' => 2,
				'file_id' => 1,
		]);


	}

}
