var gulp = require('gulp');
var gulpfile = require('./gulpfile.js');
var opn = require('opn');
var ss = require('superstatic');

var app = ss.server({
    port: 3474,
    config: {
        root: './public'
    }
});

var reloader = require('./sg-reloader.js');
reloader({app: app});

app.listen(function (err) {
    opn('http://127.0.0.1:3474/styleguide');
});

gulp.start('watch');