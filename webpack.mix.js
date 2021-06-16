const path = require('path')
const fs = require('fs-extra')
const mix = require('laravel-mix')
require('laravel-mix-versionhash')
// const { BundleAnalyzerPlugin } = require('webpack-bundle-analyzer')

mix.js('resources/js/app.js', 'public/static/js')
   .disableNotifications()

mix.extract()
   .versionHash()

mix.webpackConfig({
    plugins: [
        // new BundleAnalyzerPlugin()
    ],
    resolve: {
        extensions: ['.js', '.json', '.vue'],
        alias: {
            '~': path.join(__dirname, './resources/js')
        }
    },
    output: {
        chunkFilename: 'static/js/[chunkhash].js',
        path: mix.config.hmr ? '/' : path.resolve(__dirname, './public')
    }
})

mix.babelConfig({
    plugins: ['@babel/plugin-syntax-dynamic-import'],
});
