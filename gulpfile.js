var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, I am compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 | As for customizations, I am only compiling and minifying scripts. Any
 | other styles we've included in from Bootstrap CDN for the purpose of
 | this code challenge only. Otherwise we'd compile those as well.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss')
    .scripts([
      'libs/jquery.js',
      'libs/bootstrap.js',
      'libs/scripts.js',
    ], 'public/js/libs/js');
});
