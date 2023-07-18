const mix = require('laravel-mix');

mix.browserSync('localhost:8000');
mix.js('resources/js/corp.js', 'public/js')
    .js('resources/js/division.js', 'public/js')
    .css('resources/css/pages/layout.css', 'public/css/pages/layout.css');

