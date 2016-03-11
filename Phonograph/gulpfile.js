var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.less('app.less');
    mix.styles([
      "bootstrap.min.css",
      "font-awesome.css",
      "flexslider.css",
      "styles.css",
      "player.css",
    ], 'public/css');

    mix.scripts([
      "jquery-1.11.2.min.js",
      "jquery-migrate-1.2.1.min.js",
      "jquery.flexslider-min.js",
      "bootstrap.min.js",
      "main.js",
      "player.js"
    ]);
});
