const mix = require('laravel-mix');
const webpackConfig = require('./webpack.config');

mix.sass('resources/css/app.scss', 'public/css');
mix
    .js('resources/js/app.js', 'public/js')
    .extract()
    .vue({ version: 3 })
    .version()
    .webpackConfig(webpackConfig)
    .sourceMaps();
