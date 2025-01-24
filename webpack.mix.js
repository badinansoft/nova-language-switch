const path = require('path');
let mix = require('laravel-mix');

require('./nova.mix');

mix
    .setPublicPath('dist')
    .js('resources/js/tool.js', 'js')
    .vue({ version: 3 })
    .webpackConfig({
        resolve: {
            alias: {
                'laravel-nova-ui': path.resolve(__dirname, 'node_modules/laravel-nova-ui'),
            },
        },
    })
    .nova('badinansoft/language-switch');
