const express = require('express');
const webpack = require('webpack');
const webpackDevMiddleware = require('webpack-dev-middleware');

const app = express();
const config = require('./webpack.config.js');
const compiler = webpack(config);

// Configure view engine and directory
app.set('view engine', 'ejs');
app.set('views', './templates');
app.use('/public', express.static('public'));

// Tell express to use the webpack-dev-middleware and use the webpack.config.js
// configuration file as a base.
app.use(
  webpackDevMiddleware(compiler, {
    publicPath: config.output.publicPath,
    writeToDisk: true,
  }),
);

// *****************************************
// ** Configure route here
// *****************************************
app.get('/', function(req, res) {
  res.render('pages/home');
});

app.get('/:page', function(req, res) {
  res.render('pages/' + req.params.page);
});

const PORT = process.env.PORT || 3001;

// Serve the files on port 3001.
app.listen(PORT, function() {
  console.log('Example app listening on port 3001!\n');
});
