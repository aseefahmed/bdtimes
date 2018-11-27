const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.styles([
        'frontend/bootstrap.min.css',
        'frontend/font-awesome.min.css',
        'frontend/owl.carousel.css',
        'frontend/magnific-popup.css',
        'frontend/style.css',
        'frontend/responsive.css',
        'frontend/select2.min.css',
        'frontend/fileinput.css',
        'frontend/jquery-ui.css',
    ], 'public/css/frontend');

    mix.scripts([
        'frontend/jquery.min.js',
        'frontend/bootstrap.min.js',
        'frontend/select2.min.js',
        'frontend/fileinput.min.js',
        'frontend/owl.carousel.min.js',
        'frontend/jquery.magnific-popup.min.js',
        'frontend/jquery.sticky.js',
        'frontend/jquery-ui.js',
        'frontend/main.js',
    ], 'public/js/frontend');
    
    
    mix.styles([
        'pace-theme-minimal.css',
        'bootstrap.css',
        'font-awesome.css',
        'animate.css',
        'toastr.min.css',
        'magnific-popup.css',
        'fileinput.css',
        'style.css',
    ]);

    mix.scripts([
        'pace.min.js',
        'jquery-1.12.3.min.js',
        'bootstrap.min.js',
        'nano-scroller.js',
        'template-script.min.js',
        'toastr.min.js',
        'chart.min.js',
        'jquery.magnific-popup.min.js',
        'fileinput.min.js'
    ]);

    mix.browserSync();
});
