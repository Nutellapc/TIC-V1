const path = require('path');
const { VueLoaderPlugin } = require('vue-loader');

module.exports = {
    mode: 'production',
    entry: './js/app.js',
    output: {
        filename: 'bundle.js',
        path: path.resolve(__dirname, 'js'),
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: 'babel-loader',
            },
            {
                test: /\.vue$/,
                loader: 'vue-loader',
            },
            {
                test: /\.css$/,
                use: ['vue-style-loader', 'css-loader', 'postcss-loader'], // Agrega postcss-loader
            },
        ],
    },
    resolve: {
        alias: {
            vue$: 'vue/dist/vue.esm-bundler.js',
        },
        extensions: ['*', '.js', '.vue', '.json'],
    },
    plugins: [
        new VueLoaderPlugin(),
    ],
};
