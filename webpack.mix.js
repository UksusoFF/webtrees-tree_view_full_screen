const mix = require('laravel-mix');

mix.sass('resources/styles/module.scss', 'resources/build/module.min.css').options({
    postCss: [
        require('autoprefixer')(),
    ]
});

mix.babel([
    'resources/scripts/module.js',
], 'resources/build/module.min.js');
