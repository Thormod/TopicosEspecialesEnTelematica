module.exports = {
	getRecords: function(req, res, data){

	var flash = require('req-flash');

	//psql database conecction
	var pg = require('pg');
	//Heroku postgres URL
	var connectionString = "postgres://snxiajmsfyldmg:4dwLvff4M4uFkWUOF9CVwvj1es@ec2-54-83-198-111.compute-1.amazonaws.com:5432/dckshmlm1j5s92" + "?ssl=true";

	//Login query
	pg.connect(connectionString, function(err, client, done){
		client.query('SELECT * FROM users WHERE username = '+"'"+data.usr+"'"+'AND password ='+"'"+data.pss+"'"+';', function(err, result){
			done();
			if(err) return console.log(err);
				var result = result.rows;
			if(result == ""){
				console.log('There is a problem with your credentials...');
				res.redirect('/?'+'error=1');
				return;
			}else{
				console.log(result);
			}
		});
	});
	}
}