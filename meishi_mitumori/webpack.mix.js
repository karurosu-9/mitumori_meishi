const mix = require('laravel-mix');

mix.browserSync('localhost:8000');
mix.js('resources/js/corp.js', 'public/js')
    .js('resources/js/business-card.js', 'public/js')
    .js('resources/js/estimate.js', 'public/js')
    .css('resources/css/pages/layout.css', 'public/css/pages/layout.css');

