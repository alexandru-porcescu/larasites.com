var dir = __dirname + '/..';
var opn = require('opn');
var gulp = require('gulp');
var gulpfile = require(dir + '/gulpfile.js');
var ss = require('superstatic');

var spec = {
    port: 3474,
    config: {
        root: dir + '/public/styleguide'
    }
};

var app = ss.server(spec);

// var reloader = require('./reloader.js');
// reloader({app: app});

app.listen(function (err) {
    opn('http://127.0.0.1:' + spec.port + '/index.html');
});

// gulp.start('watch');
